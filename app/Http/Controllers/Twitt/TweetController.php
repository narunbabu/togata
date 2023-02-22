<?php

namespace App\Http\Controllers\Twitt;
use App\Http\Controllers\Controller;
use App\Models\TweetRelated\Tweet;

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

    public function index()
    {
        $tweets = Tweet::with(['likes', 'retweets'])->take(5)->get();
        // $tweets = Tweet::with(['likes', 'retweets'])
        //        ->latest()
        //        ->take(10)
        //        ->get();
        // dump(response()->json($tweets));
    return response()->json($tweets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:280',
        ]);

        $tweet = new Tweet();
        $tweet->text = $validatedData['text'];
        $tweet->user_id = auth()->user()->id;
        $tweet->save();

        return response()->json($tweet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TweetRelated\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        // return $request;
        // $tweet = new Tweet();
        // $tweet->load('user', 'likes.user', 'retweets.user');
        // $tweet->load('user');
        // $tweet = Tweet::where('id', $id)->with('user')->first();

        // $data['tweet'] = Tweet::where("id",$tweet->id)->with('user')->first();
        // return response()->json($data);
        return response()->json($tweet->with('user')->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TweetRelated\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:280',
        ]);

        $tweet->text = $validatedData['text'];
        $tweet->save();

        return response()->json($tweet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TweetRelated\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return response()->json(['message' => 'Tweet deleted successfully']);
    }
}
