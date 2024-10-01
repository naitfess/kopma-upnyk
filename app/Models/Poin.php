<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    public $table = 'poin';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'no_anggota',
        'i1',
        'i2',
        'i3',
        'i4',
        'i5',
        'i6',
        'i7',
        'i8',
        'i9',
        'i10',
        'i11',
        'i12',
        'e1',
        'e2',
        'e3',
        'e4',
        'e5',
        'e6',
        'e7',
        'e8',
        'e9',
        'e10',
        'e11',
        'e12',
        'e13',
        'e14',
        'o1',
        'o2',
        'o3',
        'o4',
        'o5',
        'o6',
        'total',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'no_anggota');
    }
}
