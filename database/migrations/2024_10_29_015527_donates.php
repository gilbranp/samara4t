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
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Lengkap
            $table->string('phone'); // Nomor Telepon
            $table->text('address'); // Alamat
            $table->string('donation_type'); // Jenis Donasi
            $table->integer('amount')->nullable(); // Jumlah Donasi (uang)
            $table->integer('item_qty')->nullable(); // Jumlah (untuk donasi barang)
            $table->date('expired_date')->nullable(); // Tanggal Kadaluarsa (opsional untuk donasi barang)
            $table->string('donation_option')->nullable(); // Opsi Donasi
            $table->string('resi_number')->nullable(); // Nomor Resi (jika opsi 'dikirim')
            $table->string('jasa_distribusi')->nullable(); // Jasa distribusi
            $table->string('payment_option')->nullable(); // Metode Pembayaran
            $table->text('message')->nullable(); // Pesan opsional dari donatur
            $table->string('transfer_receipt')->nullable(); // Foto Bukti Transfer
            $table->string('status')->default('pending'); // Status donasi, defaultnya pending
            $table->timestamps(); // Tanggal dibuat dan diupdate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};