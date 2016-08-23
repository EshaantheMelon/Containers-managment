<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillLadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_ladings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');

            $table->string('notify');
            $table->string('place_of_loading');
            $table->string('port_of_loading_pol');
            $table->string('place_of_delivery_pod');
            $table->string('place_of_delivery');
            $table->string('number_original_bls');
            $table->string('number_packages');
            $table->string('payment_freight');

            $table->integer('shipper_id')->unsigned()->nullable();
            $table->foreign('shipper_id')->references('id')->on('at_shippers')->onDelete('cascade');
            $table->integer('consignee_id')->unsigned()->nullable();
            $table->foreign('consignee_id')->references('id')->on('at_consignees')->onDelete('cascade');
            $table->integer('position_id')->unsigned()->index();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->integer('vessel_id')->unsigned()->index();
            $table->foreign('vessel_id')->references('id')->on('vessels')->onDelete('cascade');
            $table->integer('travel_id')->unsigned()->index();
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');

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
        Schema::drop('bill_ladings');
    }
}
