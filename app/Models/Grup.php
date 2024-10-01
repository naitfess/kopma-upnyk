<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    public $table = 'grup';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'link',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'grup_id');
    }
}
