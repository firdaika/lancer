<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;
use App\Models\User;

class AdminNotifikasiController extends Controller
{
    public function index()
    {
        // Semua notifikasi yang sudah dibuat admin (untuk table admin)
        $notifikasi = Notifikasi::with('user')->latest()->get();

        // Semua user agar admin bisa memilih kirim ke siapa
        $users = User::orderBy('nama')->get();

        return view('admin.notifikasi', compact('notifikasi', 'users'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'pesan' => 'required|string',
        'user_id' => 'required' // bisa "all" atau id user
    ]);

    // Jika kirim ke semua user
    if ($validated['user_id'] === 'all') {
        $users = User::all();

        foreach ($users as $u) {
            Notifikasi::create([
                'user_id' => $u->id,
                'judul'   => $validated['judul'],
                'pesan'   => $validated['pesan'],
            ]);
        }

        return redirect()->route('admin.notifikasi.index')
            ->with('success', 'Notifikasi berhasil dikirim ke semua user!');
    }

    // Kirim ke user tertentu
    Notifikasi::create([
        'user_id' => $validated['user_id'],
        'judul'   => $validated['judul'],
        'pesan'   => $validated['pesan'],
    ]);

    return redirect()->route('admin.notifikasi.index')->with('success', 'Notifikasi berhasil dikirim!');
}

public function destroy($id)
{
    $notif = Notifikasi::findOrFail($id);
    $notif->delete();

    return redirect()->back()->with('success', 'Notifikasi berhasil dihapus');
}
}
