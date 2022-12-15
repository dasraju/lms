<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResourcePdf;
use App\Models\SubSubCategory;
use Validator;
use DB;

class ResourcePdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $notes = ResourcePdf::with('subsubcategory')->get();
        return view('backend.pages.resourcePdf.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcats = SubSubCategory::with('subject')->where('type','Resource')->get();
        return view('backend.pages.resourcePdf.create',compact('subcats'));
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

        $notefile = new ResourcePdf;
        $notefile->sub_sub_category_id = $request->subcategory;
        $notefile->title = $request->name;
        $notefile->price_type = $request->type;
        $notefile->file_type = $request->file_type;
        $notefile->view = $request->view == 'on'?'1':'0';
        $notefile->download = $request->download == 'on'?'1':'0';
        $notefile->published = $request->published == 'on'?'1':'0';
        if($request->file('pdf_file')) 
        {
            $file= $request->file('pdf_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('resource_pdf_file'), $filename);
            $notefile->file_name = $filename;
        }

        if($notefile->save()){
          
            DB::commit();
            toast('Pdf  Saved successfully','success');
            return Redirect()->route('resource-pdf.index');
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
        $subcats = SubSubCategory::with('subject')->where('type','resource')->get();
        $note = ResourcePdf::findOrFail($id);
        return view('backend.pages.resourcePdf.edit', compact('subcats','note'));
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
        $note = ResourcePdf::findOrFail($id);
        $note->title = $request->name;
        $note->price_type = $request->type;
        $notefile->file_type = $request->file_type;
        $note->view = $request->view == 'on'?'1':'0';
        $note->download = $request->download == 'on'?'1':'0';
        $note->published = $request->published == 'on'?'1':'0';
        if($request->file('pdf_file'))
        {
            $file= $request->file('pdf_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('resource_pdf_file'), $filename);
            $note->file_name = $filename;
        }

        if($note->save()){
          
            DB::commit();
            toast('Pdf Updated successfully','success');
            return Redirect()->route('resource-pdf.index');
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
        $delete= ResourcePdf::destory($id);
        toast('Data Deleted!','success');
        return Redirect()->back();
    }
}
