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
    public function index(Request $request)
    {
        $category = $request->get('category');
        $chapters= TopicalChapter::with('part')->where('chap_category', $category)->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.topical_chapter.index', compact('chapters','category'));
    }

    public function create(Request $request)
    {
        $category = $request->get('category');
        $parts = Part::with('subsubcategory')->where('part_category',$category)->get();
        return view('backend.pages.topical_chapter.create',compact('parts','category'));
        
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
        $cat->chap_category = $request->chap_category;
        $cat->name = $request->name;
        $cat->type = $request->type;
        $cat->status = '0';
        if ($cat->save()){
            toast('Topical Chapter Created Successfully','success');
            $url = route('topical-chapter.index').'?category='.$request->chap_category;
            return redirect()->to($url);
        } else {
            return Redirect()->back()->withInputes();
        }

    }
    public function edit(Request $request,$id)
    {
        $editcat=$request->get('editcat');
        $parts = Part::with('subsubcategory')->where('part_category',$editcat)->get();
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
            $url = route('topical-chapter.index').'?category='.$cat->chap_category;
            return redirect()->to($url);
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return Redirect()->route('topical-chapter.index');
    }

    public function destroy($id)
    {
        $data = TopicalChapter::find($id);
        if (TopicalChapter::destroy($id)) {
            $url = route('topical-chapter.index').'?category='.$data->chap_category;
            return redirect()->to($url);
        } else {

            return back();
        }
    }

}
