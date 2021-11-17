<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServicePayment;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function index(){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $all_services = Service::orderBy('id','desc')->paginate(10);
        //$all_lessons = "Alo";

        //return $all_lessons;
        return view('admin.services.index')->with('services',$all_services) ;
    }

    public function buy_service(Request $request){
        //return $request;
        $extension = $request->file('file')->extension();
        $file = $request->file;
        $code = rand(1111111, 9999999);
        $file_new_name=time().$code ."spf".'.'.$extension;
        $file->move('uploads/service_payments/', $file_new_name);

        $the_service_payment = ServicePayment::create([
            'file'=> 'uploads/service_payments/' . $file_new_name,
            'student_id'=> Auth::user()->id,
            'service_id'=> $request->service_id,
            'note'=> $request->note,
        ]);

        return redirect()->back();
    }

    public function add(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        //return $request;
        if($request->has('photo')){
            $image = $request->photo;
            $code = rand(1111111, 9999999);
            $image_new_name=time().$code ."sp";
            $image->move('uploads/services/', $image_new_name);
        }

        $new_service = Service::create([
            'photo'=>'uploads/services/' . $image_new_name,
            'name'=>$request->name,
            'cost'=>$request->cost,
            'summery'=>$request->summery,
            'details'=>$request->details,
        ]);

        return redirect()->back();

    }

    public function edit(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        //return $request;
        //echo $request;
        $my_service = Service::find($request->id);
        //return $request->name;
        //$my_service->photo = $request->photo ;
        if($request->has('photo')){
            $image = $request->photo;
            $code = rand(1111111, 9999999);
            $image_new_name=time().$code ."sp";
            $image->move('uploads/services/', $image_new_name);
            $my_service->photo ='uploads/services/' . $image_new_name;
        }
        $my_service->name = $request->name ;
        $my_service->cost = $request->cost ;
        $my_service->summery = $request->summery ;
        $my_service->details = $request->details ;
        $my_service->save();

        return redirect()->back();
    }

    public function data_to_edit(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }

        $the_service = Service::find($request->id);

        return $the_service;

    }

    public function delete(Request $request){
        if(Auth::user()->level != 0 ){
            return redirect()->route('dashboard');
        }
        $my_service = Service::find($request->id);
        // $my_course = Semester::destroy($request->id);
        // return $my_course;
        $c = $my_service->delete();
        //return $c;

        return redirect()->back();
    }


}
