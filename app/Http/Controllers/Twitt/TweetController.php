<?php

namespace App\Http\Controllers\Twitt;
use App\Http\Controllers\Controller;
use App\Models\TweetRelated\Tweet;
use App\Models\TweetRelated\Comment;
use App\Models\TweetRelated\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    // public function index()
    // {
    //     $tweets = Tweet::with('retweets')
    //            ->orderBy('created_at', 'desc')
    //            ->take(10)
    //            ->get();

    //     return response()->json(['tweets' => $tweets]);
    // }

    public function index()
{
    $tweets = Tweet::where('type_id',1)
                ->orderBy('created_at', 'desc')
               ->take(10)
               ->select()
               ->get();

    return response()->json(['tweets' => $tweets]);
}
public function getNewTweets(int $from_tweet_id)
{   
    // 
    // $request = new Request(['id' => 38]);
    // $from_tweet_id=$request->input('id');
    // return $id;
    $records = Tweet::where('id', '>', $from_tweet_id)->orderBy('created_at', 'desc')
  ->get();
  return response()->json(['tweets' => $records]);
    // $tweets = Tweet::where('id','>',$from_tweet_id)
    //             ->orderBy('created_at', 'desc')
    //             ->select()
    //            ->get();

    return response()->json(['tweets' => $tweets]);
}





    
    public function userTweets()
    {
        $user = auth()->user();
        $tweets = $user->tweets()->with('retweets')->get();
        
        return response()->json([
            'tweets' => $tweets
        ]);


    }

    public function saveTweet(Tweet $tweet)
    {
        $tweet->save();        
        return $tweet;
    }


    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'message' => 'required|max:280',
            'type_id' => 'required|integer'
        ]);
        $tweet = new Tweet();
        $tweet->message = $request->input('message');
        $tweet->user_id = auth()->id();
        $tweet->type_id = $request->input('type_id');
        $tweet->save();

        if ($tweet->type_id==3){
            $comment = new Comment();
            $comment->user_id = $tweet->user_id;
            $comment->this_tweet_id = $tweet->id;
            $comment->for_tweet_id = $request->input('for_tweet_id');
            $comment->save();
        }
        return response()->json(['tweet' => $tweet]);
    //    return response()->json(saveTweet($tweet));
    }
    
    public function show(Tweet $tweet)
    {
        $array = $tweet->toArray(); 
        $array['comments_array'] = $tweet->givecomments();
        return $array;

        // return response()->json($tweet->with('user')->first());
    }
    public function getResponses(Tweet $tweet)
    {

        return 
        response()->json(['responses' => $tweet->givecomments()]);

        // return response()->json($tweet->with('user')->first());
    }

    public function showTweets()
    {
        return auth()->user()->allTweets();

        // return view('tweets.index', compact('tweets'));
    }

    public function update(Request $request, Tweet $tweet)
    {
        $validatedData = $request->validate([
            'message' => 'required|max:280',
        ]);

        $tweet->message = $validatedData['message'];
        $tweet->type_id = $validatedData['type_id'];
        $tweet->save();

        return response()->json(['tweet' => $tweet]);
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return response()->json(['message' => 'Tweet deleted successfully']);
    }

    public function getTweetTypes()
    {
        $types = Type::all();

        return response()->json(['types' => $types]);
    }
}
