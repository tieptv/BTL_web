<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order',function (Blueprint $table){
           $table->increments('id');
           $table->unsignedBigInteger('user_id')->index();
           $table->string('name');
            $table->string('phone');
            $table->string('address');
           $table->dateTime('date_order');
           $table->mediumInteger('total');
           $table->mediumText('note')->nullable();
           $table->string('payment');
           // $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('order');
    }
}
