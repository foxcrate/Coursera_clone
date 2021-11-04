<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// , withHeadingRow
class ExcelImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$row){
            
            $u1 = User::create([
                'id'=>$key+40,
                'name'=>$row['name'],
                'email'=>$row['email'],
                'password'=>hash::make("12345"),
            ]);

        }
        
        
    }
}
