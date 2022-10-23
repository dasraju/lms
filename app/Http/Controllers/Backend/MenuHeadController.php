<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\MenuHead;
use Alert;
use Session;
use Validator;

use Illuminate\Http\Request;

class MenuHeadController extends Controller
{
    public function index()
    {
        $cats = MenuHead::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.menuhead.index', compact('cats'));
    }

    public function create()
    {
        return view('backend.pages.menuhead.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = new MenuHead();
        $cat->name = $request->name;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Menu Saved Successfully','success');
            return Redirect()->route('menu-head.index');
        } else {

            return Redirect()->back()->withInputes();
        }

    }
    public function edit($id)
    {
        $cat = MenuHead::findOrFail($id);
        return view('backend.pages.menuhead.edit', compact('cat'));
    }
    public function update(Request $request, $id)
    {
        $cat = MenuHead::findOrFail($id);
        $cat->name = $request->name;
        if ($cat->save()) {
            toast('Menuhead Updated','success');
            return Redirect()->route('menu-head.index');
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('menu-head.index');
    }

    public function destroy($id)
    {
        if (MenuHead::destroy($id)) {


            return redirect()->route('menu-head.index');
        } else {
            Session::flash('flash_message', 'Wrong  details. ');
            Session::flash('flash_type', 'error');
            return back();
        }
    }

}
