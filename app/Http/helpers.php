<?php
 use App\Models\Category;
 use App\Models\SubCategory;
 use App\Models\SubSubCategory;


 function getMainMenu(){
    $category = Category::all();
    return $category;
 }
 function getSubMenu($id){
   $subcat = SubCategory::where('category_id',$id)->get();
   return $subcat;
 }
 function getSubSubMenu($id){
    $subsubcat = SubSubCategory::where('sub_category_id',$id)->get();
    return $subsubcat;
 }
