<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;
use DB;
use Validator;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::with('course')->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('backend.pages.lesson.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'course'=>'required',
            'name' => 'required',
            'lesson_pdf'   =>  'required|mimes:pdf|max:5120'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        DB::beginTransaction();

        $lesson = new Lesson;
        $username = Lesson::latest()->pluck('unique_id')->first();
        if($username){
            $usersplit = str_split( $username,5);
            $usersplit_lts = (int)$usersplit[1] + 1;
            $unique_id = "LMSL-".$usersplit_lts;
           
        }
        else{
            $unique_id = "LMSL-1";
        }
        $lesson->course_id = $request->course;
        $lesson->name = $request->name;
        $lesson->unique_id =  $unique_id;
        $lesson->video_url =  $request->video_url;
        $lesson->type = $request->type;
        $lesson->view = $request->view == 'on'?'1':'0';
        $lesson->download = $request->download == 'on'?'1':'0';
        $lesson->published = $request->published == 'on'?'1':'0';

        if($request->file('lesson_pdf'))
        {
            $file= $request->file('lesson_pdf');
            $filename= date('YmdHi').$file->getClientOriginalExtension();
            $file-> move(public_path('lesson'), $filename);
            $lesson->file_name = $filename;
        }

        if($lesson->save()){
            DB::commit();
            toast('Your lesson added successfully!','success');
            return Redirect()->route('course.index');
        }
        else{
            DB::rollback();
            toast('Something Missing!','error');
            return Redirect()->back()->withInput();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
