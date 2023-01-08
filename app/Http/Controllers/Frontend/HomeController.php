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
use App\Models\Folder;
use App\Models\ResourcePdf;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public  $expdate ='';
    public function index(){
  
        // dd(Auth::user()->getAllPermissions());
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
                $id = $chapterId;
                return view('frontend.pages.resource',compact('id'));
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

    public function resource_syllabus($id){
         $books = ResourcePdf::where('file_type','book')->where('sub_sub_category_id',$id)->get();
         $syllabus = ResourcePdf::where('file_type','syllabus')->where('sub_sub_category_id',$id)->get();
         return view('frontend.pages.resourcepdf',compact('books','syllabus'));
    }
    public function resource_folder($id){
        $folders = Folder::with('folderpdf')->where('sub_sub_category_id',$id)->get();
         return view('frontend.pages.folderpdf',compact('folders'));
    }

    public function pdf_download($tablename,$id){

        switch ($tablename) {
            case "pdffile":
              $data = PdfFile::find($id);
              break;
            case "blue":
              echo "Your favorite color is blue!";
              break;
            case "green":
              echo "Your favorite color is green!";
              break;
            default:
              echo "Your favorite color is neither red, blue, nor green!";
          }
          $myPublicFolder = public_path();
          $file = $myPublicFolder.'/notefile/'.$data->file_name;
          $headers = array(
            'Content-Type: application/pdf',
          );
          return Response()->download($file, 'lms.pdf', $headers);
          
    }
    
}
