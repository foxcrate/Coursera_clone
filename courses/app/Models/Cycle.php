<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'start_date',
    ];


    public function project(){
        return $this->hasOne('App\Models\Project','cycle_id','project_id');
    }

    public function students(){
        return $this->hasMany('App\Models\Student','cycle_id','student_id');
    }

    public function cycle_payment(){
        return $this->hasMany('App\Models\CyclePayment','cycle_id','cycle_payment_id');
    }

}
