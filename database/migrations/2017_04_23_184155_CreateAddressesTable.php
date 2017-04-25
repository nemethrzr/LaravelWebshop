<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zipcode');            
            $table->string('city');
            $table->string('street');
            $table->integer('street_number');
            //$table->integer('phone_number');
            $table->enum('type', array('billing', 'shipping'));
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            //$table->unique(['user_id','type']);//ugynat a type és user_id nem szerepelhet
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
