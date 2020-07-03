<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarParkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_park', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_model')->unsigned();
            $table->integer('id_type')->unsigned();
            $table->integer('id_garage')->unsigned();
            $table->integer('id_service')->unsigned();
            $table->date('date');
            $table->timestamps();

            $table->foreign('id_model')->references('id')->on('models')->onDelete('cascade');
            $table->foreign('id_type')->references('id')->on('type_transports')->onDelete('cascade');
            $table->foreign('id_garage')->references('id')->on('garages')->onDelete('cascade');
            $table->foreign('id_service')->references('id')->on('service_workshops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_park');
    }
}
