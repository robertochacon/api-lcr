<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shipments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->foreign('entity_id')->references('id')->on('entitys');
            $table->string('identification');
            $table->string('longitudInput')->nullable();
            $table->string('latitudInput')->nullable();
            $table->string('longitudOuput')->nullable();
            $table->string('latitudOuput')->nullable();
            $table->string('delivery')->nullable();
            $table->string('time')->nullable();
            $table->string('note')->nullable();
            $table->enum('status',['start','process','done','cancel'])->default('start');
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
        Schema::dropIfExists('shipments');
    }
}
