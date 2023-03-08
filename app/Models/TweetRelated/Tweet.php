<?php
namespace App\Models\TweetRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Tweet extends Model
{
    use  HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'type_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function retweets()
    {
        return $this->hasMany(Retweet::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'for_tweet_id'); //
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class, 'tweet_hashtags', 'tweet_id', 'hashtag_id');
    }
    public function mentions()
    {
        return $this->belongsToMany(Mention::class, 'mentions', 'tweet_id', 'user_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function givecomments()
    {
        // return $this->belongsToMany(Comment::class,'for_tweet_id','this_tweet_id'); //
        return Comment::where('for_tweet_id',$this->id)->get();
    }

    public function toArray()
    {
        // $array = parent::toArray(); 
        $array = array();

        $array['id'] = $this->id;
        $array['user_id'] = $this->user_id;    
        $array['type'] = $this->type->name;
        $array['user'] = ucwords($this->user->surname.' '.$this->user->name);
        $array['userName'] = $this->user->username;
        $array['avatar'] = $this->user->avatar;
        $array['message'] = $this->message;        
        $array['likes'] = $this->likes()->count();
        $array['retweets'] = $this->retweets()->count();
        $array['comments'] = $this->comments()->count();
        $created_at = $this->created_at;
        $array['created_at'] = $this->created_at;
        $time_diff = $created_at->diffForHumans();    
        $array['time'] = $time_diff; 
    //     unset($array['likes']);
    //     unset($array['retweets']);
        return $array;
    }

    public function getHashtags()
    {
        preg_match_all('/#(\w+)/', $this->content, $matches);
        // return $matches[1];
        return collect($matches[1])->map(function ($name) {
            return Hashtag::firstOrCreate(['tag' => $name]);
        });
    }

    public function getMentions($id)
    {
        preg_match_all('/@(\w+)/', $this->content, $matches);
        
        return collect($matches[1])->map(function ($username) use ($id) {
            $user = User::where('username', $username)->first();
            if (!$user) {
                return null;
            }    
            return Mention::updateOrCreate(
                ['user_id' => $user->id, 'tweet_id' => $id]
            );
        })->filter();
    }

    public function save(array $options = [])
    {
        // Save tweet
        parent::save($options);
        $hashtags = $this->getHashtags();
        $mentions = $this->getMentions($this->id);        
        $this->hashtags()->sync($hashtags->pluck('id'));
        $this->mentions()->sync($mentions->pluck('id'));
    }
}
