<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Http\Requests\TweetRequest;
use App\Services;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class TweetController extends Controller
{
    public function index() {

        $tweets = Tweet::latest()->get();

        return view('tweets.index')
            ->with('tweets', $tweets);

    }

    public function create(TweetRequest $request, Tweet $tweet) {

        $tweet->content = $request->content;
        $tweet->user_id = $request->userId();
        $tweet->save();
        return redirect()
            ->route('tweets.index');
    }

    public function add() {
        return view('tweets.tweet');
    }

    public function show(Tweet $tweet) {

        return view('tweets.show')
            ->with('tweet', $tweet);
    }

    public function edit(TweetRequest $request, Tweet $tweet, TweetService $tweetService) {

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweet->user_id)) {
            throw new AccessDeniedHttpException();
        }
        return view('tweets.edit')
            ->with('tweet', $tweet);
    }

    public function update(TweetRequest $request, Tweet $tweet, TweetService $tweetService) {

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweet->user_id)) {
            throw new AccessDeniedHttpException();
        }
        $tweet->content = $request->content;
        $tweet->save();
        return redirect()
            ->route('tweets.show', $tweet);
    }

    public function delete(TweetRequest $request, Tweet $tweet, TweetService $tweetService) {

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweet->user_id)) {
            throw new AccessDeniedHttpException();
        }
        $tweet->delete();
        return redirect()
            ->route('tweets.index');
    }
}
