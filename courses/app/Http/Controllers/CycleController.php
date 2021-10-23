<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cycle;
use App\Models\Semester;
use App\Models\Project;

class CycleController extends Controller
{
    
    public function index(){
        $all_cycles = Cycle::all();
        
        return view('admin.cycles.index') ;
    }

}
