<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("pic")->default('default.jpg');
            $table->string("job");
            $table->string("direct_phone");
            $table->string("mobil1");
            $table->string("mobil2");
            $table->string("email");

            $table->integer("client_id")->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->integer("provider_id")->unsigned()->nullable();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

            $table->integer("depot_id")->unsigned()->nullable();
            $table->foreign('depot_id')->references('id')->on('depots')->onDelete('cascade');
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
        Schema::drop('contacts');
    }
}
