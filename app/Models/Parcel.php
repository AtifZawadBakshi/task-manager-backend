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

    public function pickup_location(){
        return $this->belongsTo(Location::class, 'pickup_location_id', 'id');
    }

    public function delivery_location(){
        return $this->belongsTo(Location::class, 'delivery_location_id', 'id');
    }

    public function pickup_warehouse(){
        return $this->belongsTo(Warehouse::class, 'pickup_warehouse_id', 'id');
    }

    public function delivery_warehouse(){
        return $this->belongsTo(Warehouse::class, 'delivery_warehouse_id', 'id');
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
