<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    public $table = 'pendaftaran';
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'no_wa',
        // 'ttl',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'agama',
        'fakultas_id',
        'program_studi_id',
        'email',
        'metode',
        'bukti_path',
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
