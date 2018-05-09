<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order_detail',function (Blueprint $table){
           $table->increments('id');
           $table->unsignedBigInteger('product_id')->index();
           $table->unsignedBigInteger('order_id')->index();
           $table->unsignedBigInteger('quantity');
           $table->mediumInteger('promotion_id')->unsigned()->nullable();
           $table->mediumInteger('price');
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
        Schema::dropIfExists('order_detail');
    }
}
