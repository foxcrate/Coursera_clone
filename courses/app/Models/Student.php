<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function calender(){
        return $this->hasOne( 'App\Models\Calender','student_id','calender_id');
    }

    // public function projects(){
    //     return $this->belongsToMany( 'Project::class','project_student','student_id','project_id');
    // }

    public function cycle(){
        return $this->belongsTo( 'Cycle::class','student_id','cycle_id');
    }

    public function uploaded_research(){
        return $this->hasMany( 'UploadedResearch::class','student_id','uploaded_research_id');
    }

    public function cycle_payment(){
        return $this->hasMany( 'CyclePayment::class','student_id','cycle_payment_id');
    }

    public function service_payment(){
        return $this->hasMany( 'ServicePayment::class','student_id','cycle_payment_id');
    }

}
