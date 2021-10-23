<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function divideAdmins()
    {

        if(Auth::user()->level == 0){
            return view('admin/dashboard');
        }
    }    

}
