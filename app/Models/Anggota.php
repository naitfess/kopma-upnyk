<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public $table = 'anggota';
    public $timestamps = false;
    use HasFactory;

    protected $primaryKey = 'no_anggota';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'no_anggota',
        'nama',
        'nim',
        'no_wa',
        'ttl',
        // 'tempat_lahir',
        // 'tanggal_lahir',
        'alamat',
        'kelamin',
        'agama',
        'fakultas_id',
        'program_studi_id',
        'email',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
    }

    public function simpanan()
    {
        return $this->hasMany(Simpanan::class, 'no_anggota');
    }

    public function poin()
    {
        return $this->hasOne(Poin::class, 'no_anggota');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'no_anggota');
    }
}
