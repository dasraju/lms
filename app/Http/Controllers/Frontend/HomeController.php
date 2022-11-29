<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Subject;
use App\Models\PdfFile;
use App\Models\VideoSolution;
use App\Models\Topic;
use App\Models\TopicalNote;
use App\Models\TopicalVideo;
use App\Models\User;
use App\Models\Part;
use Auth;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::with('instructor')->get();
     
        return view('frontend.pages.index',compact('courses'));
    }

    public function chapter($type,$chapterId){
   

        switch($type) {
            case 'Revision':
                $chapters = Chapter::where('sub_sub_category_id',$chapterId )->where('chap_category','revision')->get();
                return view('frontend.pages.revision',compact('chapters'));
              break;
            case 'Topical':
                $parts = Part::where('sub_sub_category_id',$chapterId )->where('part_category','topical')->get();
                return view('frontend.pages.topical',compact('parts'));
              break;
            case 'PastPaper':
                $parts = Part::where('sub_sub_category_id',$chapterId )->where('part_category','pastpaper')->get();
                return view('frontend.pages.pastpaper',compact('parts'));
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
        $data = SubSubCategory::where('subject_id',$sub_id)->orderBy('created_at', 'asc')->get();
        return view('frontend.pages.detailsmenu',compact('data','subject'));

    }
    public function course_details($course_id){
     return view('frontend.pages.course_details');
    }

    public function topic_files($id){
        $topic = Topic::find($id);
        $notes = PdfFile::with('topic')->where('topic_id',$id)->get();
        $videoes = VideoSolution::with('topic')->where('topic_id',$id)->get();
        return view('frontend.pages.topicFiles',compact('notes','videoes','topic'));
    }

    public function topical_details($id){
        $notefilesqsn = TopicalNote::with('topicalchapter')->where('topical_chapter_id',$id)->where('type','question')->get();
        $notefilessol = TopicalNote::with('topicalchapter')->where('topical_chapter_id',$id)->where('type','solution')->get();
        $videofiles = TopicalVideo::with('topicalchapter')->where('topical_chapter_id',$id)->get();
        return view('frontend.pages.topical_details',compact('notefilesqsn','notefilessol','videofiles'));
    }
    

      public function pastpaper_details($id){
        $notefilesqsn = TopicalNote::with('topicalchapter')->where('topical_chapter_id',$id)->where('type','question')->get();
        $notefilessol = TopicalNote::with('topicalchapter')->where('topical_chapter_id',$id)->where('type','solution')->get();
        $videofiles = TopicalVideo::with('topicalchapter')->where('topical_chapter_id',$id)->get();
        return view('frontend.pages.paperDetails',compact('notefilesqsn','notefilessol','videofiles'));
    }
    
}
