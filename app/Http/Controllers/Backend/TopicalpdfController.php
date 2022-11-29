<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopicalNote;
use App\Models\TopicalVideo;
use Validator;
use DB;

class TopicalpdfController extends Controller
{
     public function index($id)
    {
        $pdfquestion = TopicalNote::with('topicalchapter')->where('topical_chapter_id',$id)->where('type','question')->get();
        $pdfsolution = TopicalNote::with('topicalchapter')->where('topical_chapter_id',$id)->where('type','solution')->get();
        $videoes = TopicalVideo::with('topicalchapter')->where('topical_chapter_id',$id)->get();
        return view('backend.pages.topical_pdf.index',compact('pdfquestion','pdfsolution','id','videoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $type = $request->get('type');
        return view('backend.pages.topical_pdf.create',compact('id','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---s
            'name' => 'required',
            'type'=>'required',
            'pdf_file'   =>  'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        DB::beginTransaction();
        $notefile = new TopicalNote;
        $notefile->topical_chapter_id = $request->chapter_id;
        $notefile->title = $request->name;
        $notefile->type = $request->note_type;
        $notefile->price_type = $request->type;
        $notefile->view = $request->view == 'on'?'1':'0';
        $notefile->download = $request->download == 'on'?'1':'0';
        $notefile->published = $request->published == 'on'?'1':'0';
        if($request->file('pdf_file'))
        {
            $file= $request->file('pdf_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('topicalnote'), $filename);
            $notefile->file_name = $filename;
        }

        if($notefile->save()){
          
            DB::commit();
            toast('Pdf Note Saved successfully','success');
            return Redirect()->route('topical.pdf.index',$request->chapter_id);
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
        $note = PdfFile::findOrFail($id);
        return view('backend.pages.note.edit', compact('note'));
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
     
            'name' => 'required',
            'type'=>'required',
           
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $note = PdfFile::findOrFail($id);
        $note->title = $request->name;
        $note->price_type = $request->type;
        $note->view = $request->view == 'on'?'1':'0';
        $note->download = $request->download == 'on'?'1':'0';
        $note->published = $request->published == 'on'?'1':'0';
        if($request->file('pdf_file'))
        {
            $file= $request->file('pdf_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('notefile'), $filename);
            $note->file_name = $filename;
        }

        if($note->save()){
          
            DB::commit();
            toast('Pdf Note Saved successfully','success');
            return Redirect()->route('note.index',$note->topic_id);
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
        //
    }
}
