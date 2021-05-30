<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignup() {
        return view('auth.signup');
    }

    public function postSignup(Request $req) {
        $this->validate($req, [
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|unique:users|min:6'
            ]);

        User::create([
            'username' => $req->input('username'),
            'password' => bcrypt($req->input('password'))
        ]);

        return redirect()->route('home');
    }

    public function getSignin() {
        return view('auth.signin');
    }

    public function postSignin(Request $req) {
        $this->validate($req, [
            'username' => 'required|alpha_dash|max:20',
            'password' => 'required|min:6'
        ]);

        if (!Auth::attempt($req->only(['username', 'password']))){
            return redirect()->back();
        }

        return redirect()->route('profile');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
