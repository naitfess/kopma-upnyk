<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    public $table = 'simpanan';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'no_anggota',
        'jenis_simpanan_id',
        'nominal',
        'waktu',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'no_anggota');
    }

    public function jenisSimpanan()
    {
        return $this->belongsTo(JenisSimpanan::class, 'jenis_simpanan_id');
    }
}
