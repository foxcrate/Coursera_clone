<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Cycle;
use App\Models\Project;
use App\Models\CyclePayment;
use Illuminate\Support\Facades\Auth;

class CyclePaymentController extends Controller
{
    public function project_enroll(Request $request){
        //return $request;

        // $payment = $request->payment;
        // $code = rand(1111111, 9999999);
        // $payment_new_name=time().$code ."pf";
        // $payment->move('uploads/cycle_payments/', $payment_new_name);

        // $the_cycle_payment = CyclePayment::create([
        //     'status' =>'pending' ,
        //     'file'  => 'uploads/cycle_payments/' . $payment_new_name,
        //     'student_id' => $request->student_id,
        //     'cycle_id' => $request->project_id,
        // ]);

        // return redirect()->back();

    }

    public function pay_cycle(Request $request){
        //return $request;
        $payment = $request->file;
        $code = rand(1111111, 9999999);
        $payment_new_name=time().$code ."pf";
        $payment->move('uploads/cycle_payments/', $payment_new_name);

        $the_cycle_payment = CyclePayment::create([
            'status' =>'pending' ,
            'file'  => 'uploads/cycle_payments/' . $payment_new_name,
            'student_id' => Auth::user()->id ,
            'cycle_id' => $request->cycle_id,
        ]);

        return redirect()->back();

    }

    public function index(){
        if( Auth::user()->level != 0 && Auth::user()->level != 2 ){
            return redirect()->route('dashboard');
        }
        $all_cycles_payments = CyclePayment::orderBy('id','desc')->paginate(9);

        return view('admin.cycle_payments.index')->with('all_cycles_payments',$all_cycles_payments);
    }

    public function edit(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 2 ){
            return redirect()->route('dashboard');
        }
        $the_cycles_payments = CyclePayment::find($request->id);

        $the_cycles_payments->amount_paid = $request-> amount_paid ;
        $the_cycles_payments->status = $request-> status ;
        $the_cycles_payments->note = $request-> note ;

        $the_cycles_payments->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 2 ){
            return redirect()->route('dashboard');
        }
        $the_cycles_payments = CyclePayment::find($request->id);
        //return "Alo";
        return $the_cycles_payments;
        return view('admin.cycle_payments.index')->with('the_cycles_payments',$the_cycles_payments);
    }
}
