<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('number')->unique();
            $table->date('date_enter');
            $table->date('date_out');
            $table->string('bunkers');
            $table->date('start_travel_date');
            $table->string('start_travel_quantity');
            $table->date('end_travel_date');
            $table->string('end_travel_quantity');
            $table->date('bunkers_delivery_date');
            $table->string('bunkers_delivery_quantity');
            $table->date('date_hire_start');
            $table->date('date_hire_end');

            $table->integer('vessel_id')->unsigned();
            $table->foreign('vessel_id')->references('id')->on('vessels')->onDelete('cascade');
            $table->integer("port_id")->unsigned();
            $table->foreign('port_id')->references('id')->on('ports')->onDelete('cascade');
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
        Schema::drop('travels');
    }
}
