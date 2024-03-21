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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cart_id');
            $table->timestamp('order_date')->useCurrent(); // Mencatat tanggal dan waktu transaksi dibuat
            $table->timestamp('completion_date')->nullable(); // Mencatat tanggal dan waktu transaksi selesai
            $table->enum('serving_type', ['dinein', 'takeaway'])->nullable(); // Tipe Penyajian jika menu makanan (dinein:makan ditempat/takeaway:dibawa pulang)
            $table->enum('payment_type', ['cash', 'cashless']); // Tipe Pembayaran (cash:tunai/cashless:nontunai)
            $table->enum('order_type', ['online', 'offline']); // Tipe Transaksi (online:e-commerce offline:langsungkasir)
            $table->enum('payment_status', ['done', 'undone']); // Status Transaksi(selesai/belum selesai)
            $table->string('snap_token')->nullable(); // Snap Token jika menggunakan Midtrans
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('cart_id')
                ->references('id')
                ->on('cart');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
