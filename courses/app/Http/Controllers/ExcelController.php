<?php

namespace App\Http\Controllers;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    public function import_data(Request $request){

        $request->validate([
            'excel_file' =>'required|mimes:xls,xlsx,csv'
        ]);


        $file =$request->file('excel_file');
        //dd($file);
        Excel::import(new ExcelImport , $file);
        return "Done";
    }
}