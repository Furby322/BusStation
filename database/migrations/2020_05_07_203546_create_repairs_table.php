<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_car')->unsigned();
            $table->integer('id_worker')->unsigned();
            $table->integer('price');
            $table->string('detail');
            $table->date('date');
            $table->timestamps();

            $table->foreign('id_car')->references('id')->on('car_park')->onDelete('cascade');
            $table->foreign('id_worker')->references('id')->on('workers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('repairs');
    }
}
