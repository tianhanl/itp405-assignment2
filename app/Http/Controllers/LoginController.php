<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\User;
use Laravel\Socialite\Facades\Socialite;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    public function login()
    {
        $loginWasSuccessful = Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if ($loginWasSuccessful) {
            return redirect('/profile');
        } else {
            return redirect('/login');
        }
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();
        $user = User::where('email', '=', $twitterUser->getEmail())->first();

        if (!$user) {
            $user = new User();
            $user->name = $twitterUser->getName();
            $user->email = $twitterUser->getEmail();
        }

        $user->twitter_token = $twitterUser->token;
        $user->twitter_token_secret = $twitterUser->tokenSecret;
        $user->save();

        Auth::login($user);
        return redirect('/profile');
    }

    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        $user = Socialite::driver('github')->user();
        $localUser = User::where('email', '=', $user->getEmail())->first();
        if (!$localUser) {
            $localUser = new User();
            $localUser->name = $user->getName();
            $localUser->email = $user->getEmail();
            $localUser->password = Hash::make('AVL Tree');
            $localUser->save();
        }
        $loginWasSuccessful = Auth::attempt([
            'email' => $user->getEmail(),
            'password' => 'AVL Tree'
        ]);

        if ($loginWasSuccessful) {
            return redirect('/profile');
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
