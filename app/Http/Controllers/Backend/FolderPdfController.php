<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResourceFolderPdf;
use App\Models\Folder;
use Validator;
use DB;

class FolderPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $notes = ResourceFolderPdf::with('folder')->get();
        return view('backend.pages.folderPdf.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $folders = Folder::get();
        return view('backend.pages.folderPdf.create',compact('folders'));
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
     
            'name' => 'required',
            'type'=>'required',
            'pdf_file'   =>  'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        DB::beginTransaction();
        $notefile = new ResourceFolderPdf;
        $notefile->folder_id = $request->folder_id;
        $notefile->title = $request->name;
        $notefile->price_type = $request->type;
        $notefile->view = $request->view == 'on'?'1':'0';
        $notefile->download = $request->download == 'on'?'1':'0';
        $notefile->published = $request->published == 'on'?'1':'0';
        if($request->file('pdf_file')) 
        {
            $file= $request->file('pdf_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('resource_folder_pdf'), $filename);
            $notefile->file_name = $filename;
        }

        if($notefile->save()){
          
            DB::commit();
            toast('Pdf  Saved successfully','success');
            return Redirect()->route('resource-folder-pdf.index');
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
        $folders = Folder::get();
        $note = ResourceFolderPdf::findOrFail($id);
        return view('backend.pages.folderPdf.edit', compact('folders','note'));
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
        $note = ResourceFolderPdf::findOrFail($id);
        $note->folder_id = $request->folder_id;
        $note->title = $request->name;
        $note->price_type = $request->type;
        $note->view = $request->view == 'on'?'1':'0';
        $note->download = $request->download == 'on'?'1':'0';
        $note->published = $request->published == 'on'?'1':'0';
        if($request->file('pdf_file'))
        {
            $file= $request->file('pdf_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('resource_folder_pdf'), $filename);
            $note->file_name = $filename;
        }

        if($note->save()){
            DB::commit();
            toast('Pdf Updated successfully','success');
            return Redirect()->route('folder-pdf.index');
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
        $delete= ResourceFolderPdf::destroy($id);
        toast('Data Deleted!','success');
        return Redirect()->back();
    }
}
