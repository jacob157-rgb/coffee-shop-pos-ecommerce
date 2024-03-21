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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total_items', 10, 2); // All Items Price Total
            $table->decimal('shipping_cost', 10, 2); // Shipping Cost
            $table->decimal('total', 10, 2); // Final Price
            $table->timestamps();
        });

        Schema::create('cart_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('sku_id');
            $table->integer('qty');
            $table->decimal('sub_total', 10, 2);

            $table->foreign('cart_id')
                ->references('id')
                ->on('cart');

            $table->foreign('sku_id')
                ->references('id')
                ->on('product_sku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
        Schema::dropIfExists('cart_detail');
    }
};
