<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;

class AuthController extends Controller
{
    

    public function loginForm(){
      return view('frontend.pages.auth.login');
    }



    public function login(Request $request){
        
        $validator = Validator::make($request->all(), [ // <---
            'mobile'=>'required',
          
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $user = User::where('phone',$request->mobile)->first();
        if(isset($user)){
           $loggedin = Auth::guard('web')->login($user,$remember = true);
        //    dd(Auth::guard('web')->user()->id);
          return redirect()->route('user.home')  ;        
        }




    }

    public function regForm(){
        return view('frontend.pages.auth.register');
        
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
   
    
}
