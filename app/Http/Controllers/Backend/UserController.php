<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MenuHead;
use App\Models\Category;
use App\Models\Subject;
use App\Models\SubSubcategory;
use App\Models\Chapter;
use App\Http\Requests\PermissionSetupRequest;

class UserController extends Controller
{
    public function user_list(){
        $userList = User::orderBy('created_at','desc')->get();
        return view('backend.pages.user.list',compact('userList'));
    }
    public function give_permission(){
        $userList = User::orderBy('created_at','desc')->get();
        $menuhead = MenuHead::orderBy('created_at','desc')->get();
        return view('backend.pages.user.user_permission',compact('userList','menuhead'));
    }

    public function get_permission_data(Request $request)
    {
        $id = $request->get('id');
        $tablename = $request->get('tablename');
  
        switch ($tablename) {
            case "category":
              $datas = Category::where('menu_head_id',$id)->orderBy('created_at','desc')->get();
              break;
            case 'subject':
                $datas = subject::where('category_id',$id)->orderBy('created_at','desc')->get();
              break;
            case 'subjectpart':
                $datas = SubSubcategory::where('subject_id',$id)->orderBy('created_at','desc')->get();
              break;
            case 'chapter':
                $datas = Chapter::where('sub_sub_category_id',$id)->orderBy('created_at','desc')->get();
                break;
            default:
          
          }
          return view('backend.pages.user.dropdown',compact('datas'));
        
    }

    public function set_permission(PermissionSetupRequest $request){
           $request->validated();
           $user = User::find($request->user);
           
           $chapter = Chapter::find($request->chapter);
           $permission_set = $user->givePermissionTo($chapter->unique_name);
           toast('Permission set succesfully','success');
            return Redirect()->route('user.give.permission');
       
    }
   
}
