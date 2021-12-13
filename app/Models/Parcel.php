<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'available_id',
        'order_no',
        'product_id',
        'location_id',
        'customer_name',
        'customer_number',
        'customer_email',
        'customer_address',
        'customer_zip_code',
        'customer_city',
        'status',
    ];

}
