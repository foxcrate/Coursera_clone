<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCalender extends Model
{
    use HasFactory;

    protected $table = 'course_calender';

    protected $fillable = [
        'semester_id',
        'course1_id',
        'course2_id',
        'course3_id',
        'course4_id',
        'course5_id',
        'course6_id',
        'course7_id',
        'course8_id',
        'course9_id',
        'course10_id',
        'course11_id',
        'course12_id',
    ];

    public function semester(){
        return $this->belongsTo('App\Models\Semester','id','semester_id');
    }

    public function course1(){
        return $this->belongsTo('App\Models\Course','course1_id');
    }

    public function course2(){
        return $this->belongsTo('App\Models\Course','course2_id');
    }

    public function course3(){
        return $this->belongsTo('App\Models\Course','course3_id');
    }

    public function course4(){
        return $this->belongsTo('App\Models\Course','course4_id');
    }

    public function course5(){
        return $this->belongsTo('App\Models\Course','course5_id');
    }

    public function course6(){
        return $this->belongsTo('App\Models\Course','course6_id');
    }

    public function course7(){
        return $this->belongsTo('App\Models\Course','course7_id');
    }

    public function course8(){
        return $this->belongsTo('App\Models\Course','course8_id');
    }

    public function course9(){
        return $this->belongsTo('App\Models\Course','course9_id');
    }

    public function course10(){
        return $this->belongsTo('App\Models\Course','course10_id');
    }

    public function course11(){
        return $this->belongsTo('App\Models\Course','course11_id');
    }

    public function course12(){
        return $this->belongsTo('App\Models\Course','course12_id');
    }

}
