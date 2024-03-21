<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->string('category');
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->string('product_pict');
            $table->longText('product_desc')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('product_category');
        });

        Schema::create('product_sku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('size', 10);
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_sku');
    }
};
