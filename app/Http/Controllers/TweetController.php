<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Http\Requests\TweetRequest;

class TweetController extends Controller
{
    public function index() {

        $tweets = Tweet::latest()->get();

        return view('tweets.index')
            ->with('tweets', $tweets);

    }

    public function create(TweetRequest $request, Tweet $tweet) {

        $tweet->content = $request->content;
        $tweet->save();
        return redirect()
            ->route('tweets.index');
    }

    public function show(Tweet $tweet) {

        return view('tweets.show')
            ->with('tweet', $tweet);
    }

    public function edit(Tweet $tweet) {

        return view('tweets.edit')
            ->with('tweet', $tweet);
    }

    public function update(TweetRequest $request, Tweet $tweet) {

        $tweet->content = $request->content;
        $tweet->save();
        return redirect()
            ->route('tweets.show', $tweet);
    }

    public function delete(Tweet $tweet) {

        $tweet->delete();
        return redirect()
            ->route('tweets.index');
    }
}
