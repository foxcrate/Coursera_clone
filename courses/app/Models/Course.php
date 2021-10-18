<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function lesson(){
        $this->hasMany('App\Models\Lesson','course_id','lesson_id');
    }

    public function teacher(){
        $this->belongsTo('App\Models\Teacher','course_id','teaher_id');
    }



}
