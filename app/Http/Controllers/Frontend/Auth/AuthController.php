<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Hash;
use DB;
use Spatie\Permission\Models\Role;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    

    public function loginForm(){
      return view('frontend.pages.auth.login');
    }



    public function login(LoginRequest $request){
        $request->validated();
        $request->authenticated();
        $request->session()->regenerate();
        toast('Hello '.Auth::user()->name.',Welcome to LMS system','success');
        return redirect()->route('user.home')  ; 
        
        // $validator = Validator::make($request->all(), [ // <---
        //     'mobile'=>'required',
          
        // ]);
        // if ($validator->fails()) {
        //     return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        // }
        // $user = User::where('phone',$request->mobile)->first();
        // if(isset($user)){
        //    $loggedin = Auth::guard('web')->login($user,$remember = true);
        // //    dd(Auth::guard('web')->user()->id);

     

    }


    

    public function regForm(){
        return view('frontend.pages.auth.register');   
    }
     public function otpForm(){
        return view('frontend.pages.auth.otp');   
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [ // <---
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        DB::beginTransaction();
        $username = User::latest()->pluck('username')->first();
        if($username){
            $usersplit = str_split( $username,5);
            $usersplit_lts = (int)$usersplit[1] + 1;
            $unique_id = "USER-".$usersplit_lts;
           
        }
        else{
            $unique_id = "USER-1";
        }

        $insertData = $request->all();
        $insertData['status'] = '0';
        $insertData['password'] = Hash::make($request->password);
        $insertData['username'] = $unique_id;
        $user = User::create($insertData);
        if($user){
            $role = Role::create(['name' => $unique_id]);
            $user->assignRole($unique_id);
            DB::commit();
            toast('Successfully Registered','success');
            return Redirect()->route('user.login.form');
        }
        else{
            DB::rollback();
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }


    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
   
    
}
