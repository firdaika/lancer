<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class Langganan extends Model
{
    protected $table = 'langganan';

    protected $fillable = [
        'formulir_id',
        'paket',
        'tanggal_mulai',
        'tanggal_selesai',
        'status'
    ];

    public function formulir()
    {
        return $this->belongsTo(Formulir::class, 'formulir_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public static function autoExpired(){
        self::where('status', 'aktif')->whereDate('tanggal_selesai', '<', now())->update(['status' => 'expired']);
    }

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class);
    }

    public function checkExpire()
{
    if (now()->greaterThan($this->tanggal_selesai)) {
        $this->update(['status' => 'expired']);
    }
}

}

