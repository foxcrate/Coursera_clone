<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'name',
        'email',
        'password',
        'password2',
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
        'remaining_free_books',
    ];

    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    protected $hidden = [
        'remember_token',
    ];

    public function calenders(){
        return $this->hasMany( 'App\Models\Calender');
    }

    public function cycle(){
        return $this->belongsTo( 'App\Models\Cycle');
    }

    public function all_cycles(){
        return $this->belongsToMany(Cycle::class,'cycle_students')->distinct();
    }

    // public function all_enabled_cycles(){
    //     return 0;
    // }

    public function all_cycles_array(){
        $all_cycles = $this->all_cycles;
        $all_cycles_array = array();
        //return $all_cycles;
        foreach( $all_cycles as $cycle ){
            array_push( $all_cycles_array , $cycle->project->id );
        }
        return $all_cycles_array;
    }

    public function get_cycles_with_money(){
        //return $this->id;
        $cycles_with_money = [];
        $student_cycles = $this->all_cycles;

        //return $student_cycles;

        foreach( $student_cycles as $cycle ){
            if($cycle->enabled == 1){
                $num_of_semesters = $cycle->project->semesters_num();
                $num_of_courses = count( $cycle->project->all_courses() );
                $paid_money= 0 ;
                $all_cycle_payment = CyclePayment::where('student_id',$this->id)->where( 'cycle_id' , $cycle->id )->where( 'status' , 'accepted' )->get();
                //return $all_cycle_payment;
                foreach( $all_cycle_payment as $cycle_payment ){
                    $paid_money += $cycle_payment->amount_paid;
                }
                array_push( $cycles_with_money , [ 'cycle' => $cycle , 'money_paid' => $paid_money , 'num_of_semesters' => $num_of_semesters , 'num_of_courses' => $num_of_courses ] );
            }
        }
        return $cycles_with_money;
    }

    public function books(){
        return $this->belongsToMany(Book::class,'book_students')->distinct();
    }

    public function uploaded_researches(){
        return $this->hasMany( 'UploadedResearch::class');
    }

    public function cycles_payment(){
        return $this->hasMany(CyclePayment::class);
    }

    public function services_payment(){
        return $this->hasMany( 'ServicePayment::class');
    }

    public function books_payment(){
        return $this->hasMany( 'BookPayment::class');
    }

    public function requests_to_projects(){
        return $this->hasMany( 'RequestToProject::class');
    }

}
