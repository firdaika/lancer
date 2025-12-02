<?php

namespace App\Http\Controllers;

use App\Models\Langganan;
use App\Models\Jadwal;
use App\Models\Formulir;
use Illuminate\Http\Request;

class UserJadwalController extends Controller
{
    public function index()
    {
        $user_id = session('id'); // ambil dari login manual
        if (!$user_id) {
            return redirect('/login'); // kalau belum login
        }

        // Ambil semua formulir milik user
        $formulirIds = Formulir::where('user_id', $user_id)->pluck('id');

        if ($formulirIds->isEmpty()) {
            return view('jadwal', ['jadwal' => [], 'pesan' => 'Kamu belum mengisi formulir.']);
        }

        // Ambil semua langganan aktif dari semua formulir user
        $langgananIds = Langganan::whereIn('formulir_id', $formulirIds)
            ->where('status', 'aktif')
            ->pluck('id');

        if ($langgananIds->isEmpty()) {
            return view('jadwal', ['jadwal' => [], 'pesan' => 'Kamu belum berlangganan.']);
        }

        // Ambil semua jadwal berdasarkan SEMUA langganan aktif user
        $jadwal = Jadwal::whereIn('langganan_id', $langgananIds)
            ->with('materi.mapel')
            ->orderBy('tanggal')
            ->get();

        return view('jadwal', compact('jadwal'));
    }
}
