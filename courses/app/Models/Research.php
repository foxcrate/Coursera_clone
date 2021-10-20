<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function semester(){
        $this->belongsTo('App\Models\Semester','research_id','semester_id');
    }

}
