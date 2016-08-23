<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->enum('validity', ['start', 'end']);
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->integer('position_id')->unsigned()->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->string('commodity');
            $table->string('imdg');
            $table->string('onu');

            $table->integer('pol');
            $table->integer('pod');
            $table->integer('agent');

            $table->string('type_container');
            $table->date('date_relance');
            $table->string('sea_freight');
            $table->string('baf');
            $table->string('is');
            $table->string('caf');
            $table->string('ses');
            $table->string('imo');
            $table->string('condition');
            $table->enum('confirmed', [true, false]);
            $table->integer('n_booking');

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
        Schema::drop('quotations');
    }
}
