<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function showSimpanan()
    {
        $type = request()->query('type');
        $data = [];
        switch ($type) {
            case 'sw':
                $data_simpanan = [];
                $simpanan = Simpanan::with('anggota')
                    ->where('jenis_simpanan_id', 1)
                    ->get()
                    ->groupBy('keterangan');

                //jumlahkan nominal simpanan per keterangan per user
                foreach ($simpanan as $year => $simapan_per_year) {
                    foreach ($simapan_per_year as $sim) {
                        // Jika anggota belum ada dalam array, buat entry baru
                        if (!isset($data_simpanan[$sim->anggota->no_anggota])) {
                            $data_simpanan[$sim->anggota->no_anggota] = ['nama' => $sim->anggota->nama];
                        }
                        // Menambahkan nominal simpanan untuk anggota berdasarkan tahun (keterangan)
                        // Jika sudah ada simpanan di tahun yang sama, kita jumlahkan nominalnya
                        if (isset($data_simpanan[$sim->anggota->no_anggota][$year])) {
                            $data_simpanan[$sim->anggota->no_anggota][$year] += $sim->nominal; // Menjumlahkan nominal
                        } else {
                            $data_simpanan[$sim->anggota->no_anggota][$year] = $sim->nominal; // Menambahkan nominal jika belum ada
                        }
                    }
                }
                return view('keuangan.simpanan.sw', ['data_simpanan' => $data_simpanan]);
                break;
            case 'ssshusp':
                $data_simpanan = Simpanan::with('anggota')
                    ->whereIn('jenis_simpanan_id', [2, 3, 4])
                    ->get()
                    ->groupBy('jenis_simpanan_id');
                return view('keuangan.simpanan.ssshusp', ['data_simpanan' => $data_simpanan]);
                break;
            case 'akumulasi':
                $data = Simpanan::where('jenis_simpanan_id', '3')->get();
                return view('keuangan.simpanan.akumulasi', $data);
                break;
            default:
                return abort(404, 'File not found');
                break;
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required',
            'jenis_simpanan_id' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required'
        ]);

        $simpanan = Simpanan::create($request->all());

        if (!$simpanan) {
            return response()->json(['message' => 'Simpanan not created'], 500);
        }

        $anggota = Anggota::where('no_anggota', $request->no_anggota)->first();
        $anggota->total += $request->nominal;
        $anggota->save();

        return response()->json(['message' => 'Simpanan created', 'data' => $simpanan], 200);
    }

    public function edit(string $id)
    {
        $simpanan = Simpanan::find($id);

        if (!$simpanan) {
            return response()->json(['message' => 'Simpanan not found'], 404);
        }

        return response()->json(['data' => $simpanan], 200);
    }

    public function update(Request $request, string $id)
    {
        $simpanan = Simpanan::find($id);

        if (!$simpanan) {
            return response()->json(['message' => 'Simpanan not found'], 404);
        }

        $request->validate([
            'no_anggota' => 'required',
            'jenis_simpanan_id' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required'
        ]);

        $simpanan->update($request->all());

        $anggota = Anggota::where('no_anggota', $request->no_anggota)->first();
        $anggota->total += $request->nominal;
        $anggota->save();

        return response()->json(['message' => 'Simpanan updated', 'data' => $simpanan], 200);
    }

    public function destroy(string $id)
    {
        $simpanan = Simpanan::find($id);

        if (!$simpanan) {
            return response()->json(['message' => 'Simpanan not found'], 404);
        }

        $simpanan->delete();

        return response()->json(['message' => 'Simpanan deleted'], 200);
    }
}
