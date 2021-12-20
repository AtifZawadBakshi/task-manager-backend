<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    //     'available_id',
    //     'order_no',
    //     'product_id',
    //     'location_id',
    //     'customer_name',
    //     'customer_number',
    //     'customer_email',
    //     'customer_address',
    //     'customer_zip_code',
    //     'customer_city',
    //     'status',
    // ];

    protected $guarded = [];

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function user(){
        return $this->belongsTo(Admin::class);
    }

    public function available(){
        return $this->belongsTo(Available::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function merchant(){
        return $this->belongsTo(Merchant::class);
    }

}
