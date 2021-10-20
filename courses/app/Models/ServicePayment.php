<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'money_paid',
        'note',
        'status',
        'file',
    ];

    public function student(){
        $this->belongsTo('App\Models\Student','service_payment_id','student_id');
    }

    public function service(){
        $this->belongsTo('App\Models\Service','service_payment_id','service_id');
    }

}
