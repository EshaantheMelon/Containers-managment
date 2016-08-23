<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtDepotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_depots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("position_id")->unsigned();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->timestamp('date_in');
            $table->enum('status', ['GOOD', 'WAIT QUOTATION', 'TOTAL LOSS','IN REPARATION']);

            $table->date('loss_date')->nullable();
            $table->string('loss_cause')->nullable();

            $table->date('reparation_date')->nullable();
            $table->string('reparation_cost')->nullable();
            $table->integer('reparation_provider')->unsigned()->nullable();
            $table->foreign('reparation_provider')->references('id')->on('providers')->onDelete('cascade');
            $table->string('reparation_reference_invoice')->nullable();

            $table->integer("depot_id")->unsigned();
            $table->foreign('depot_id')->references('id')->on('depots')->onDelete('cascade');

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
        Schema::drop('at_depots');
    }
}
