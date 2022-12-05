<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopicalVideo;
use Validator;
use DB;

class TopicalVideoController extends Controller
{
    public function create($id){
        return view('backend.pages.topical_video.create',compact('id'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [ // <---
     
            'name' => 'required',
            'type'=>'required',
            'url'   =>  'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        DB::beginTransaction();

        $video = new TopicalVideo;
        $video->topical_chapter_id = $request->chapter_id;
        $video->title = $request->name;
        $video->url = $request->url;
        $video->price_type = $request->type;
        $video->view = $request->view == 'on'?'1':'0';
        $video->download = $request->download == 'on'?'1':'0';
        $video->published = $request->published == 'on'?'1':'0';
        
        if($video->save()){
          
            DB::commit();
            toast('Video Note Saved successfully','success');
            return Redirect()->route('topical.pdf.index',$request->chapter_id);
        }
        else{
            DB::rollback();
            toast('Something Missing!','error');
            return Redirect()->back()->withInput();
        }

    }

    public function edit($id)
    {
        $video = VideoSolution::findOrFail($id);
        return view('backend.pages.topical_video.edit', compact('video'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ // <---
     
            'name' => 'required',
            'type'=>'required',
           
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $video = TopicalVideo::findOrFail($id);
        $video->title = $request->name;
        $video->price_type = $request->type;
        $video->view = $request->view == 'on'?'1':'0';
        $video->download = $request->download == 'on'?'1':'0';
        $video->published = $request->published == 'on'?'1':'0';
      

        if($video->save()){
          
            DB::commit();
            toast('Pdf Note Saved successfully','success');
            return Redirect()->route('topical.pdf.index',$video->topical_chapter_id);
        }
        else{
            DB::rollback();
            toast('Something Missing!','error');
            return Redirect()->back()->withInput();
        }
    }
}
