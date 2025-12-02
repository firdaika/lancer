<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = [
        'materi_id',
        'langganan_id',
        'kelas',
        'pengajar',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'gmeet_link',
        'status',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }

    public function langganan()
    {
        return $this->belongsTo(Langganan::class, 'langganan_id');
    }
}
