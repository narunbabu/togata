<?php
namespace App\Models\TweetRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['text'];

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

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class, 'tweet_hashtags');
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['likes_count'] = $this->likes()->count();
        $array['retweets_count'] = $this->retweets()->count();
        return $array;
    }
}