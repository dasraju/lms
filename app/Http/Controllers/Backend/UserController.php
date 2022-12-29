<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user_list(){
        $userList = User::orderBy('created_at','desc')->get();
        return view('backend.pages.user.list',compact('userList'));
    }
   
}
