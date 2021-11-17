<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'start_date','enabled','id','project_id',
    ];

    protected $table = "cycles";

    public function all_students(){
        return $this->belongsToMany(Student::class,'cycle_students');
    }

    // public function project(){
    //     return $this->hasOne(Project::class);
    // }


    public function project(){
        return $this->belongsTo(Project::class);
    }



    public function cycle_payments(){
        return $this->hasMany(CyclePayment::class);
    }

    public function students(){
        return $this->hasMany( 'App\Models\Student');
    }

    public function assignments(){
        return $this->hasMany( 'App\Models\Assignment');
    }

}
