<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicalVideo extends Model
{
    use HasFactory;

    public function chapter(){
        return $this->belongsTo(TopicalChapter::class);
    }
}
