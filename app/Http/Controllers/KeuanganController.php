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
                $data = Simpanan::where('jenis_simpanan_id', '1')->get();
                return view('keuangan.simpanan.sw', $data);
                break;
            case 'ssshusp':
                $data = Simpanan::where('jenis_simpanan_id', '2')->get();
                return view('keuangan.simpanan.ssshusp', $data);
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
