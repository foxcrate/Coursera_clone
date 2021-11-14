<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Cycle;
use Carbon\Carbon;

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

    public function assignments(){
        return $this->hasMany( 'App\Models\Assignment');
    }

    public function cycle(){
        return $this->belongsTo( 'App\Models\Cycle');
    }

    public function all_cycles(){
        return $this->belongsToMany(Cycle::class,'cycle_students')->distinct();
    }

    public function make_assignments($cycle_id){
        $the_cycle = Cycle::find($cycle_id) ;
        $cycle_start_date = Carbon::create($the_cycle->start_date);
        //return $cycle_start_date ;
        $the_project = $the_cycle->project;

        if(  $the_project->semester_calender->semester1 != null ){

            $start_date = Carbon::create($cycle_start_date) ;
            $end_date = Carbon::create($cycle_start_date) ;
            $research_days = $the_project->semester_calender->semester1->research_days;
            $end_date = $end_date->addDays($research_days);

            $this->create_semester_assignment($start_date , $end_date , $this->id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->id );
            $this->make_courses_assignments( $start_date , $this->id , $cycle_id , $the_project , 1 );



            if(  $the_project->semester_calender->semester2 != null ){
                $start_date = Carbon::create( $start_date->addWeeks( $the_project->semester_calender->semester1->duration ) );
                $end_date = Carbon::create( $start_date->addWeeks( $the_project->semester_calender->semester1->duration ) );
                $research_days = $the_project->semester_calender->semester2->research_days;
                $end_date = $end_date->addDays($research_days);

                $this->create_semester_assignment($start_date , $end_date , $this->id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->id );
                $this->make_courses_assignments( $start_date , $this->id , $cycle_id , $the_project , 2 );



                if(  $the_project->semester_calender->semester3 != null ){
                    $start_date = Carbon::create( $start_date->addWeeks( $the_project->semester_calender->semester2->duration ) );
                    $end_date = Carbon::create( $start_date->addWeeks( $the_project->semester_calender->semester2->duration ) );
                    $research_days = $the_project->semester_calender->semester3->research_days;
                    $end_date = $end_date->addDays($research_days);

                    $this->create_semester_assignment($start_date , $end_date , $this->id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->id );
                    $this->make_courses_assignments( $start_date , $this->id , $cycle_id , $the_project , 3 );


                }

            }

        }

    }

    public function create_semester_assignment($start_date , $end_date , $student_id , $cycle_id , $project_id , $semester_id ){

        $as = Assignment::create([
            'start_date'=> $start_date ,
            'end_date'=> $end_date ,
            'semester_or_course'=> 'semester' ,
            'student_id'=> $student_id ,
            'cycle_id'=> $cycle_id ,
            'project_id'=> $project_id,
            'semester_id'=> $semester_id ,
        ]);

    }

    public function create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $project_id , $course_id ){

        $as = Assignment::create([
            'start_date'=> $start_date ,
            'end_date'=> $end_date ,
            'semester_or_course'=> 'course' ,
            'student_id'=> $student_id ,
            'cycle_id'=> $cycle_id ,
            'project_id'=> $project_id,
            'course_id'=> $course_id ,
        ]);

    }

    public function make_courses_assignments( $start_date, $student_id , $cycle_id , $the_project , $sem_num ){

        if($sem_num == 1){
            if( $the_project->semester_calender->semester1->course_calender->course1 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $end_date_1 = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course1->exam_days;
                $end_date = Carbon::create($end_date->addDays( $exam_days ) );
                $end_date_1 = Carbon::create($end_date_1->addDays( $exam_days ) );

                $this->create_course_assignment($start_date , $end_date_1 , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course1->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course2 != null ){

                $start_date = Carbon::create($end_date) ;
                $end_date = Carbon::create($end_date) ;
                $end_date_1 = Carbon::create($end_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course2->exam_days;
                $end_date = Carbon::create($end_date->addDays( $exam_days ) );
                $end_date_1 = Carbon::create($end_date_1->addDays( $exam_days ) );

                $this->create_course_assignment($start_date , $end_date_1 , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course2->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course3 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course3->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course3->id );

            } if( $the_project->semester_calender->semester1->course_calender->course4 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course4->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course4->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course5 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course5->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course5->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course6 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course6->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course6->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course7 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course7->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course7->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course8 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course8->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course8->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course9 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course9->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course9->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course10 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course10->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course10->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course11 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course11->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course11->id );

            }
            if( $the_project->semester_calender->semester1->course_calender->course12 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester1->course_calender->course12->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester1->course_calender->course12->id );

            }

        }

        if($sem_num == 2){
            if( $the_project->semester_calender->semester2->course_calender->course1 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course1->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course1->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course2 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course2->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course2->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course3 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course3->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course3->id );

            } if( $the_project->semester_calender->semester2->course_calender->course4 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course4->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course4->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course5 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course5->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course5->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course6 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course6->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course6->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course7 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course7->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course7->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course8 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course8->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course8->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course9 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course9->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course9->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course10 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course10->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course10->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course11 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course11->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course11->id );

            }
            if( $the_project->semester_calender->semester2->course_calender->course12 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester2->course_calender->course12->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester2->course_calender->course12->id );

            }

        }

        if($sem_num == 3){
            if( $the_project->semester_calender->semester3->course_calender->course1 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course1->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course1->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course2 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course2->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course2->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course3 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course3->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course3->id );

            } if( $the_project->semester_calender->semester3->course_calender->course4 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course4->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course4->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course5 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course5->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course5->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course6 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course6->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course6->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course7 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course7->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course7->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course8 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course8->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course8->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course9 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course9->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course9->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course10 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course10->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course10->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course11 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course11->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course11->id );

            }
            if( $the_project->semester_calender->semester3->course_calender->course12 != null ){

                $start_date = Carbon::create($start_date) ;
                $end_date = Carbon::create($start_date) ;
                $exam_days = $the_project->semester_calender->semester3->course_calender->course12->exam_days;
                $end_date = $end_date->addDays( $exam_days ) ;

                $this->create_course_assignment($start_date , $end_date , $student_id , $cycle_id , $the_project->id , $the_project->semester_calender->semester3->course_calender->course12->id );

            }

        }

    }

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
