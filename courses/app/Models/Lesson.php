<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'file',
        'video',
    ];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function question(){
        return $this->hasOne('App\Models\LessonQuestion');
    }

}
