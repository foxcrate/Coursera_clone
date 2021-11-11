<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterCalender extends Model
{
    use HasFactory;
    protected $table = 'semester_calender';

    protected $fillable = [
        'project_id',
        'semester1_id',
        'semester2_id',
        'semester3_id',
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project','id','project_id');
    }

    public function semester1(){
        return $this->belongsTo('App\Models\Semester','semester1_id');
    }

    public function semester2(){
        return $this->belongsTo('App\Models\Semester','semester2_id');
    }

    public function semester3(){
        return $this->belongsTo('App\Models\Semester','semester3_id');
    }

}
