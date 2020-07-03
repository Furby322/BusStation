<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_plot')->unsigned();
            $table->timestamps();

            $table->foreign('id_plot')->references('id')->on('plots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_workshops');
    }
}
