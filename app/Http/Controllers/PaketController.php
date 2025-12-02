<?php
namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::paginate(10);
        return view('admin.dataPaket', compact('paket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'admin' => 'required|numeric',
        ]);

        Paket::create($request->only('nama', 'harga', 'admin'));

        return redirect()->route('dataPaket')->with('success', 'Paket berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'admin' => 'required|numeric',
        ]);

        $paket = Paket::findOrFail($id);
        $paket->update($request->only('nama', 'harga', 'admin'));

        return redirect()->route('dataPaket')->with('success', 'Paket berhasil diupdate');
    }

    public function destroy($id)
    {
        Paket::findOrFail($id)->delete();
        return redirect()->route('dataPaket')->with('success', 'Paket berhasil dihapus');
    }
}
