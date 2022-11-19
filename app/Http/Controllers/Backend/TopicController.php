<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Chapter;
use Alert;
use Session;
use Validator;
class TopicController extends Controller
{
    public function index()
    {
        $topic = Topic::with('chapter')->orderBy('created_at', 'desc')->paginate(10);


        return view('backend.pages.topic.index', compact('topic'));
    }

    public function create()
    {
        $chapter = Chapter::with('subsubcategory','subsubcategory.subject')->get();
        return view('backend.pages.topic.create',compact('chapter'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'chapter'=>'required',
            'name' => 'required',
            'type' => 'required'

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = new Topic();
        $cat->chapter_id = $request->chapter;
        $cat->name = $request->name;
        $cat->type = $request->type;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Your Post as been submited!','success');
            return Redirect()->route('topic.index');
        } else {

            return Redirect()->back()->withInputes();
        }

    }
    public function edit($id)
    {
        $cats = Chapter::all();
        $subcat = Topic::findOrFail($id);
        return view('backend.pages.topic.edit', compact('subcat','cats'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ // <---
            'category'=>'required',
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = Topic::findOrFail($id);
        $cat->chapter_id = $request->chapter;
        $cat->name = $request->name;
        $cat->status = '0';

        if ($cat->save()) {
            toast('Topic Updated','success');
            return Redirect()->route('topic.index');
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('topic.index');
    }

    public function destroy($id)
    {
        if (Topic::destroy($id)) {


            return redirect()->route('sub-cats.index');
        } else {

            return back();
        }
    }

}
