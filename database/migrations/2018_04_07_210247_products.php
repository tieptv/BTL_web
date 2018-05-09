<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->mediumInteger('catalog_id')->unsigned();
            $table->mediumInteger('manufacture_id')->unsigned()->nullable();
            $table->mediumText('description');
            $table->mediumInteger('price');
            $table->mediumInteger('promotion_id')->unsigned()->nullable();
            $table->date('manufactured_date')->nullable();
            $table->string('image_link');
            $table->mediumText('image_list');
            $table->mediumInteger('count_buy')->default(0);
            $table->mediumInteger('view')->default(0);
             $table->foreign('catalog_id')->references('id')->on('category');
              $table->foreign('manufacture_id')->references('id')->on('manufacture');
              $table->foreign('promotion_id')->references('id')->on('promotion');
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
        Schema::dropIfExists('products');
    }
}
