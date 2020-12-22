<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Whishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whishlists', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('size_id')->unsigned();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->primary(['customer_id', 'product_id','size_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whishlists');
    }
}
