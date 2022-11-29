<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Part;
use App\Models\SubSubCategory;
use Alert;
use Session;
use Validator;
use Spatie\Permission\Models\Permission;
use DB;

class PartController extends Controller
{
    public function index(Request $request)
    {
        $createcat = $request->get('indexcat');
        $parts= Part::with('subsubcategory')->where('part_category',$createcat)->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.part.index', compact('parts','createcat'));
    }

    public function create(Request $request)
    {
        $createcat = $request->get('createform');
        $subcats = SubSubCategory::with('subject')->where('type',$createcat)->get();
        return view('backend.pages.part.create',compact('subcats','createcat'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'subcategory'=>'required',
            'name' => 'required',
            'part_category' =>'required'

        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        DB::beginTransaction();

        $username = Part::latest()->pluck('unique_name')->first();
        if($username){
            $usersplit = str_split( $username,5);
            $usersplit_lts = (int)$usersplit[1] + 1;
           $unique_name = "LMSN-".$usersplit_lts;
            
        }
        else{
            $unique_name = "LMSN-1";
           
        }
        $cat = new Part();
        $cat->sub_sub_category_id = $request->subcategory;
        $cat->name = $request->name;
        $cat->part_category = $request->part_category;
        $cat->unique_name = $unique_name;
        $cat->type = $request->type;
        $cat->status = '0';

        if($request->chap_category == 'topical'){
            $cat->topic_type =  $request->topic_type;
        }

        if ($cat->save()) {
            $permission = Permission::create(['name' => $unique_name]);
            DB::commit();
            toast('Part Created Successfully','success');
            $url = route('parts.index').'?indexcat='.$request->part_category;
            return redirect()->to($url);
            
        } else {
            DB::rollback();
            return Redirect()->back()->withInputes();
        }

    }
    public function edit(Request $request,$id)
    {
        $editcat=$request->get('editcat');
        $subcats = SubSubCategory::with('subject')->where('type',$editcat)->get();
        $part = Part::findOrFail($id);
        return view('backend.pages.part.edit', compact('subcats','part'));
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
        $cat = Part::findOrFail($id);
        $cat->sub_sub_category_id = $request->subsubcategory;
        $cat->type = $request->type;
        $cat->name = $request->name;

        if ($cat->save()) {
            toast('Part Updated','success');
            $url = route('parts.index').'?indexcat='.$cat->part_category;
            
        } else {
            toast('Operation Failed','error');
            return Redirect()->back()->withInputes();
        }
        return redirect()->to($url);
    }
    public function destroy($id)
    {

        $part = Part::find($id);
        $permission = Permission::where('name',$part->unique_name)->delete();
        if (Part::destroy($id)) {
            $url = route('parts.index').'?indexcat='.$part->part_category;
            return redirect()->to($url);

        } else {
            return back();
        }
    }
}
