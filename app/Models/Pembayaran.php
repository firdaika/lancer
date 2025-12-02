<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PembayaranController;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'user_id',
        'formulir_id',
        'metode_pembayaran',
        'total',
        'status',
    ];

     public function user (){
        return $this->belongsTo(User::class);
    }

     public function formulir(){
        return $this->belongsTo(Formulir::class);
    }

    public function langganan(){
        return $this->belongsTo(Langganan::class);
    }
}
