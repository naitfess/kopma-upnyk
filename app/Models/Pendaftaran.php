<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    public $table = 'pendaftaran';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'waktu',
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
        'jurusan_id',
        'email',
        'metode',
        'bukti',
        'status',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id');
    }
}
