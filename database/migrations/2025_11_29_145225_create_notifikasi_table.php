<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();

            // id user penerima notifikasi
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('judul');
            $table->text('pesan');

            // status notif
            $table->boolean('read')->default(false);

            // untuk notifikasi terkait pembayaran
            $table->foreignId('pembayaran_id')->nullable()->constrained('pembayaran')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
