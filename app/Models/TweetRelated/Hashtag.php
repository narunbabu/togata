<?php
namespace App\Models\TweetRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tweets()
    {
        return $this->belongsToMany(Tweet::class, 'tweet_hashtags');
    }
}
