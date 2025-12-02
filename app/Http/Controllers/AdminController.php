<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dasboardAdmin()
    {
        $muridAktif = \App\Models\Langganan::where('status', 'aktif')->count();
        $guru = \App\Models\Guru::count();

    // Nama bulan untuk label
    $bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    // Ambil pemasukan per bulan
    $data = Pembayaran::selectRaw('MONTH(created_at) as bulan, SUM(total) as total')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan');

    // Normalisasi agar bulan yang tidak ada datanya menjadi 0
    $pendapatan = [];
    for ($i = 1; $i <= 12; $i++) {
        $pendapatan[] = $data[$i] ?? 0;
    }

    return view('admin.dasboardAdmin', [
        'labels' => $bulanLabels,
        'pendapatan' => $pendapatan,
        'muridAktif' => $muridAktif,
        'guru' => $guru
    ]);
    }

    public function index()
    {
        $admin = Admin::all();
        return view('admin.dataAdmin', compact('admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:6'
        ]);

        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'aktif'
        ]);

        return redirect()->route('admin')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function destroy($id)
{
    Admin::findOrFail($id)->delete();
    return back()->with('success', 'Admin berhasil dihapus.');
}

public function updateStatus($id)
{
    $admin = Admin::findOrFail($id);
    $admin->status = $admin->status === 'aktif' ? 'tidak aktif' : 'aktif';
    $admin->save();

    return back()->with('success', 'Status admin berhasil diubah.');
}

public function logoutAdmin()
{
    session()->flush();
    return redirect('/');
}
}
