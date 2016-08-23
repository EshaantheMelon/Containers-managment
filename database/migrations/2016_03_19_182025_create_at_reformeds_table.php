<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtReformedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_reformeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("position_id")->unsigned();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->date('date');
            $table->string('location');
            $table->string('cost');

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
        Schema::drop('at_reformeds');
    }
}
