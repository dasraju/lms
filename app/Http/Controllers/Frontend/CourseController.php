<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    
    public function courses(){
        $courses = Course::with('instructor')->get();
     
        return view('frontend.pages.course',compact('courses'));
    }

    public function course_details($course_id){

     return view('frontend.pages.course_details');

    }


     public function course_view($course_id){

         return view('frontend.pages.courseView');
     
    }
}
