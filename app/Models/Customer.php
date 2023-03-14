<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Maatwebsite\Excel\ExcelServiceProvider;


class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'services',
        'Referral_code',
        'username'
    ];

    public function service():HasMany{
        return $this->hasMany(Service::class,'customer_id','id');
    }
}
