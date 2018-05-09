<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail',function (Blueprint $table){
           $table->increments('id');
           $table->unsignedBigInteger('product_id')->unsigned()->nullable();
           $table->string('size');
           $table->string('color');
            // $table->foreign('product_id')->references('id')->on('products');
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
         Schema::dropIfExists('product_detail');
    }
}
