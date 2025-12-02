<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;

class NotifikasiUserController extends Controller
{
    public function index()
    {
        $user_id = session('id'); // ambil dari login manual
        if (!$user_id) {
            return redirect('/login');
        }

        $notif = Notifikasi::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notifikasiUser', compact('notif'));
    }

    public function baca($id)
    {
        $user_id = session('id');
        if (!$user_id) {
            return redirect('/login');
        }
        $notif = Notifikasi::where('id', $id)
        ->where('user_id', $user_id)
        ->firstOrFail();

        $notif->update([
            'read' => true
        ]);

        return redirect()->back();
    }
}
