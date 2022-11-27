<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\TopicalChapter;
use App\Models\Part;
use Alert;
use Session;
use Validator;

class TopicalChapterController extends Controller
{
    public function index()
    {
        $chapters= TopicalChapter::with('part')->orderBy('created_at', 'desc')->paginate(10);

        return view('backend.pages.topical_chapter.index', compact('chapters'));
    }

    public function create()
    {
        $parts = Part::with('subsubcategory')->where('part_category','topical')->get();

          return view('backend.pages.topical_chapter.create',compact('parts'));
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'part'=>'required',
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $cat = new TopicalChapter();
        $cat->part_id = $request->part;
        $cat->name = $request->name;
        $cat->type = $request->type;
        $cat->status = '0';
        if ($cat->save()){
            toast('Topical Chapter Created Successfully','success');
             return Redirect()->route('topical-chapter.index');
        } else {
            return Redirect()->back()->withInputes();
        }

    }
    public function edit($id)
    {
        $parts = Part::with('subsubcategory')->where('part_category','topical')->get();
        $chapter = TopicalChapter::findOrFail($id);
        return view('backend.pages.topical_chapter.edit', compact('parts','chapter'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ // <---
            'part'=>'required',
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $cat = TopicalChapter::findOrFail($id);
        $cat->part_id = $request->part;
        $cat->type = $request->type;
        $cat->name = $request->name;
        if ($cat->save()) {
            toast('Category Updated','success');
            return Redirect()->route('topical-chapter.index');
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('topical-chapter.index');
    }

    public function destroy($id)
    {
        if (TopicalChapter::destroy($id)) {
            return redirect()->route('topical-chapter.index');
        } else {

            return back();
        }
    }

}
