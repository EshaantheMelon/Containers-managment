<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVesselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vessel')->unique();
            $table->string('type');
            $table->string('built_country');
            $table->string('built_year');
            $table->string('flag');
            $table->string('class');
            $table->string('owners');
            $table->string('imo_number');
            $table->string('length_overall');
            $table->string('length_between');
            $table->string('breadth_moulded');
            $table->string('depth_moulded');
            $table->string('summer_draught');
            $table->string('dwt_summer_draft');
            $table->string('light_weight');
            $table->string('draft_displacement');
            $table->string('grt');
            $table->string('nrt');
            $table->string('teu_capacity');
            $table->string('feu_capacity');
            $table->string('reefers_capacity');
            $table->string('bunkers_capacity');
            $table->string('type_engine');
            $table->string('cargo_gear');
            $table->string('speed');
            $table->string('consumption');
            $table->string('hfo');
            $table->string('lsfo');
            $table->string('mgo');
            $table->string('mdo');
            $table->string('capacity_trailer');
            $table->string('number_gear');
            $table->string('capacity_gear');
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
        Schema::drop('vessels');
    }
}
