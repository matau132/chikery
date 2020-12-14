<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->unique();
            $table->text('summary')->nullable();
            $table->text('content')->nullable();
            $table->float('weight')->nullable();
            $table->string('image')->nullable();
            $table->text('image_list')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('priority')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
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
