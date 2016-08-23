<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("social_reason");
            $table->string("type_client");
            $table->string("address");
            $table->string("phone");
            $table->string("fax");
            $table->string("email");
            $table->string("web_site");
            $table->string("tax_id");

            $table->integer("user_id")->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('clients');
    }
}
