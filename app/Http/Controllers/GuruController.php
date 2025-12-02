<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index() {
        $guru = Guru::all();
        return view('admin.dataGuru', compact('guru'));
    }

     public function store(Request $request)
    {
          $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'string|max:2048',
            'bidangKeahlian' => '|string|max:255',
            'telpon' => 'string|max:255',
            'ttl' => 'string|max:255',
        ]);

        Guru::create($validated);

        return redirect()->route('admin.dataGuru')->with('success', 'Mapel berhasil ditambahkan');
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'string|max:2048',
            'bidangKeahlian' => '|string|max:255',
            'telpon' => 'string|max:255',
            'ttl' => 'string|max:255',
        ]);

        $guru = Guru::findOrFail($id);

        $guru->update($validated);

        return redirect()->route('admin.dataGuru')->with('success', 'Mapel berhasil diupdate');
    }

    public function destroy($id) {
        Guru::destroy($id);
        return back()->with('success','Data guru dihapus!');
    }

}
