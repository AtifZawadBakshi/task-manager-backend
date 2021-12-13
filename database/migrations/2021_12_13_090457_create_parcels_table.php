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
            $table->integer('user_id');
            $table->integer('available_id');
            $table->string('order_no')->unique();
            $table->integer('product_id')->nullable();
            $table->integer('location_id');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('customer_email');
            $table->string('customer_address');
            $table->string('customer_zip_code');
            $table->string('customer_city');
            $table->boolean('status')->default(false);
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
