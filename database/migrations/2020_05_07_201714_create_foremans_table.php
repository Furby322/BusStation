<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForemansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foremans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_master')->unsigned();
            $table->timestamps();

            $table->foreign('id_master')->references('id')->on('masters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foremans');
    }
}
