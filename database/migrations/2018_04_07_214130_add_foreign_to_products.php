<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('products',function (Blueprint $table){
        //     $table->engine = 'InnoDB';
        //     $table->foreign('catalog_id')->references('id')->on('category');
        //      $table->foreign('manufacture_id')->references('id')->on('manufacture');
        //       $table->foreign('promotion_id')->references('id')->on('promotion');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
