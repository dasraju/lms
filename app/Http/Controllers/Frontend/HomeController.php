<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.pages.index');
    }

    public function chapter($chapterId){
        $chapters = Chapter::where('sub_sub_category_id',$chapterId )->get();

        return view('frontend.pages.chapter',compact('chapters'));
    }
}
