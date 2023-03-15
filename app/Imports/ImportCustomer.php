<?php

namespace App\Imports;

use App\Models\Customer;
use GuzzleHttp\Promise\Create;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class ImportCustomer implements ToModel, WithHeadingRow
{   
<<<<<<< HEAD

=======
>>>>>>> 38446753bfd22318878ec8b537b45509fd6415f7

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
