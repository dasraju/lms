<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;
use DB;
use Validator;
use Spatie\Permission\Models\Permission;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructor = Instructor::all();
        return view('backend.pages.course.create',compact('instructor'));
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
            'category'=>'required',
            'name' => 'required',
            'description' => 'required',
            'cover_img'   =>  'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        DB::beginTransaction();

        $course = new Course;
        $username = Course::latest()->pluck('unique_id')->first();
        if($username){
            $usersplit = str_split( $username,5);
            $usersplit_lts = (int)$usersplit[1] + 1;
            $unique_id = "LMSC-".$usersplit_lts;
           
        }
        else{
            $unique_id = "LMSC-1";
        }
        $course->course_category_id = $request->category;
        $course->name = $request->name;
        $course->unique_id =  $unique_id;
        $course->description = $request->description;
        $course->type = $request->type;
        $course->featured = $request->featured == 'on'?'1':'0';
        $course->published = $request->published == 'on'?'1':'0';
        $course->price = $request->price;
        $course->instructor_id = $request->instructor;
        $course->total_time = $request->total_time;

        if($request->file('cover_img'))
        {
            $file= $request->file('cover_img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('course'), $filename);
            $course->cover_img_url = $filename;
        }

        if($course->save()){
            $permission = Permission::create(['name' => $unique_id]);
            DB::commit();
            toast('Your Post as been submited!','success');
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
        $course = Course::findOrFail($id);
        $instructor = Instructor::all();
        return view('backend.pages.course.edit', compact('course','instructor'));
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
        $validator = Validator::make($request->all(), [ // <---
            'category'=>'required',
            'name' => 'required',
            'description' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        DB::beginTransaction();

        $course = Course::findOrFail($id);
        $course->course_category_id = $request->category;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->type = $request->type;
        $course->featured = $request->featured == 'on'?'1':'0';
        $course->published = $request->published == 'on'?'1':'0';
        $course->price = $request->price;

        if($request->file('cover_img')){
            $path = public_path()."/course/".$course->cover_img_url;
            unlink($path);
            $file= $request->file('cover_img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('course'), $filename);
            $course->cover_img_url = $filename;

        }

        if($course->save()){
            DB::commit();
            toast('Your Post as been updated!','success');
            return Redirect()->route('course.index');
        }
        else{
            DB::rollback();
            toast('Something Missing!','error');
            return Redirect()->back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Course::destroy($id)) {


            return redirect()->route('course.index');
        } else {

            return back();
        }
    }


    public function pendingCourse(){
        
    }
}
