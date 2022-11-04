<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\SubCategory;
use App\Models\Subject;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::with('instructor')->get();
     
        return view('frontend.pages.index',compact('courses'));
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
    public function detail_menu($sub_id){
        $subject = Subject::with('category','category.menu')->where('id',$sub_id)->first();
        // dd($subject);
        $data = SubCategory::with('subsubcategories')->where('subject_id',$sub_id)->get();
        return view('frontend.pages.detailsmenu',compact('data','subject'));

    }
}
