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
        return $this->belongsTo('App\Models\Student');
    }

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }

}
