<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    

    public function loginForm(Request $request){
        $user = User::first();
        $credentials['email'] = $user->email;
        $credentials['password'] = '123456';
        $data =Auth::guard('web')->attempt($credentials);
        // dd($data);
        //   $data = Auth::login($user);
        //   dd($user);
        // $request->session()->regenerate();
        dd(auth()->user()->name);
    }
    public function login(Request $request){

    }
}
