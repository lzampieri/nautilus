<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Laravel\Socialite\Socialite;

class UserController extends Controller
{
    public function register(Request $request)
    {
        return Inertia::render('User/Register', [
            'predata' => $request->session()->pull('user', null)
        ]);
    }
    public function register_post(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                Rule::unique('credentials','param1')->where(fn(Builder $query) => $query->where('driver', 'google'))
            ]
        ]);

        $user = User::create([
            'name' => $validated['name']
        ]);

        $cred = new Credential([
            'driver' => 'google',
            'param1' => $validated['email']
        ]);
        $cred->user()->associate($user);
        $cred->save();
        // TODO LOG

        return redirect()->route('home')->with('dialog',['success','Utente registrato, effettua il login']);
    }
}
