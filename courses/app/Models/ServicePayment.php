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
        'student_id',
        'service_id',
    ];

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }

}
