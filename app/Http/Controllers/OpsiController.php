<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Auth;

class OpsiController extends Controller
{

    //TAMPILAN OPSISAINS
    public function sains()
    {
        return view('opsisains');
    }

    //TAMPILAN OPSIIT
    public function it()
    {
        return view('opsiIt');
    }

    //TAMPILAN OPSIBAHASA
    public function bahasa()
    {
        return view('opsiBahasa');
    }

    //TAMPILAN OPSISOSIAL
    public function sosial()
    {
        return view('opsisosial');
    }

   //PILIH MAPEL
    public function pilihMapel(Request $request)
    {
        $request->validate([
            'opsi' => 'required|string'
        ]);

        $request->session()->put('opsi', $request->opsi);

        $user_id = session('id');
        if(!$user_id){
            $request->session()->put('redirect_after_login', route('pembayaran'));
            return redirect()->route('login');
        }

        return redirect()->route('pembayaran');
    }

}
