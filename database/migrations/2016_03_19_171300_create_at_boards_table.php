<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("position_id")->unsigned();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->timestamp('date_loading');

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
        Schema::drop('at_boards');
    }
}
