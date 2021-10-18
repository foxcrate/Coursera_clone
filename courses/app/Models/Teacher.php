<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','image','bio',
    ];

    public function course(){
        $this->hasMany('App\Models\Course','teacher_id','course_id');
    }

}
