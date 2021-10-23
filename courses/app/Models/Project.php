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
    protected $table = "projects";

    public function semesters(){
        return $this->hasMany(Semester::class);
    }

    public function cycle(){
        return $this->belongsTo(Cycle::class);
    }

    public function request_to_project(){
        return $this->hasMany( 'RequestToProject::class');
    }

}
