<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

class Topic extends Model
{
    use HasFactory;

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
}
