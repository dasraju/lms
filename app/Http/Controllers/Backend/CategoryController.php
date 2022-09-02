<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Alert;
use Session;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.category.index', compact('cats'));
    }

    public function create()
    {
        return view('backend.pages.category.create');
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
        $cat = new Category();
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
        $cat = Category::findOrFail($id);
        return view('backend.pages.category.edit', compact('cat'));
    }
    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($id);
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
        if (Category::destroy($id)) {


            return redirect()->route('cats.index');
        } else {
            Session::flash('flash_message', 'Wrong  details. ');
            Session::flash('flash_type', 'error');
            return back();
        }
    }

}
