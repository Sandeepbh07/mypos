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
            $table->string('name');
            $table->decimal('purchase_price');
            $table->decimal('discount');
            $table->decimal('vat');
            $table->decimal('quantity');
            $table->decimal('selling_price');
            $table->string('product_image')->nullable();
            $table->unsignedInteger('categories_id');
            $table->unsignedInteger('subcategories_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('supplier_id');
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
