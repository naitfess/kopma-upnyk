<?php

namespace Database\Seeders;

use App\Models\JenisSimpanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSimpananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSimpanan = [
            ['nama_simpanan' => 'SW'],
            ['nama_simpanan' => 'SS'],
            ['nama_simpanan' => 'SHU'],
            ['nama_simpanan' => 'SP'],
        ];

        foreach ($jenisSimpanan as $simpanan) {
            JenisSimpanan::create($simpanan);
        }
    }
}
