<?php
 use App\Models\Category;
 use App\Models\SubCategory;
 use App\Models\SubSubCategory;
 use App\Models\Topic;

 function getMainMenu(){
    $category = Category::all();
    return $category;
 }
 function getSubMenu($id){
   $subcat = SubCategory::where('category_id',$id)->get();
   return $subcat;
 }
 function getSubSubMenu($id){
    $subsubcat = SubSubCategory::where('sub_category_id',$id)->orderBy('created_at','asc')->get();
    return $subsubcat;
 }
 function topic($id){
  $topic = Topic::where('chapter_id',$id)->get();
  return $topic;
 }

 if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }

        }

    }
}

if (!function_exists('areActiveTrees')) {
    function areActiveTrees(array $routes, $output = "menu-open")
    {

        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }

        }

    }
}

if (!function_exists('userActiveRoute')) {
    function userActiveRoute(array $routes, $output = "current_page_item")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            }

        }

    }
}

