<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'question',
        'answer',
        'status',
    ];

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

}
