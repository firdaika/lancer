<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';

    protected $fillable = [
        'mapel',
        'icon',
        'opsi',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class , 'mapel_id');
    }
}
