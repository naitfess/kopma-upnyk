<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    public $table = 'user';
    use HasFactory, Notifiable;

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
