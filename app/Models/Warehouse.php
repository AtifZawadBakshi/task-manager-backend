<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Available;
class Warehouse extends Model
{
    use HasFactory;

    // protected $table = 'availables';

    // protected $fillable = [
    //     'name',
    //     'post_code',
    //     'area',
    //     'district',
    //     'country',
    // ];

    protected $guarded = [];

    // public function available(){
    //     return $this->hasMany(Available::class, 'id', 'warehouse_id');
    // }
    
}
