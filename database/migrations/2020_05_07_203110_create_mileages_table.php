<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMileagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mileages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_car')->unsigned();
            $table->integer('mileage');
            $table->date('date');
            $table->timestamps();

            $table->foreign('id_car')->references('id')->on('car_park')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mileages');
    }
}
