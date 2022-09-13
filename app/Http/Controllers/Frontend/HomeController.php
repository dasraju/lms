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

    public function chapter($type,$chapterId){

        switch($type) {
            case 'Revision':
                $chapters = Chapter::where('sub_sub_category_id',$chapterId )->get();
                return view('frontend.pages.chapter',compact('chapters'));
              break;
            case 'Topical':
                $chapters = Chapter::where('sub_sub_category_id',$chapterId )->get();
                return view('frontend.pages.topical',compact('chapters'));
              break;
            case 'PastPaper':
                $chapters = Chapter::where('sub_sub_category_id',$chapterId )->get();
                return view('frontend.pages.pastpaper',compact('chapters'));
                break;
            case 'Resource':
                $chapters = Chapter::where('sub_sub_category_id',$chapterId )->get();
                return view('frontend.pages.resource',compact('chapters'));
                    break;
            default:
              // code block
          }

    }
}
