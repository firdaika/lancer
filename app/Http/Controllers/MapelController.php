<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::orderBy('id')->get();
        return view('admin.mataPelajaran', compact('mapel'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mapel' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048',
            'opsi' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('mapel-icons', 'public');
            $validated['icon'] = $path;
        }

        Mapel::create($validated);

        return redirect()->route('mataPelajaran')->with('success', 'Mapel berhasil ditambahkan');
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'mapel' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048',
            'opsi' => 'nullable|string|max:255',
        ]);

        $mapel = Mapel::findOrFail($id);

        if ($request->hasFile('icon')) {
            // hapus file lama jika ada
            if ($mapel->icon && Storage::disk('public')->exists($mapel->icon)) {
                Storage::disk('public')->delete($mapel->icon);
            }
            $validated['icon'] = $request->file('icon')->store('mapel-icons', 'public');
        }

        $mapel->update($validated);

        return redirect()->route('mataPelajaran')->with('success', 'Mapel berhasil diupdate');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->back()->with('success', 'Mapel berhasil dihapus');
    }

    // optional: show single (not required for admin table)
    public function show(Mapel $mapel)
    {
        return response()->json($mapel);
    }
}
