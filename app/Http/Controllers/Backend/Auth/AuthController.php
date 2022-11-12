<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;

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
    public function admin_login_form(){
           return view('backend.pages.auth.login');
    }

    public function admin_login(Request $request){
     
        $validator = Validator::make($request->all(), [ // <---
            'email'=>'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

            $credentials['email'] = $request->email;
            $credentials['password'] = $request->password;
          if(Auth::guard('admin')->attempt($credentials)){
            toast('Good Evening Admin','success');
            return redirect()->route('admin.home');
          }
          else{
            toast('Not Matched','error');
            return view('backend.pages.auth.login');
          }
    }

    public function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
