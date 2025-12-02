<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;;
use App\Models\Formulir;
use App\Http\Controllers\PembayaranControllerController;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formulir', function (Blueprint $table) {
            $table->id();

        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('nama');
            $table->string('telpon');
            $table->string('asalSekolah');
            $table->string('jenisKelamin');
            $table->string('kelas');
            $table->string('opsi');
            $table->string('paket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir');
    }
};
