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
        return $this->belongsTo('App\Models\Student');
    }

    public function semester(){
        return $this->belongsTo('App\Models\Semester');
    }

}
