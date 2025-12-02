<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';

    protected $fillable = [
        'user_id',
        'judul',
        'pesan',
        'read',
        'pembayaran_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pembayaran() {
        return $this->belongsTo(Pembayaran::class);
    }
}
