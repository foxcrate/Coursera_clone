<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'money_paid',
        'note',
        'status',
        'file',
        'student_id',
        'book_id',
    ];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }

}
