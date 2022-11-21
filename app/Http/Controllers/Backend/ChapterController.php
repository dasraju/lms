<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\Chapter;
use Alert;
use Session;
use Validator;
use Spatie\Permission\Models\Permission;

class ChapterController extends Controller
{
    public function indexs($type)
    {
        $chapters= Chapter::with('subsubcategory')->orderBy('created_at', 'desc')->paginate(10);

        return view('backend.pages.chapter.index', compact('chapters','type'));
    }

    public function creates($type)
    {
        $subcats = SubSubCategory::with('subject')->where('type',$type)->get();
        if($type == 'Revision'){
          return view('backend.pages.chapter.create',compact('subcats','type'));
        }
        else{
          return view('backend.pages.chapter.topic_chp_create',compact('subcats','type'));
        }
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subcategory'=>'required',
            'name' => 'required',
            'chap_category' =>'required'

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $username = Chapter::latest()->pluck('unique_name')->first();
        if($username){
            $usersplit = str_split( $username,6);
            $usersplit_lts = (int)$usersplit[1] + 1;
           $unique_name = "LMSCP-".$usersplit_lts;
            
        }
        else{
            $unique_name = "LMSCP-1";
           
        }
        $cat = new Chapter();
        $cat->sub_sub_category_id = $request->subcategory;
        $cat->name = $request->name;
        $cat->chap_category = $request->chap_category;
        $cat->unique_name = $unique_name;
        $cat->type = $request->type;
        $cat->status = '0';

        if($request->chap_category == 'topical'){
            $cat->topic_type =  $request->topic_type;
        }

        if ($cat->save()) {
            $permission = Permission::create(['name' => $unique_name]);
            toast('Your Post as been submited!','success');
            return Redirect()->route('chapter.indexs',$request->type);
        } else {

            return Redirect()->back()->withInputes();
        }

    }
    public function edit($id)
    {
        $subcats = SubSubCategory::all();
        $chapter = Chapter::findOrFail($id);
        return view('backend.pages.chapter.edit', compact('subcats','chapter'));
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
