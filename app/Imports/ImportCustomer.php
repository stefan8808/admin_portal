<?php

namespace App\Imports;

use App\Models\Customer;
use GuzzleHttp\Promise\Create;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportCustomer implements ToModel, WithHeadingRow
{   
    protected $unique_code;

    public function __construct($code)
    {
        $this->unique_code = $code;
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Customer::create([
            'name' => $row['name'],
            'address' => $row['address'],
            'phone_number' => $row['phone'],
            'Referral_code' => $this->unique_code,
            'username' => $row['username']
        ]);
    }
}
