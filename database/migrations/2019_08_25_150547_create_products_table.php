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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('admin_id');

            $table->string('name')->unique();
            $table->string('image');
            $table->float('price');
            $table->integer('quantity');
            $table->text('details');
            $table->longtext('description');
            $table->boolean('product_new')->default(false);
            $table->float('price_offer')->nullable();
            $table->timestamp('end_offer_at')->nullable();
            $table->timestamp('start_offer_at')->nullable();
            $table->integer('discount_value')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->softDeletes();
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
