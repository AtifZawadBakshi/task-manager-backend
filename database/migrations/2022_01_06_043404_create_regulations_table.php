<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulations', function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->nullable();
            $table->unsignedInteger('case_id')->nullable();
            $table->text('remarks')->nullable();
            $table->string('attachment')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('dateline')->nullable();
            $table->text('send_sms')->nullable();
            $table->string('regulation_type')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('regulations');
    }
}
