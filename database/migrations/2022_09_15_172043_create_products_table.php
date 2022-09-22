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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->on('categories')->references('id')->onDelete('Cascade');
            $table->string('subcategory_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('views')->nullable();
            $table->string('num_of_sale')->nullable();
            $table->text('short_description')->nullable();
            $table->text('tags')->nullable();
            $table->longText('description')->nullable();
            $table->double('price', 10, 2)->nullable();
            $table->string('discount_type')->defalut('flat');
            $table->string('discount')->nullable();
            $table->string('stock')->nullable();
            $table->string('photo')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_photo')->nullable();
            $table->string('status')->nullable();
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
