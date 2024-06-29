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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cart_id');
            $table->string('notes');
            $table->enum('serving_type', ['dine_in','takeaway']);
            $table->enum('order_type', ['ecommerce','cashier']);
            $table->enum('payment_method', ['cash','cashless']);
            $table->enum('payment_status', ['done', 'undone']);
            $table->dateTime('order_created');
            $table->dateTime('order_finished');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade');
        });

        Schema::create('snapshots', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->json('snapshot_data');
            $table->timestamps();

            $table->foreign('transaction_id')
                ->references('id')
                ->on('transactions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snapshots');
        Schema::dropIfExists('transactions');
    }
};
