<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\Chapter;
use Alert;
use Session;
use Validator;

class ChapterController extends Controller
{
    public function indexs($type)
    {
        $chapters= Chapter::with('subsubcategory')->orderBy('created_at', 'desc')->paginate(10);

        return view('backend.pages.chapter.index', compact('chapters','type'));
    }

    public function creates($type)
    {
        $subcats = SubSubCategory::with('subcategory')->where('type',$type)->get();
        return view('backend.pages.chapter.create',compact('subcats'));
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
        $cat = new Chapter();
        $cat->sub_sub_category_id = $request->subcategory;
        $cat->name = $request->name;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Your Post as been submited!','success');
            return Redirect()->route('chapter.index');
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
        $cat->name = $request->name;


        if ($cat->save()) {
            toast('Category Updated','success');
            return Redirect()->route('chapter.index');
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('chapter.index');
    }

    public function destroy($id)
    {
        if (Chapter::destroy($id)) {


            return redirect()->route('chapter.index');
        } else {

            return back();
        }
    }

}
