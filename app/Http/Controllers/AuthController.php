<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $username = $user->name;
        $useremail = $user->email;
        return redirect()->route('authorregister')->with('username', $username)->with('useremail', $useremail);
    }
}
