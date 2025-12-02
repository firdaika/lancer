<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        return view('admin.dataMateri', compact('materi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel_id' => 'required',
            'namaMateri' => 'required',
            'kelas' => 'required|integer'
        ]);

        Materi::create($request->all());
        return back()->with('success', 'Materi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mapel_id' => 'required',
            'namaMateri' => 'required',
            'kelas' => 'required|integer'
        ]);

        $materi = Materi::findOrFail($id);
        $materi->update($request->all());

        return back()->with('success', 'Materi berhasil diperbarui');
    }

    public function destroy($id)
    {
        Materi::findOrFail($id)->delete();
        return back()->with('success', 'Materi berhasil dihapus');
    }
}

