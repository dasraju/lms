<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;


     public function subsubcategory(){

        return $this->belongsTo(SubSubCategory::class,'sub_sub_category_id','id');
    }
    public function folderpdf()
    {
        return $this->hasMany(ResourceFolderPdf::class,'folder_id','id');
    }
}
