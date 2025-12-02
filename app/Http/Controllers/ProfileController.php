<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index()
    {
        // Pastikan user sudah login
        if (!session('logged_in') || session('role') !== 'user') {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil user berdasarkan session ID
        $user = User::with([
            'formulir' => function($q) {
                $q->with(['langganan' => function($q2) {
                    $q2->where('status', 'aktif')
                       ->where('tanggal_mulai', '<=', Carbon::now())
                       ->where('tanggal_selesai', '>=', Carbon::now());
                }]);
            }
        ])->find(session('id'));

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        // Pastikan user sudah login
        if (!session('logged_in') || session('role') !== 'user') {
            return redirect('/login')->with('error', 'Silakan login.');
        }

        // Ambil user
        $user = User::find(session('id'));

        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile'), $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
