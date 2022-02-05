<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupDeliveryMan extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    //     'warehouse_id',
    // ];
    protected $guarded = [];

    public function warehouse(){
        // return $this->hasMany(Warehouse::class, 'warehouse_id', 'id');
        return $this->belongsTo(Warehouse::class);
    }

    public function user(){
        return $this->belongsTo(Admin::class);
    }

}
