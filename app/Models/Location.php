<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Available;

class Location extends Model
{
    use HasFactory;

    // protected $table = 'availables';

    // protected $fillable = [
    //     'division',
    //     'district',
    //     'area',
    //     'thana',
    //     'post_code',
    //     'home_delivery',
    //     'lockdown',
    //     'base_charge',
    //     'per_kg_inside_dhaka_charge',
    //     'per_kg_outside_dhaka_charge',
    //     'cod_charge_outside_of_dhaka',
    //     'cod_charge_inside_of_dhaka',
    // ];
    protected $guarded = [];

}
