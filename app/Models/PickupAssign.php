<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupAssign extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function parcel(){
        // return $this->hasMany(Warehouse::class, 'warehouse_id', 'id');
        return $this->belongsTo(Parcel::class);
    }
    
    public function pickup_man(){
        return $this->belongsTo(Admin::class, 'pickup_man_id', 'id');
    }

    public function delivery_man(){
        return $this->belongsTo(Admin::class, 'delivery_man_id', 'id');
    }
}
