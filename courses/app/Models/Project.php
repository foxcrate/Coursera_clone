<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'type',
        'video',
        'price',
        'summery',
    ];

    public function semester(){
        $this->hasMany('App\Models\Semester','project_id','semester_id');
    }

    public function cycle(){
        $this->belongsTo('App\Models\Cycle','project_id','cycle_id');
    }

    // public function students(){
    //     return $this->belongsToMany( 'Student::class','project_student','project_id','student_id');
    // }

}
