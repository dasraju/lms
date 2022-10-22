<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;



    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function subsubcategories()
    {
        return $this->hasMany(SubSubCategory::class);
    }
}
