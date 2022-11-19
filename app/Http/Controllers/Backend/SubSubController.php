<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\SubSubCategory;
use Alert;
use Session;
use Validator;

class SubSubController extends Controller
{
    public function index()
    {
        $subcats = SubSubCategory::with('subject')->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.subSubCategory.index', compact('subcats'));
    }

    public function create()
    {
        $subcats = Subject::all();
        return view('backend.pages.subSubCategory.create',compact('subcats'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subcategory'=>'required',
            'name' => 'required',
            'slug' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = new SubSubCategory();
        $cat->subject_id = $request->subcategory;
         $cat->name = $request->name;
         $cat->type = $request->type;
        $cat->subsubcat_slug = $request->slug;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Your Post as been submited!','success');
            return Redirect()->route('sub-sub-cats.index');
        } else {

            return Redirect()->back()->withInputes();
        }

    }
    public function edit($id)
    {
        $cats = Subject::all();
        $subcat = SubSubCategory::findOrFail($id);
        return view('backend.pages.subSubCategory.edit', compact('subcat','cats'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subcategory'=>'required',
            'name' => 'required',
            'slug' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = SubSubCategory::findOrFail($id);
        $cat->subject_id = $request->subcategory;
        $cat->name = $request->name;
        $cat->type = $request->type;
        $cat->subsubcat_slug = $request->slug;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Category Updated','success');
            return Redirect()->route('sub-sub-cats.index');
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('sub-sub-cats.index');
    }

    public function destroy($id)
    {
        if (SubSubCategory::destroy($id)) {
            return redirect()->route('sub-sub-cats.index');
        } else {

            return back();
        }
    }

}
