<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSimpanan extends Model
{
    public $table = 'jenis_simpanan';
    public $timestamps = false;
    use HasFactory;

    public function simpanan()
    {
        return $this->hasMany(Simpanan::class, 'jenis_simpanan_id');
    }
}
