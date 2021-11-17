<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookPayment;
use Illuminate\Support\Facades\Auth;

class BookPaymentController extends Controller
{

    public function index(){
        if( Auth::user()->level != 0 && Auth::user()->level != 2 ){
            return redirect()->route('dashboard');
        }
        $all_book_payments= BookPayment::orderBy('id','desc')->paginate(8);
        //$all_lessons = "Alo";

        //return $all_lessons;
        return view('admin.book_payments.index')->with('book_payments',$all_book_payments) ;
    }

    public function add(Request $request){
        //return $request;

        // if($request->has('file')){
        //     $extension = $request->file('file')->extension();
        //     $full_file = $request->full_file;
        //     $code = rand(1111111, 9999999);
        //     $full_new_name=time().$code ."sf".'.'.$extension;
        //     $full_file->move('uploads/service payments/', $full_new_name);
        // }

        // $new_service_payment = ServicePayment::create([
        //     'note'=>$request->note,
        //     'file'=> 'uploads/service payments/' . $full_new_name,
        //     'money_paid'=>$request->money_paid,
        //     'status'=>$request->status,
        //     'student_id'=>$request->student_id,
        //     'service_id'=>$request->service_id,
        // ]);

        // return redirect()->back();

    }

    public function edit(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 2 ){
            return redirect()->route('dashboard');
        }
        //return $request;
        $my_book_payment = BookPayment::find($request->id);

        // $my_service_payment->cost = $request->cost ;
        $my_book_payment->note = $request->note ;
        // $my_service_payment->money_paid = $request->money_paid ;
        $my_book_payment->status = $request->status ;
        // $my_service_payment->student_id = $request->student_id ;
        // $my_service_payment->service_id = $request->service_id ;
        $my_book_payment->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 2 ){
            return redirect()->route('dashboard');
        }

        $the_book_payment = BookPayment::find($request->id);

        return $the_book_payment;

    }

    public function delete(Request $request){
        if( Auth::user()->level != 0 && Auth::user()->level != 2 ){
            return redirect()->route('dashboard');
        }
        $my_book_payment = BookPayment::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_book_payment->delete();
        //return $c;

        return redirect()->back();
    }

}
