<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedResearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'description',
        'status',
    ];

    public function student(){
        $this->belongsTo('App\Models\Student','uploaded_research_id','student_id');
    }

    public function semester(){
        $this->belongsTo('App\Models\Semester','uploaded_research_id','semester_id');
    }

}
