<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class TransferDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Koneksi ke database lama
        $dataLama = DB::connection('kopma_lama')->table('anggota')->get();

        foreach ($dataLama as $data) {
            // Pisahkan tempat lahir dan tanggal lahir
            // $ttlParts = explode(',', $data->ttl);
            // $tempatLahir = trim($ttlParts[0]);
            // $tanggalLahir = Carbon::createFromFormat('d F Y', trim($ttlParts[1]))->format('Y-m-d');

            // Ubah fakultas dan program studi
            $fakultasMapping = [
                'FEB' => 1,
                'FISIP' => 2,
                'FP' => 3,
                'FAPERTA' => 3,
                'FTI' => 4,
                'FTM' => 5,
            ];

            $programStudiMapping = [
                'akuntansi' => 1,
                'manajemen' => 2,
                'menejemen' => 2,
                'menejement' => 2,
                'ekonomi pembangunan' => 3,
                'hubungan masyarakat' => 4,
                'hubungan masyrakat' => 4,
                'ilmu hubungan internasional' => 5,
                'hubungan internasional' => 5,
                'ilmu komunikasi' => 6,
                'ilmi komunikasi' => 6,
                'ilmu komunikas' => 6,
                'ilmu administrasi bisnis' => 7,
                'ilmu administrasi bisnis ' => 7,
                'ilmu admnistrasi bisnis' => 7,
                'adm bisnis' => 7,
                'administrasi bisnis' => 7,
                'ilmu administrasi' => 7,
                'ekonomi bisnis' => 7,
                'agribisnis' => 8,
                'agribisnis ' => 8,
                'agoteknologi' => 9,
                'agroteknologi ' => 9,
                'agroteknologi' => 9,
                'ilmu tanah' => 10,
                'd3 teknik kimia' => 11,
                'teknik kimia d3' => 11,
                's1 teknik kimia' => 12,
                'teknik kimia' => 12,
                'sistem informasi' => 13,
                'teknik industri' => 14,
                'informatika' => 15,
                'teknik informatika' => 15,
                'teknik pertambangan' => 16,
                't. pertambangan' => 16,
                'teknik geomatika' => 17,
                'teknik geologi' => 18,
                'teknik geofisika' => 19,
                'teknik lingkungan' => 20,
                'teknik lingkungan ' => 20,
                'teknik perminyakan' => 21,
                'perminyakan' => 21,
                'teknik metalurgi' => 22,
                'teknik pertambangan, prodi teknik metalurgi' => 22,
                'metalurgi' => 22,
                'teknik geomatika' => 23,
            ];

            // Map fakultas
            $data->fakultas_id = $fakultasMapping[$data->fakultas] ?? null;

            // Map program studi
            $data->program_studi_id = $programStudiMapping[strtolower($data->jurusan)] ?? null;

            // Insert ke database baru
            DB::connection('kopma')->table('anggota')->insert([
                'no_anggota' => $data->no_anggota ?? null,
                'nama' => $data->nama ?? null,
                'nim' => $data->nim ?? null,
                'no_wa' => $data->no_wa ?? null,
                // 'ttl' => $data->ttl ?? null,
                'tempat_lahir' => $tempatLahir ?? null,
                'tanggal_lahir' => $tanggalLahir ?? null,
                'alamat' => $data->alamat ?? null,
                'jenis_kelamin' => $data->kelamin ?? null,
                'agama' => $data->agama ?? null,
                'fakultas_id' => $data->fakultas_id ?? 6,
                'program_studi_id' => $data->program_studi_id ?? 24,
                'email' => $data->email ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
