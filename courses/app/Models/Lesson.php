<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;


    public function course(){
        $this->belongsTo('App\Models\Course','lesson_id','course_id');
    }

}
