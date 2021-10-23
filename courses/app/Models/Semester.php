<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
    ];

    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }

    public function research(){
        return $this->hasOne('App\Models\Research');
    }

    public function uploaded_researches(){
        return $this->hasMany( 'UploadedResearch::class');
    }
    
}
