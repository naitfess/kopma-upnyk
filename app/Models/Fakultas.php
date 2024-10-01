<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'fakultas_id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'fakultas_id');
    }

    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class, 'fakultas_id');
    }
}
