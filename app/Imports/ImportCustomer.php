<?php

namespace App\Imports;

use App\Models\Customer;
use GuzzleHttp\Promise\Create;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportCustomer implements ToModel, WithHeadingRow
{   

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
            'Referral_code' => Str::random(8),
            'username' => $row['username']
        ]);
    }
}
