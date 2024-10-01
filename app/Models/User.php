<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'user';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'no_anggota',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'no_anggota');
    }
}
