<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Materi;
use App\Models\Langganan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        // User yang aktif berlangganan
        $langganan = Langganan::with('formulir')
            ->where('status', 'aktif')
            ->get();

        // Semua jadwal yang sudah dibuat admin
        $jadwal = Jadwal::with('materi.mapel', 'langganan.formulir')
            ->orderBy('tanggal', 'asc')
            ->get();

        // Semua materi beserta mapel
        $materi = Materi::with('mapel')
            ->orderBy('mapel_id')
            ->get();

        return view('admin.jadwalAdmin', compact('jadwal', 'materi', 'langganan'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'langganan_id' => 'required|exists:langganan,id',
            'materi_id' => 'required|exists:materi,id',
            'kelas' => 'required|string|max:50',
            'pengajar' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'nullable',
            'gmeet_link' => 'nullable|string|max:255',
            'status' => 'nullable|string'
        ]);

        Jadwal::create($validated);

        return redirect()->route('jadwalAdmin')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'langganan_id' => 'required|exists:langganan,id',
            'materi_id' => 'required|exists:materi,id',
            'kelas' => 'required|string|max:50',
            'pengajar' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'nullable',
            'gmeet_link' => 'nullable|string|max:255',
            'status' => 'nullable|string'
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwalAdmin')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }


    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();

        return redirect()->route('jadwalAdmin')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
