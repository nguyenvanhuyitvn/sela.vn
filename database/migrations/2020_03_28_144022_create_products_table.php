<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code',50)->unique();
            $table->string('name');
            $table->decimal('price', 18, 0)->default(0);
            $table->tinyInteger('featured')->unsigned();
            $table->tinyInteger('state')->unsigned();
            $table->tinyInteger('special')->unsigned()->nullable();
            $table->text('info')->nullable();
            $table->text('describer')->nullable();
            $table->string('images');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
