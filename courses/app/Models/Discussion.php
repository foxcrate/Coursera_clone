<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'question',
        'answer',
    ];

    public function lesson(){
        $this->belongsTo('App\Models\Lesson','discussion_id','lesson_id');
    }

    public function student(){
        $this->belongsTo('App\Models\Student','discussion_id','student_id');
    }

}
