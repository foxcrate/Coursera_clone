<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CyclePayment extends Model
{
    use HasFactory;

     protected $fillable = [
        'due_date',
        'amount_paid',
        'amount_left',
        'note',
        'status',
        'file' ,
        'student_id',
        'cycle_id',
    ];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function cycle(){
        return $this->belongsTo('App\Models\Cycle');
    }

}
