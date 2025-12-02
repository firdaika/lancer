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
Schema::create('jadwal', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('materi_id');
    $table->unsignedBigInteger('langganan_id');
    $table->string('kelas');
    $table->string('pengajar');
    $table->date('tanggal');
    $table->time('jam_mulai');
    $table->time('jam_selesai')->nullable();
    $table->string('gmeet_link')->nullable();
    $table->string('status')->default('aktif'); // aktif, selesai, batal
    $table->timestamps();

    $table->foreign('materi_id')->references('id')->on('materi')->onDelete('cascade');
    $table->foreign('langganan_id')->references('id')->on('langganan')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
