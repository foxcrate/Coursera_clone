<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'abstract_file',
        'full_file',
        'cover',
        'cost',
    ];

    public function students(){
        return $this->belongsToMany(Student::class,'book_students');
    }

    public function book_payment(){
        return $this->hasMany( 'BookPayment::class');
    }

}
