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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('selfie');                          // Foto selfie pengguna
            $table->string('name');                            // Nama lengkap pengguna
            $table->string('username')->unique();              // Username yang unik
            $table->text('address');                           // Alamat lengkap
            $table->string('level');                           // Level pengguna (Pendonasi atau Penerima)
            $table->string('organitation')->nullable();        // Nama organisasi (opsional)
            $table->string('phone');                          // Nomor telepon
            $table->string('job')->nullable();                             // Pekerjaan
            $table->string('house_photo')->nullable();        // Foto rumah dari depan (opsional untuk Penerima)
            $table->timestamp('email_verified_at')->nullable(); // Waktu verifikasi email
            $table->string('password');                        // Password pengguna
            $table->boolean('is_active')->default(false);      // Status aktif pengguna (default false)
            $table->rememberToken();                           // Token untuk "remember me"
            $table->timestamps();                              // Timestamps created_at dan updated_at
        });
        
        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
