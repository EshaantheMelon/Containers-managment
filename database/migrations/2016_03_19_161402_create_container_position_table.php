<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainerPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_position', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("container_id")->unsigned();
            $table->foreign('container_id')->references('id')->on('containers')->onDelete('cascade');

            $table->integer("position_id")->unsigned();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

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
        Schema::drop('container_position');
    }
}
