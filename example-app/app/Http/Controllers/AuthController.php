<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Auth;

class AuthController extends Controller
{
    //
    public function __construct() {
    }

    function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    function handleGoogleCallbacks(){
        $user = Socialite::driver('google')->user();

        //$this->_registerOrLogin($user);

        return response()->json([
            'user' => $user
        ]);
    }

    function _registerOrLogin(){
        $user = Auth::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new Auth();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }

}
