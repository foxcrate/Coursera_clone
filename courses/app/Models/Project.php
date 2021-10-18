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

}
