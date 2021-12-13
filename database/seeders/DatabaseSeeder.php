<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $passSystem = 'password';

        $userSystem = Location::create([
            'division' => 'Dhaka',
            'district' => 'Dhaka',
            'area' => 'Banani',
            'thana' => 'Banani',
            'post_code' => 1213,
            'home_delivery' => true,
            'lockdown' => false,
            'base_charge' => 90,
            'per_kg_inside_dhaka_charge' => 50,
            'per_kg_outside_dhaka_charge' => 0,
            'cod_charge_outside_of_dhaka' => 0,
            'cod_charge_inside_of_dhaka' => 140,
        ]);

        $userSystem = Location::create([
            'division' => 'Dhaka',
            'district' => 'Dhaka',
            'area' => 'Khilkhet',
            'thana' => 'Khilkhet',
            'post_code' => 1229,
            'home_delivery' => false,
            'lockdown' => false,
            'base_charge' => 150,
            'per_kg_inside_dhaka_charge' => 50,
            'per_kg_outside_dhaka_charge' => 0,
            'cod_charge_outside_of_dhaka' => 0,
            'cod_charge_inside_of_dhaka' => 200,
        ]);
    }
}
