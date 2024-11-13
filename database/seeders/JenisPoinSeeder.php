<?php

namespace Database\Seeders;

use App\Models\JenisPoin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisPoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jenis' => 'i1', 'tambahan_poin' => 100],
            ['jenis' => 'i2', 'tambahan_poin' => 85],
            ['jenis' => 'i3', 'tambahan_poin' => 75],
            ['jenis' => 'i4', 'tambahan_poin' => 75],
            ['jenis' => 'i5', 'tambahan_poin' => 65],
            ['jenis' => 'i6', 'tambahan_poin' => 55],
            ['jenis' => 'i7', 'tambahan_poin' => 45],
            ['jenis' => 'i8', 'tambahan_poin' => 35],
            ['jenis' => 'i9', 'tambahan_poin' => 35],
            ['jenis' => 'i10', 'tambahan_poin' => 30],
            ['jenis' => 'i11', 'tambahan_poin' => 25],
            ['jenis' => 'i12', 'tambahan_poin' => 15],
            ['jenis' => 'e1', 'tambahan_poin' => 15],
            ['jenis' => 'e2', 'tambahan_poin' => 35],
            ['jenis' => 'e3', 'tambahan_poin' => 55],
            ['jenis' => 'e4', 'tambahan_poin' => 45],
            ['jenis' => 'e5', 'tambahan_poin' => 35],
            ['jenis' => 'e6', 'tambahan_poin' => 35],
            ['jenis' => 'e7', 'tambahan_poin' => 30],
            ['jenis' => 'e8', 'tambahan_poin' => 25],
            ['jenis' => 'e9', 'tambahan_poin' => 100],
            ['jenis' => 'e10', 'tambahan_poin' => 85],
            ['jenis' => 'e11', 'tambahan_poin' => 80],
            ['jenis' => 'e12', 'tambahan_poin' => 85],
            ['jenis' => 'e13', 'tambahan_poin' => 75],
            ['jenis' => 'e14', 'tambahan_poin' => 65],
            ['jenis' => 'o1', 'tambahan_poin' => 30],
            ['jenis' => 'o2', 'tambahan_poin' => 30],
            ['jenis' => 'o3', 'tambahan_poin' => 35],
            ['jenis' => 'o4', 'tambahan_poin' => 25],
            ['jenis' => 'o5', 'tambahan_poin' => 25],
            ['jenis' => 'o6', 'tambahan_poin' => 20],
        ];

        foreach ($data as $jenis) {
            JenisPoin::create($jenis);
        }
    }
}
