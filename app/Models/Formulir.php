<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Langganan;
use App\Models\Pembayaran;
use App\Http\Controllers\PembayaranController;
use Illuminate\Http\Request;


class Formulir extends Model
{
    protected $table = 'formulir';

    protected $fillable = [
        'user_id',
        'nama',
        'telpon',
        'asalSekolah',
        'jenisKelamin',
        'kelas',
        'opsi',
        'paket',
    ];

    public function user (){
        return $this->belongsTo(User::class);
    }

     public function pembayaran()
    {
    return $this->hasMany(Pembayaran::class);
    }

    public function langganan()
{
    return $this->hasMany(Langganan::class, 'formulir_id');
}

public function mapel()
{
    return $this->belongsTo(Mapel::class);
}
}
