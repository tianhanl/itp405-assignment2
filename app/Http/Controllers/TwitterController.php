<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = Auth::user();
        $token = $user->twitter_token;
        $tokenSecret = $user->twitter_token_secret;

        $connection = new TwitterOAuth(
            env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            $token,
            $tokenSecret
        );

        $connection->post('statuses/update', [
            'status' => $request->body
        ]);

        return redirect('/profile');
    }
}
