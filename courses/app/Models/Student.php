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
        'name',
        'email',
        'password',
        'case',
        'phone1',
        'phone2',
        'passport',
        'job',
        'country',
        'general_note',
        'payment_note',
        'due_date',
        'money_paid',
        'money_to_pay',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function calenders(){
        return $this->hasMany( 'App\Models\Calender');
    }

    public function cycle(){
        return $this->belongsTo( Cycle::class);
    }

    public function uploaded_researches(){
        return $this->hasMany( 'UploadedResearch::class');
    }

    public function cycles_payment(){
        return $this->hasMany( 'CyclePayment::class');
    }

    public function services_payment(){
        return $this->hasMany( 'ServicePayment::class');
    }

    public function requests_to_projects(){
        return $this->hasMany( 'RequestToProject::class');
    }

}
