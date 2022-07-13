<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\User;
use App\Http\Requests\TweetRequest;
use App\Http\Requests\SearchRequest;
use App\Services;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class TweetController extends Controller
{
    public function index(TweetService $tweetService) {

        // $tweets = Tweet::latest()->get();
        $tweets = $tweetService->getTweets();

        // dump($tweets);
        // app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dump report.'));

        return view('tweets.index')
            ->with('tweets', $tweets);

    }

    public function create(TweetRequest $request, TweetService $tweetService) {

        $tweetService->saveTweet(
            $request->userId(),
            $request->content,
            $request->images()
        );

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

    public function edit(Request $request, Tweet $tweet, TweetService $tweetService) {

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweet->id)) {
            throw new AccessDeniedHttpException();
        }
        return view('tweets.edit')
            ->with('tweet', $tweet);
    }

    public function update(TweetRequest $request, Tweet $tweet, TweetService $tweetService) {

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweet->id)) {
            throw new AccessDeniedHttpException();
        }
        $tweet->content = $request->content;
        $tweet->save();
        return redirect()
            ->route('tweets.show', $tweet);
    }

    public function delete(Request $request, TweetService $tweetService) {

        $tweetId = (int) $request->route('tweet');
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException();
        }
        $tweetService->deleteTweet($tweetId);
        return redirect()
            ->route('tweets.index');
    }

    public function search(SearchRequest $request) {
        $keyword = $request->input('keyword');
        $user = User::where('name', 'like', '%' . $keyword . '%')->first();
        if (!$user) {
            $user = User::where('email', 'like', '%' . $keyword . '%')->first();
        }
        $tweet = Tweet::where('user_id', $user->id)->get();

        return view('tweets.index')
            ->with('tweets', $tweet);
    }
}
