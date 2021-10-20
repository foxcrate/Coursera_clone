<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestToProject extends Model
{
    use HasFactory;

    protected $fillable = [
    ];

    public function student(){
        $this->belongsTo('App\Models\Student','request_to_project_id','student_id');
    }

    public function project(){
        $this->belongsTo('App\Models\Project','request_to_project_id','project_id');
    }

}
