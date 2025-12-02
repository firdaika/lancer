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
        Schema::create('langganan', function (Blueprint $table) {
    $table->id();

    // hubungan ke formulir
    $table->foreignId('formulir_id')->constrained('formulir')->onDelete('cascade');

    $table->string('paket'); // misal: 1bulan, 3bulan, 6bulan

    $table->date('tanggal_mulai');
    $table->date('tanggal_selesai');

    $table->enum('status', ['aktif', 'expired'])->default('aktif');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('langganan_tabale');
    }
};
