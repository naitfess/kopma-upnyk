<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\Anggota;
use App\Models\Fakultas;
use App\Models\Pendaftaran;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    public function index()
    {
        $program_studi = ProgramStudi::all();
        $fakultas = Fakultas::all();
        $program_studi->pop();
        $fakultas->pop();
        return view('pendaftaran.index', [
            'program_studi' => $program_studi,
            'fakultas' => $fakultas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:pendaftaran,nim',
            'no_wa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id',
            'program_studi_id' => 'required|exists:program_studi,id',
            'email' => 'required|email',
            'metode' => 'required',
        ]);

        if ($request->metode == 'Transfer') {
            $request->validate([
                'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // Upload image ke storage
            if ($request->hasFile('bukti')) {
                $file = $request->file('bukti');
                $filename = time() . '.' . $file->getClientOriginalExtension();

                // Simpan file ke storage/app/public/bukti
                $file->storeAs('bukti', $filename, 'public');

                // Simpan path ke database
                $buktiPath = 'bukti/' . $filename;
                $request->merge(['bukti_path' => $buktiPath]);
            }
        }

        try {
            $pendaftaran = Pendaftaran::create($request->all());

            if (!$pendaftaran) {
                return back()->with('error', 'Pendaftaran gagal dibuat.');
            }

            return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil dibuat.');
        } catch (\Exception $e) {
            Log::error('PendaftaranController@store', ['error' => $e->getMessage()]);
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updateStatusConfirm(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json(['message' => 'Pendaftaran tidak ditemukan'], 404);
        }

        $pendaftaran->status = 'confirm';
        $pendaftaran->save();

        return back()->with('success', 'Pendaftaran berhasil dikonfirmasi');
    }

    public function updateStatusAccepted(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json(['message' => 'Pendaftaran tidak ditemukan'], 404);
        }

        $pendaftaran->status = 'accepted';
        $pendaftaran->save();

        return back()->with('success', 'Pendaftaran berhasil Diterima');
    }

    public function updateStatusRejected(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json(['message' => 'Pendaftaran tidak ditemukan'], 404);
        }

        $pendaftaran->status = 'rejected';
        $pendaftaran->save();

        return back()->with('success', 'Pendaftaran berhasil ditolak');
    }

    public function moveToAnggota()
    {
        $pendaftaran = Pendaftaran::where('status', 'accepted')->get();

        foreach ($pendaftaran as $i => $p) {
            $angkatan = substr($p->nim, 3, 2);
            $bulan = Carbon::parse($p->created_at)->format('m');
            $tahun = Carbon::parse($p->created_at)->format('y');
            $urutan = sprintf('%03d', $i + 1);
            $no_anggota = sprintf('%s.%s.%s.%s', $urutan, $angkatan, $bulan, $tahun);
            $anggota = Anggota::create([
                'no_anggota' => $no_anggota,
                'nama' => $p->nama,
                'nim' => $p->nim,
                'no_wa' => $p->no_wa,
                'tempat_lahir' => $p->tempat_lahir,
                'tanggal_lahir' => $p->tanggal_lahir,
                'alamat' => $p->alamat,
                'jenis_kelamin' => $p->jenis_kelamin,
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

        return back()->with('success', 'Pendaftaran berhasil dipindahkan ke anggota');
    }

    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return response()->json(['message' => 'Pendaftaran tidak ditemukan'], 404);
        }

        $pendaftaran->delete();

        return back()->with('success', 'Pendaftaran berhasil dihapus');
    }
}
