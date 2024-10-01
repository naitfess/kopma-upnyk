<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TablePoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataLama = DB::connection('kopma_lama')->table('poin')->get();

        foreach ($dataLama as $data) {
            DB::connection('kopma_new')->table('poin')->insert([
                'no_anggota' => $data->no_anggota,
                'i1' => $data->i1,
                'i2' => $data->i2,
                'i3' => $data->i3,
                'i4' => $data->i4,
                'i5' => $data->i5,
                'i6' => $data->i6,
                'i7' => $data->i7,
                'i8' => $data->i8,
                'i9' => $data->i9,
                'i10' => $data->i10,
                'i11' => $data->i11,
                'i12' => $data->i12,
                'e1' => $data->e1,
                'e2' => $data->e2,
                'e3' => $data->e3,
                'e4' => $data->e4,
                'e5' => $data->e5,
                'e6' => $data->e6,
                'e7' => $data->e7,
                'e8' => $data->e8,
                'e9' => $data->e9,
                'e10' => $data->e10,
                'e11' => $data->e11,
                'e12' => $data->e12,
                'e13' => $data->e13,
                'e14' => $data->e14,
                'o1' => $data->o1,
                'o2' => $data->o2,
                'o3' => $data->o3,
                'o4' => $data->o4,
                'o5' => $data->o5,
                'o6' => $data->o6,
                'total' => $data->total,
            ]);
        }
    }
}
