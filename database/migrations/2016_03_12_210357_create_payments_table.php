<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string("bank_account_n");
            $table->string("bank");
            $table->string("swift");
            $table->string("payment_conditions");
            $table->string("address_invoices");

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
        Schema::drop('payments');
    }
}
