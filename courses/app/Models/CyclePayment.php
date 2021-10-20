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
    ];

    public function student(){
        $this->belongsTo('App\Models\Student','cycle_payment_id','student_id');
    }

    public function cycle(){
        $this->belongsTo('App\Models\Cycle','cycle_payment_id','cycle_id');
    }

}
