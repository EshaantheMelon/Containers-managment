<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_shippers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("position_id")->unsigned();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->timestamp('date_out_depot');
            $table->string('booking');
            $table->string('ETA');

            $table->integer("travel_id")->unsigned();
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');

            $table->string('name_shipper');
            $table->string('cin_driver');
            $table->string('id_truck');

            $table->integer("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('at_shippers');
    }
}
