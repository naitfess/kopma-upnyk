<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\User;
use App\Models\Fakultas;
use App\Models\JenisPoin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProgramStudi;
use App\Models\JenisSimpanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([FakultasSeeder::class, ProgramStudiSeeder::class, JenisSimpananSeeder::class, JenisPoinSeeder::class]);
        Fakultas::all();
        ProgramStudi::all();
        JenisSimpanan::all();
        JenisPoin::all();
        Anggota::create([
            'no_anggota' => 'admin',
            'nama' => 'admin',
            'nim' => 'admin',
            'no_wa' => 'admin',
            // 'ttl' => 'admin',
            'tempat_lahir' => 'Batam',
            'tanggal_lahir' => '2024-09-27',
            'alamat' => 'admin',
            'jenis_kelamin' => 'admin',
            'agama' => 'admin',
            'fakultas_id' => 1,
            'program_studi_id' => 1,
            'email' => 'admin',

        ]);
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'no_anggota' => 'admin',
            'role' => 'admin',
        ]);
    }
}
