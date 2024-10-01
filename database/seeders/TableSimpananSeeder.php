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
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2016,
                    'created_at' => Carbon::create('2016', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2017
            if ($data->tahun2017 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2017,
                    'created_at' => Carbon::create('2017', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2018
            if ($data->tahun2018 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2018,
                    'created_at' => Carbon::create('2018', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2019
            if ($data->tahun2019 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2019,
                    'created_at' => Carbon::create('2019', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2020
            if ($data->tahun2020 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2020,
                    'created_at' => Carbon::create('2020', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2021
            if ($data->tahun2021 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2021,
                    'created_at' => Carbon::create('2021', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2022
            if ($data->tahun2022 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2022,
                    'created_at' => Carbon::create('2022', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2023
            if ($data->tahun2023 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2023,
                    'created_at' => Carbon::create('2023', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2024
            if ($data->tahun2024 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2024,
                    'created_at' => Carbon::create('2024', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //2025
            if ($data->tahun2025 != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 1,
                    'nominal' => $data->tahun2025,
                    'created_at' => Carbon::create('2025', '12', '30'),
                    'keterangan' => '',
                ]);
            }

            //SS
            if ($data->ss != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 2,
                    'nominal' => $data->ss,
                    'created_at' => Carbon::create('2024', '09', '27'),
                    'keterangan' => '',
                ]);
            }

            //SHU
            if ($data->shu != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 3,
                    'nominal' => $data->shu,
                    'created_at' => Carbon::create('2024', '09', '27'),
                    'keterangan' => '',
                ]);
            }

            //SP
            if ($data->sp != 0) {
                DB::connection('kopma_new')->table('simpanan')->insert([
                    'no_anggota' => $data->no_anggota,
                    'jenis_simpanan_id' => 4,
                    'nominal' => $data->sp,
                    'created_at' => Carbon::create('2024', '09', '27'),
                    'keterangan' => '',
                ]);
            }

            //total
            if ($data->total != 0) {
                DB::connection('kopma_new')->table('anggota')->where('no_anggota', $data->no_anggota)->update([
                    'total_simpanan' => $data->total,
                ]);
            }
        }
    }
}
