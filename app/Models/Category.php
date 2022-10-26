<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;


    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function menu()
    {
        return $this->belongsTo(MenuHead::class,'menu_head_id','id');
    }
}
