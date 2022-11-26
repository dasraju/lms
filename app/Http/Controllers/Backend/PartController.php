<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $chapters= Chapter::with('subsubcategory')->orderBy('created_at', 'desc')->paginate(10);

        return view('backend.pages.part.index', compact('chapters'));
    }

    public function create($type)
    {
        $subcats = SubSubCategory::with('subject')->where('type','pastpaper')->get();
        return view('backend.pages.part.create',compact('subcats'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subcategory'=>'required',
            'name' => 'required',
            'part_category' =>'required'

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $username = Chapter::latest()->pluck('unique_name')->first();
        if($username){
            $usersplit = str_split( $username,6);
            $usersplit_lts = (int)$usersplit[1] + 1;
           $unique_name = "LMSN-".$usersplit_lts;
            
        }
        else{
            $unique_name = "LMSN-1";
           
        }
        $cat = new Chapter();
        $cat->sub_sub_category_id = $request->subcategory;
        $cat->name = $request->name;
        $cat->part_category = $request->chap_category;
        $cat->unique_name = $unique_name;
        $cat->type = $request->type;
        $cat->status = '0';

        if($request->chap_category == 'topical'){
            $cat->topic_type =  $request->topic_type;
        }

        if ($cat->save()) {
            $permission = Permission::create(['name' => $unique_name]);
            toast('Part Created Successfully','success');
            return Redirect()->route('part.index');
        } else {

            return Redirect()->back()->withInputes();
        }

    }
    public function edit($id)
    {
        $subcats = SubSubCategory::all();
        $part = Part::findOrFail($id);
        return view('backend.pages.part.edit', compact('subcats','part'));
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
        $cat = Chapter::findOrFail($id);
        $cat->sub_sub_category_id = $request->subsubcategory;
        $cat->type = $request->type;
        $cat->name = $request->name;


        if ($cat->save()) {
            toast('Category Updated','success');
            return Redirect()->route('chapter.indexs');
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('chapter.indexs');
    }

    public function destroy($id)
    {
        if (Chapter::destroy($id)) {


            return redirect()->route('chapter.indexs');
        } else {

            return back();
        }
    }
}
