<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarFakultas = [
            ['nama_fakultas' => 'FEB'],
            ['nama_fakultas' => 'FISIP'],
            ['nama_fakultas' => 'FP'],
            ['nama_fakultas' => 'FTI'],
            ['nama_fakultas' => 'FTM'],
            ['nama_fakultas' => 'kosong'],
        ];

        foreach ($daftarFakultas as $fakultas) {
            Fakultas::create($fakultas);
        }
    }
}
