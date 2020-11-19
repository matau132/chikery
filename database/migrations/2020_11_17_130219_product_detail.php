<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigInteger('product_id');
            $table->bigInteger('ingredient_id');
            $table->float('ingredient_quantity');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('ingredient_id')->references('id')->on('ingredient');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
