<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\Anggota;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pendaftaran.index');
    }

    public function store(Request $request)
    {
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
            'metode_pembayaran' => 'required',
            'status' => 'pendaftar'
        ]);

        if ($request->metode_pembayaran == 'transfer') {
            $request->validate([
                'bukti' => 'required|image|mimes:jpeg,png,jpg,pdf|max:2048'
            ]);
        }

        $pendaftaran = Pendaftaran::create($request->all());

        if (!$pendaftaran) {
            return response()->json(['message' => 'Pendaftaran gagal'], 500);
        }

        return response()->json(['message' => 'Pendaftaran berhasil', 'data' => $pendaftaran], 200);
    }

    public function updateStatusConfirm(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json(['message' => 'Pendaftaran tidak ditemukan'], 404);
        }

        $pendaftaran->status = 'konfirmasi';
        $pendaftaran->save();

        return response()->json(['message' => 'Pendaftaran berhasil dikonfirmasi', 'data' => $pendaftaran], 200);
    }

    public function updateStatusAccepted(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json(['message' => 'Pendaftaran tidak ditemukan'], 404);
        }

        $pendaftaran->status = 'diterima';
        $pendaftaran->save();

        return response()->json(['message' => 'Pendaftaran berhasil diterima', 'data' => $pendaftaran], 200);
    }

    public function moveToAnggota()
    {
        $pendaftaran = Pendaftaran::where('status', 'diterima')->get();

        foreach ($pendaftaran as $p) {
            $no_anggota = $p->nim;
            $anggota = Anggota::create([
                'no_anggota' => $no_anggota,
                'nama' => $p->nama,
                'nim' => $p->nim,
                'no_wa' => $p->no_wa,
                'ttl' => $p->ttl,
                'alamat' => $p->alamat,
                'kelamin' => $p->kelamin,
                'agama' => $p->agama,
                'fakultas_id' => $p->fakultas_id,
                'program_studi_id' => $p->program_studi_id,
                'email' => $p->email,
            ]);

            if (!$anggota) {
                return response()->json(['message' => 'Anggota not created'], 500);
            }

            $poin = Poin::create([
                'no_anggota' => $anggota->no_anggota,
            ]);

            $p->delete();
        }

        return response()->json(['message' => 'Pendaftaran berhasil dipindahkan ke anggota'], 200);
    }

    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json(['message' => 'Pendaftaran tidak ditemukan'], 404);
        }

        $pendaftaran->delete();

        return response()->json(['message' => 'Pendaftaran berhasil dihapus'], 200);
    }
}
