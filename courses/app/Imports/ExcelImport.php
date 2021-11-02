<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$row){
            if($key > 0){
                User::create([
                    'name'=>$row[0],
                    'email'=>$row[1],
                    'password'=>hash::make('qweasdzxc'),
                ]);
            }

        }
        
    }
}
