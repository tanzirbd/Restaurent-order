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
            $table->increments('id');
            $table->string('product_name');
            $table->text('product_description');
            $table->tinyInteger('mainmenu_id');
            $table->tinyInteger('category_id');
            $table->tinyInteger('sub_category_id');
            $table->tinyInteger('brand_id');
            $table->integer('product_price');
            $table->integer('product_price_off');
            $table->integer('product_new_price');
            $table->integer('product_quantity');
            $table->string('product_label');
            $table->text('product_image');
            $table->tinyInteger('product_publish_status');
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
