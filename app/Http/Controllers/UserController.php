<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dataUser', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return back()->with('success', 'User berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user -> nama = $request->nama;
        $user -> ttl = $request->ttl;
        $user -> email = $request->email;

            if ($request->password) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

        return back()->with('success', 'User berhasil di update');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return back()->with('success', 'User di hapus');
    }
}
