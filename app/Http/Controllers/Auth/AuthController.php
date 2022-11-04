<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function loginForm(){
        $user = User::first();
        Auth::guard('web')->login($user);
        dd(Auth::user()->id);
    }
    public function login(Request $request){

    }
}
