<?php

namespace App\Services;

use App\Models\Tweet;

class TweetService
{
    public function checkOwnTweet(int $userId, Int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet) {
            return false;
        }

        return $tweet->user_id === $userId;
    }
}