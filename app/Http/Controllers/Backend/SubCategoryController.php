<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Subject;
use Alert;
use Session;
use Validator;


class SubCategoryController extends Controller
{
    public function index()
    {
        $subcats = SubCategory::with('subject')->orderBy('created_at', 'desc')->paginate(10);


        return view('backend.pages.subCategory.index', compact('subcats'));
    }

    public function create()
    {
        $cats = Subject::all();
        return view('backend.pages.subCategory.create',compact('cats'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subject'=>'required',
            'name' => 'required',
            'slug' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = new SubCategory();
        $cat->subject_id = $request->subject;
         $cat->name = $request->name;
        $cat->subcat_slug = $request->slug;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Your Post as been submited!','success');
            return Redirect()->route('sub-cats.index');
        } else {

            return Redirect()->back()->withInputes();
        }

    }
    public function edit($id)
    {
        $cats = Subject::all();
        $subcat = SubCategory::findOrFail($id);
        return view('backend.pages.subCategory.edit', compact('subcat','cats'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subject'=>'required',
            'name' => 'required',
            'slug' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = SubCategory::findOrFail($id);
        $cat->subject_id = $request->subject;
        $cat->name = $request->name;
        $cat->subcat_slug = $request->slug;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Category Updated','success');
            return Redirect()->route('sub-cats.index');
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('cats.index');
    }

    public function destroy($id)
    {
        if (SubCategory::destroy($id)) {


            return redirect()->route('sub-cats.index');
        } else {

            return back();
        }
    }

}
