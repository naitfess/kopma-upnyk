<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    public $table = 'program_studi';
    public $timestamps = false;
    use HasFactory;

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'program_studi_id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'program_studi_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
