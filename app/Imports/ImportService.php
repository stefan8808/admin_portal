<?php

namespace App\Imports;

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use App\Models\Service;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportService implements ToModel,WithHeadingRow
{

   
   

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {    
        $obj = new CustomerController;
        $id = $obj->getCustomerByColumnName('username',$row['username']);
        $id->services += 1;
        $id->save();
        return new Service([
            'customer_id' => $id->id,
            'Price' => $row['price'],
            'date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']))
        ]); 
    }
    

   
}
