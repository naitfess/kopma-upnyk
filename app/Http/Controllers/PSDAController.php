<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\Anggota;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PSDAController extends Controller
{
    public function showAnggota()
    {
        $data = ['anggota' => Anggota::all()];
        return view('psda.anggota.index', $data);
    }

    public function showPoin()
    {
        $data = ['poin' => Poin::all()];
        return view('psda.poin.index', $data);
    }

    public function showPendaftaran()
    {
        $status = request()->query('status');
        switch ($status) {
            case 'pending':
                $data = ['pendaftaran' => Pendaftaran::where('status', 'pending')->get()];
                return view('psda.pendaftaran.pending', $data);
            case 'confirm':
                $data = ['pendaftaran' => Pendaftaran::where('status', 'confirm')->get()];
                return view('psda.pendaftaran.confirm', $data);
            case 'accepted':
                $data = ['pendaftaran' => Pendaftaran::where('status', 'accepted')->get()];
                return view('psda.pendaftaran.accepted', $data);
            default:
                return abort(404, 'Status tidak ditemukan');
        }
    }


    public function storeAnggota(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'no_wa' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'kelamin' => 'required',
            'agama' => 'required',
            'fakultas_id' => 'required',
            'program_studi_id' => 'required',
            'email' => 'required',
        ]);

        $anggota = Anggota::create($request->all());

        if (!$anggota) {
            return response()->json(['message' => 'Anggota not created'], 500);
        }

        $poin = Poin::create([
            'no_anggota' => $anggota->no_anggota,
        ]);

        // $user = User::create([
        //     'username' => $anggota->no_anggota,
        //     'password' => bcrypt($anggota->no_anggota),
        //     'no_anggota' => $anggota->no_anggota,
        // ]);

        return response()->json(['message' => 'Anggota created', 'data' => $anggota], 201);
    }

    public function edit(string $no_anggota)
    {
        $anggota = Anggota::find($no_anggota);

        if (!$anggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }

        return response()->json(['data' => $anggota], 200);
    }

    public function updateAnggota(Request $request, string $no_anggota)
    {
        $anggota = Anggota::find($no_anggota);

        if (!$anggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }

        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'no_wa' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'kelamin' => 'required',
            'agama' => 'required',
            'fakultas_id' => 'required',
            'program_studi_id' => 'required',
            'email' => 'required',
        ]);

        $anggota->update($request->all());

        return response()->json(['message' => 'Anggota updated', 'data' => $anggota], 200);
    }

    public function destroy(string $no_anggota)
    {
        $anggota = Anggota::find($no_anggota);

        if (!$anggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }

        $anggota->delete();

        return response()->json(['message' => 'Anggota deleted'], 200);
    }
}
