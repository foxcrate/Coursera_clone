<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicePayment;

class ServicePaymentController extends Controller
{
    
    public function index(){
        $all_service_payments= ServicePayment::all();
        //$all_lessons = "Alo";
        
        //return $all_lessons;
        return view('admin.service_payments.index')->with('service_payments',$all_service_payments) ;
    }

    public function add(Request $request){
        //return $request;
        
        if($request->has('file')){
            $extension = $request->file('file')->extension();
            $full_file = $request->full_file;
            $code = rand(1111111, 9999999);
            $full_new_name=time().$code ."sf".'.'.$extension;
            $full_file->move('uploads/service payments/', $full_new_name);
        }

        $new_service_payment = ServicePayment::create([
            'note'=>$request->note,
            'file'=> 'uploads/service payments/' . $full_new_name,
            'money_paid'=>$request->money_paid,
            'status'=>$request->status,
            'student_id'=>$request->student_id,
            'service_id'=>$request->service_id,
        ]);
        
        return redirect()->back();

    }

    public function edit(Request $request){
        //return $request;
        $my_service_payment = ServicePayment::find($request->id);
        if($request->has('file')){
            $extension = $request->file('file')->extension();
            $file = $request->file;
            $code = rand(1111111, 9999999);
            $image_new_name=time().$code ."sf" .'.'.$extension;
            $file->move('uploads/service payments/', $image_new_name);
            $my_service_payment->file ='uploads/service payments/' . $image_new_name;
        }

        // $my_service_payment->cost = $request->cost ;
        $my_service_payment->note = $request->note ;
        // $my_service_payment->money_paid = $request->money_paid ;
        $my_service_payment->status = $request->status ;
        // $my_service_payment->student_id = $request->student_id ;
        // $my_service_payment->service_id = $request->service_id ;
        $my_service_payment->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){

        $the_service_payment = ServicePayment::find($request->id);

        return $the_service_payment;

    }

    public function delete(Request $request){
        $my_service_payment = ServicePayment::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_service_payment->delete();
        //return $c;

        return redirect()->back();
    }

}
