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

    protected $table = "cycles";


    public function project(){
        return $this->hasOne(Project::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function cycle_payments(){
        return $this->hasMany(CyclePayment::class);
    }

}
