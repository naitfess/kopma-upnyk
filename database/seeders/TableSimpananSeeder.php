<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableSimpananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataLama = DB::connection('kopma_lama')->table('simpanan')->get();
        foreach ($dataLama as $data) {
            //2016
            if ($data->tahun2016 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2016,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2016',
                ]);
            }

            //2017
            if ($data->tahun2017 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2017,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2017',
                ]);
            }

            //2018
            if ($data->tahun2018 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2018,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2018',
                ]);
            }

            //2019
            if ($data->tahun2019 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2019,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2019',
                ]);
            }

            //2020
            if ($data->tahun2020 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2020,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2020',
                ]);
            }

            //2021
            if ($data->tahun2021 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2021,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2021',
                ]);
            }

            //2022
            if ($data->tahun2022 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2022,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2022',
                ]);
            }

            //2023
            if ($data->tahun2023 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2023,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2023',
                ]);
            }

            //2024
            if ($data->tahun2024 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2024,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2024',
                ]);
            }

            //2025
            if ($data->tahun2025 != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2025,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '2025',
                ]);
            }

            //SS
            if ($data->ss != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 2,
                    'nominal' => $data->ss,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '',
                ]);
            }

            //SHU
            if ($data->shu != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 3,
                    'nominal' => $data->shu,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '',
                ]);
            }

            //SP
            if ($data->sp != 0) {
                DB::connection('kopma')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 4,
                    'nominal' => $data->sp,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'keterangan' => '',
                ]);
            }

            //total
            if ($data->total != 0) {
                DB::connection('kopma')->table('anggota')->where('no_anggota', $data->no_anggota)->update([
                    'total_simpanan' => $data->total,
                ]);
            }
        }
    }
}
