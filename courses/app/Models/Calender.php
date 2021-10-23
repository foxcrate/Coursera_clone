<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'progress',
    ];


    public function student(){
        return $this->belongsTo( 'App\Models\Student');
    }

}
