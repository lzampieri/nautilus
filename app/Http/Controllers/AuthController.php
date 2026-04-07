<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Socialite\Socialite;

class AuthController extends Controller {
    public function login() {
        return Socialite::driver('google')->setScopes(['openid', 'email', 'profile'])->redirect();
    }

    public function callback() {
        $user = Socialite::driver('google')->user();

        $email = $user->email;

        $crd = Credential::where('driver','google')
            ->where('param1',$email)
            ->has('user')
            ->first();

        if( $crd ) {
            $crd->last_used = Carbon::now();
            $crd->save();

            Auth::login($crd->user);

            return redirect()->route('home')->with('dialog',['success','Login effettuato']);
        }

        return redirect()->route('user.register')->with('user',[
            'email' => $user->email,
            'name' => $user->user['given_name']
        ]);
    }

    public function logout() {
        if( Auth::check() )
            Auth::logout();
        return redirect()->route('home')->with('dialog',['success','Logout effettuato']);
    }
}