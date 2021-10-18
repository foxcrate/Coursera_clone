<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calender;
use App\Models\Student;

class TestController extends Controller
{
    public function test(){

        $student = Student::find(1);

        dd( $student->calender );
    }
}
