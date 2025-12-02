<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langganan;
class Langganancontroller extends Controller
{
    public function index()
    {
        $langganan = Langganan::all();
        return view('admin.dataLangganan', compact('langganan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'formulir_id' => 'required',
            'paket' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'status' => 'required',
        ]);
    }
}
