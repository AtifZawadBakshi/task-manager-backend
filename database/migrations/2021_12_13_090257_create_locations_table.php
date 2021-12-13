<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('division');
            $table->string('district');
            $table->string('area');
            $table->string('thana');
            $table->integer('post_code');
            $table->boolean('home_delivery')->default(false);
            $table->boolean('lockdown')->default(false);
            $table->double('base_charge')->nullable();
            $table->double('per_kg_inside_dhaka_charge')->nullable();
            $table->double('per_kg_outside_dhaka_charge')->nullable();
            $table->double('cod_charge_outside_of_dhaka')->nullable();
            $table->double('cod_charge_inside_of_dhaka')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
