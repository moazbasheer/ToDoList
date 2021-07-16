<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $req) {
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $isAuth = Auth::Attempt($data);
        
        if(!$isAuth) {
            return Redirect()->route('login')
            ->withErrors([
                'email' => 'Entered wrong credentials'
            ]);
        }
        
        return Redirect()->route('index');
    }

    public function logout() {
        auth()->logout();
        return Redirect()->route('index');
    }
}
