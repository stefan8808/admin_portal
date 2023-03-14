<?php

namespace App\Models;

use App\Models\Service as ModelsService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Maatwebsite\Excel\ExcelServiceProvider;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'Price',
        'date'
    ];

    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public $timestamps = false;
}
