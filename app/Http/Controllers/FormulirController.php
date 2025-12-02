<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulir;
class FormulirController extends Controller
{    // Menampilkan halaman blade
    public function index()
    {
        $formulir = Formulir::all();
        return view('admin.dataFormulir',compact('formulir'));
    }

    // Mengirim data JSON ke formulir.js
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'telpon' => 'required',
            'asalSekolah' => 'required',
            'jenisKelamin' => 'required',
            'kelas' => 'required',
            'opsi' => 'required',
            'paket' => 'required',
        ]);
        }
}
