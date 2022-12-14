<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\SubSubCategory;
use Validator;
use DB;

class FolderController extends Controller
{
     public function index(Request $request)
    {
        $folders= Folder::with('subsubcategory')->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.folder.index', compact('folders'));
    }

    public function create(Request $request)
    {
        $subcats = SubSubCategory::with('subject')->where('type','Resource')->get();
        return view('backend.pages.folder.create',compact('subcats'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subcategory'=>'required',
            'name' => 'required',
           

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        DB::beginTransaction();

       
        $cat = new Folder();
        $cat->sub_sub_category_id = $request->subcategory;
        $cat->title = $request->name;
        $cat->type = $request->type;


        if ($cat->save()) {
            DB::commit();
            toast('Folder Created Successfully','success');
            $url = route('folder.index');
            return redirect()->to($url);
            
        } else {
            DB::rollback();
            return Redirect()->back()->withInputes();
        }

    }
    public function edit(Request $request,$id)
    {

        $subcats = SubSubCategory::with('subject')->where('type','resource')->get();
        $folder = Folder::findOrFail($id);
        return view('backend.pages.folder.edit', compact('subcats','folder'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subsubcategory'=>'required',
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = Folder::findOrFail($id);
        $cat->sub_sub_category_id = $request->subsubcategory;
        $cat->type = $request->type;
        $cat->title = $request->name;

        if ($cat->save()) {
            toast('Folder Updated','success');
            $url = route('folder.index');
            
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return redirect()->to($url);
    }
    public function destroy($id)
    {

        if (Folder::destroy($id)) {
            $url = route('parts.index');
            return redirect()->to($url);

        } else {
            return back();
        }
    }
}
