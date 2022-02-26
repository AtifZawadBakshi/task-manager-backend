<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->integer('merchant_id')->nullable();
            $table->integer('available_id')->nullable();
            $table->integer('pickup_location_id')->nullable();
            $table->integer('delivery_location_id')->nullable();
            $table->integer('pickup_warehouse_id')->nullable();
            $table->integer('delivery_warehouse_id')->nullable();
            $table->string('order_no')->unique()->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_zip_code')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('parcels');
    }
}
