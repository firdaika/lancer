<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pembayaran;
use App\Models\Formulir;
use Illuminate\Http\Request;
use App\Http\Controllers\OpsiController;
use Illuminate\Support\Facades;
use App\Models\Langganan;
use App\Models\Notifikasi;

class PembayaranController extends Controller
{
    // === TAMPILKAN HALAMAN PEMBAYARAN ===
    public function pembayaran()
    {
        // Ambil semua langganan dari database
        $paket = Paket::all()->keyBy('nama');
        return view('pembayaran', compact('paket'));
    }

    // === SIMPAN DATA FORMULIR + PEMBAYARAN ===
    public function store(Request $request)
    {

        $user = \App\Models\User::find(session('id'));
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }else{
            redirect()->route('pembayaran');
        }

        // Cek apakah user sudah punya pembayaran pending/diproses
    $cekPembayaran = Pembayaran::where('user_id', $user->id)
        ->whereIn('status', ['pending'])
        ->first();

    if ($cekPembayaran) {
        return redirect()->back()->with('error', 'Anda masih memiliki pembayaran yang belum diproses.');
    }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'telpon' => 'required|string|max:15', // jangan integer, karena bisa diawali 0
            'asalSekolah' => 'required|string|max:100',
            'jenisKelamin' => 'required|string|max:100',
            'kelas' => 'required|string|max:100', // typo: jenjanng
            'opsi' => 'required|string|max:50',
            'paket' => 'required|string',
            'metode_pembayaran' => 'required|string', // typo di nama field
        ]);


        // Simpan ke tabel formulir
        $formulir = Formulir::create([
            'user_id'=>$user->id,
            'nama' => $validated['nama'],
            'telpon' => $validated['telpon'],
            'asalSekolah' => $validated['asalSekolah'],
            'jenisKelamin' => $validated['jenisKelamin'],
            'kelas' => $validated['kelas'],
            'opsi' => $validated['opsi'],
            'paket' => $validated['paket'],
        ]);

        // Ambil data harga langganan
        $dataPaket = Paket::where('nama', $validated['paket'])->first();
        $total = $dataPaket ? ($dataPaket->harga + $dataPaket->admin) : 0;

        // Simpan data pembayaran
        Pembayaran::create([
            'user_id'=>$user->id,
            'formulir_id'=>$formulir->id,
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'total' => $total,
            'status' => 'pending',
        ]);

        // Redirect ke halaman sukses (ganti sesuai route kamu)
        return redirect()->route('home')->with('success', 'Data Formulir dan Pembayaran berhasil disimpan!');
    }

    public function dataPembayaran()
    {
        $pembayaran = Pembayaran::all();
        return view ('admin.dataPembayaran', compact('pembayaran'));
    }

   public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,berhasil,gagal',
    ]);

    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->status = $request->status;
    $pembayaran->save();

    $formulir = $pembayaran->formulir;

    // === STATUS BERHASIL ===
    if ($request->status == 'berhasil') {

        // Hapus langganan lama
        $old = Langganan::where('formulir_id', $formulir->id)->first();
        if ($old) $old->delete();

        // Hitung durasi paket
        $lama = match($formulir->paket) {
            '1bulan' => 1,
            '3bulan' => 3,
            '6bulan' => 6,
            default => 1
        };

        $tanggal_mulai = now();
        $tanggal_selesai = now()->addMonths($lama);

        $langganan = Langganan::create([
            'formulir_id' => $formulir->id,
            'paket' => $formulir->paket,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'status' => 'aktif',
        ]);

        // === NOTIFIKASI PEMBAYARAN BERHASIL ===
        Notifikasi::create([
            'user_id' => $pembayaran->user_id,
            'judul'   => 'Pembayaran Berhasil',
            'pesan'   => 'Pembayaran kamu untuk paket ' . $formulir->paket . ' berhasil. Langganan aktif.',
        ]);

        // === NOTIFIKASI H-3 LANGGANAN MAU HABIS ===
        if ($tanggal_selesai->diffInDays(now()) == 3){
            Notifikasi::create([
                'user_id' => $pembayaran->user_id,
                'judul'   => 'Langganan Akan Berakhir',
                'pesan'   => 'Langganan kamu akan berakhir dalam 3 hari lagi.',
            ]);
        }
    }

    // === STATUS GAGAL ===
    if ($request->status == 'gagal') {

        Langganan::where('formulir_id',$formulir->id)
            ->update(['status'=>'expired']);

        // === NOTIFIKASI PEMBAYARAN GAGAL ===
        Notifikasi::create([
            'user_id' => $pembayaran->user_id,
            'judul'   => 'Pembayaran Gagal',
            'pesan'   => 'Pembayaran kamu gagal diproses. Silakan coba kembali.',
        ]);

        // === NOTIFIKASI LANGGANAN EXPIRED ===
        Notifikasi::create([
            'user_id' => $pembayaran->user_id,
            'judul'   => 'Langganan Expired',
            'pesan'   => 'Masa langganan kamu telah berakhir.',
        ]);
    }

    Langganan::autoExpired();

    return back()->with('success', 'Status pembayaran berhasil diubah');
}

}
