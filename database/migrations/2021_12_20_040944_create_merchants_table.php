<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_name');
            $table->string('merchant_number')->unique();
            $table->string('merchant_address');
            $table->string('merchant_email');
            $table->string('merchant_mobile');
            $table->string('tax_no');
            $table->string('bin_no')->nullable();
            $table->string('agreement_copy');
            $table->string('account_title');
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('routing_no')->nullable();
            $table->string('contact_name');
            $table->string('contact_mobile');
            $table->string('contact_email');
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
        Schema::dropIfExists('merchants');
    }
}
