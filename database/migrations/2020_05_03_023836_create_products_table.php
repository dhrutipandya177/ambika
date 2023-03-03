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
            $table->string('slug');
            //$table->string('slug')->unique();
            $table->decimal('price', 8, 2)->nullable();
            $table->unsignedInteger('category_id')->default(1)->nullable();
            $table->unsignedInteger('subcategory_id')->default(1)->nullable();
            //$table->string('image', 255);
            $table->longText('description')->nullable();
            //$table->string('sku');
            //$table->unsignedInteger('quantity');
            //$table->decimal('weight', 8, 2)->nullable();
            //$table->boolean('featured')->default(0);
            $table->boolean('profile_drawing')->default(0);
            $table->boolean('order_drawing')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
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
