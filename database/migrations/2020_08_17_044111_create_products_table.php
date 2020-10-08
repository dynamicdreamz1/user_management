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
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('category_id');
            $table->integer('stock');
            $table->integer('price');
            $table->integer('price_unit_id');
            $table->integer('weight');
            $table->integer('weight_unit_id');
            $table->tinyInteger('status')->default(0)->comment('0=>inactive,1=>active,2=>deactive');
            $table->timestamps();
        });

        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('parent')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0=>active,1=>deactive');
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
        Schema::dropIfExists('product_categories');
    }
}
