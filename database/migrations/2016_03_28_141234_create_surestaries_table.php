<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurestariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surestaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('port_id')->unsigned()->nullable();
            $table->foreign('port_id')->references('id')->on('ports')->onDelete('cascade');

            $table->string('at');
            $table->integer('id_at')->nullable();

            $table->integer("position_id")->unsigned()->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');


            $table->string('free_time');
            $table->string('tariff');
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
        Schema::drop('surestaries');
    }
}
