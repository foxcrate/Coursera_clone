<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo', 'name', 'cost',
        'summery','details',
    ];

    public function service_payment(){
        return $this->hasMany( 'ServicePayment::class');
    }

}
