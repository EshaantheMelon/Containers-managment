<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depots', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("social_reason");
            $table->enum('type', ['IN PORT', 'OUT PORT', 'OTHERS'])->default('OTHERS');
            $table->string("address");
            $table->string("phone");
            $table->string("tax_id");

            $table->string('country_code')->nullable();
            $table->foreign('country_code')->references('code')->on('countries')->onDelete('cascade');
            $table->integer("city_id")->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::drop('depots');
    }
}
