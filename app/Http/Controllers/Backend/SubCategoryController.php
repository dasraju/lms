<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Alert;
use Session;
use Validator;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcats = SubCategory::with('category')->orderBy('created_at', 'desc')->paginate(10);

        return view('backend.pages.subCategory.index', compact('subcats'));
    }

    public function create()
    {
        return view('backend.pages.subCategory.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'name' => 'required',
            'slug' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = new SubCategory();
        $cat->name = $request->name;
        $cat->cat_slug = $request->slug;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Your Post as been submited!','success');
            return Redirect()->route('cats.index');
        } else {

            return Redirect()->back()->withInputes();
        }

    }
    public function edit($id)
    {
        $cat = SubCategory::findOrFail($id);
        return view('backend.pages.category.edit', compact('cat'));
    }
    public function update(Request $request, $id)
    {
        $cat = SubCategory::findOrFail($id);
        $cat->name = $request->name;
        $cat->cat_slug = $request->slug;

        if ($cat->save()) {
            toast('Category Updated','success');
            return Redirect()->route('cats.index');
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('cats.index');
    }

    public function destroy($id)
    {
        if (SubCategory::destroy($id)) {


            return redirect()->route('cats.index');
        } else {

            return back();
        }
    }

}
