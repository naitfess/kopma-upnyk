<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarProgramStudi = [
            '1' => [
                ['nama' => 'Akuntansi'],
                ['nama' => 'Manajemen'],
                ['nama' => 'Ekonomi Pembangunan'],
            ],
            '2' => [
                ['nama' => 'Hubungan Masyarakat'],
                ['nama' => 'Ilmu Hubungan Internasional'],
                ['nama' => 'Ilmu Komunikasi'],
                ['nama' => 'Ilmu Administrasi Bisnis'],
            ],
            '3' => [
                ['nama' => 'Agribisnis'],
                ['nama' => 'Agroteknologi'],
                ['nama' => 'Prodi Ilmu Tanah'],
            ],
            '4' => [
                ['nama' => 'D3 Teknik Kimia'],
                ['nama' => 'S1 Teknik Kimia'],
                ['nama' => 'Sistem Informasi'],
                ['nama' => 'Teknik Industri'],
                ['nama' => 'Informatika'],
            ],
            '5' => [
                ['nama' => 'Teknik Pertambangan'],
                ['nama' => 'Program Studi Teknik Geomatika'],
                ['nama' => 'Teknik Geologi'],
                ['nama' => 'Teknik Geofisika'],
                ['nama' => 'Teknik Lingkungan'],
                ['nama' => 'Teknik Perminyakan'],
                ['nama' => 'Teknik Metalurgi'],
                ['nama' => 'Teknik Geomatika'],

            ],
            '6' => [
                ['nama' => 'kosong'],
            ]
        ];

        foreach ($daftarProgramStudi as $fakultas => $programStudiList) {
            foreach ($programStudiList as $programStudi) {
                ProgramStudi::create([
                    'fakultas_id' => $fakultas,
                    'nama_program_studi' => $programStudi['nama']
                ]);
            }
        }
    }
}
