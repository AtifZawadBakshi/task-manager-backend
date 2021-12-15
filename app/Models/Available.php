<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Warehouse;

class Available extends Model
{
    use HasFactory;
    
    // protected $fillable = [
    //     'warehouse_id',
    //     'location_id',
    // ];

    protected $guarded = [];

    public function warehouse(){
        // return $this->hasMany(Warehouse::class, 'warehouse_id', 'id');
        return $this->belongsTo(Warehouse::class);
    }

    public function location(){
        // return $this->hasMany(Location::class, 'location_id', 'id');
        return $this->belongsTo(Location::class);
    }

}
