<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicalVideo extends Model
{
    use HasFactory;

    public function topicalchapter(){
        return $this->belongsTo(TopicalChapter::class,'topical_chapter_id','id');
    }
}
