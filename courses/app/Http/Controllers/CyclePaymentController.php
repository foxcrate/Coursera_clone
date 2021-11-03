<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Cycle;
use App\Models\Project;
use App\Models\CyclePayment;

class CyclePaymentController extends Controller
{
    public function project_enroll(Request $request){
        //return $request;
        
        $payment = $request->payment;
        $code = rand(1111111, 9999999);
        $payment_new_name=time().$code ."pf";
        $payment->move('uploads/cycle_payments/', $payment_new_name);

        $the_cycle_payment = CyclePayment::create([
            'status' =>'pending' ,
            'file'  => 'uploads/cycle_payments/' . $payment_new_name,
            'student_id' => $request->student_id,
            'cycle_id' => $request->project_id,
        ]);

        return redirect()->back();

    }
}
