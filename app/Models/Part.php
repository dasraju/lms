<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function subsubcategory(){

        return $this->belongsTo(SubSubCategory::class,'sub_sub_category_id','id');
    }
}
