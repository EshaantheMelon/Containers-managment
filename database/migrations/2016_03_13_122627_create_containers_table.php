<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix')->unique();
            $table->integer('day_cost');
            $table->integer('capacity');
            $table->float('tare');
            $table->float('value');
            $table->date('last_survey');
            $table->date('date_pick_up');
            $table->string('cout_pick_up');
            $table->string('lieu_pick_up');
			$table->enum('full', array(0, 1));
			
            $table->string("type");
            $table->foreign('type')->references('code')->on('type_containers')->onDelete('cascade');

            $table->integer("provider_id")->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

            $table->integer("contract_id")->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
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
        Schema::drop('containers');
    }
}
