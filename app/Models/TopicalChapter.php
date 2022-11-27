<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicalChapter extends Model
{
    use HasFactory;


    public function part(){

        return $this->belongsTo(Part::class);
    }
}
