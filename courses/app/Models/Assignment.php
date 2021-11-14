<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments';

    protected $fillable = [
        'start_date',
        'end_date',
        'grade',
        'semester_or_course',
        'student_id',
        'cycle_id',
        'project_id',
        'semester_id',
        'course_id',
    ];

    public function student(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
    public function cycle(){
        return $this->belongsTo('App\Models\Cycle','cycle_id');
    }
    public function project(){
        return $this->belongsTo('App\Models\Project','project_id');
    }
    public function semester(){
        return $this->belongsTo('App\Models\Semester','semester_id');
    }
    public function course(){
        return $this->belongsTo('App\Models\Course','course_id');
    }

}
