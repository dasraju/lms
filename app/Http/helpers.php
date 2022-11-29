<?php
 use App\Models\Category;
 use App\Models\SubCategory;
 use App\Models\SubSubCategory;
 use App\Models\Topic;
 use App\Models\MenuHead;
 use App\Models\Subject;
 use App\Models\TopicalChapter;

 function getMainMenu(){
    $menus = MenuHead::all();
    return $menus;
 }
 function getSubMenu($id){
   $cat = Category::where('menu_head_id',$id)->get();
   return $cat;
 }
 function getSubjectList($id){
    $cat = Subject::where('Category_id',$id)->get();
    return $cat;
  }
 function getSubSubMenu($id){
    $subcat = SubCategory::where('subject_id',$id)->orderBy('created_at','asc')->get();
    return $subcat;
 }
 function topic($id){
  $topic = Topic::where('chapter_id',$id)->get();
  return $topic;
 }

 function topical_chapter($id){
    $chapter = TopicalChapter::where('part_id',$id)->get();
    return $chapter;
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

