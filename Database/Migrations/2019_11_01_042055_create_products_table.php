<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->string('sku')->unique();
            $table->string('barcode')->unique();

            $table->string('description');

            $table->integer('min_qty')->default(1);
            $table->integer('multiple')->default(1);

            $table->unsignedBigInteger('product_category_id')->unique();

            $table->timestamps();

            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('restrict')->onUpdate('restrict');
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
