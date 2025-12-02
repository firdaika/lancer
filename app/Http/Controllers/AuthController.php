<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Tampilkan form login
   public function showLogin()
    {
        return view('login');
    }

    public function proseslogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // 1. CEK DI TABEL ADMIN
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            if ($admin->status !== 'aktif') {
                return back()->with('error', 'Admin tidak aktif.');
            }
            session([
                'logged_in' => true,
                'role'      => 'admin',
                'id'        => $admin->id,
                'name'      => $admin->name,
            ]);

            return redirect('/dasboardAdmin');
        }

        // 2. CEK DI TABEL USER
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'logged_in' => true,
                'role'      => 'user',
                'id'        => $user->id,
                'name'      => $user->name,
            ]);

            return redirect('/home');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Tampilkan form register
    public function showRegister()
    {
        return view('register');
    }

    // Proses register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'ttl' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // otomatis login setelah register? (opsional)
        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    // Logout
    public function logout(Request $request)
    {
       session()->flush();
        return redirect()->route('home');
    }
    // contoh halaman lain yang kamu punya
    public function pengaturan() { return view('pengaturan'); }
    public function landingpage() { return view('landingpage'); }
    public function home() { return view('home'); }
    public function profile2() { return view('profile2'); }
}
