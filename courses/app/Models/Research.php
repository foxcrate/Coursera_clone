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
        return $this->belongsTo('App\Models\Semester');
    }

}
