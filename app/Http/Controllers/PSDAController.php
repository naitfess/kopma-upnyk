<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use App\Models\Poin;
use App\Models\User;
use App\Models\Anggota;
use App\Models\JenisPoin;
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
        $data = Poin::with(['anggota' => function ($query) {
            $query->select('no_anggota', 'nama');
        }])->select('no_anggota', 'total')->get();
        return view('psda.poin.index', ['poin' => $data]);
    }

    public function showPendaftaran()
    {
        $status = request()->query('status');
        switch ($status) {
            case 'new':
                $data = ['pendaftaran' => Pendaftaran::where('status', 'new')->get()];
                return view('psda.pendaftaran.new', $data);
            case 'confirm':
                $data = ['pendaftaran' => Pendaftaran::where('status', 'confirm')->get()];
                return view('psda.pendaftaran.confirm', $data);
            case 'accepted':
                $data = [
                    'pendaftaran' => Pendaftaran::where('status', 'accepted')->get(),
                    'grup1' => Grup::where('jenis', '1')->get(),
                    'grup2' => Grup::where('jenis', '2')->get(),
                ];
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

    public function editAnggota(string $no_anggota)
    {
        $selectedAnggota = Anggota::find($no_anggota);
        $anggota = Anggota::all();

        if (!$selectedAnggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }

        return view('psda.anggota.index', ['selectedAnggota' => $selectedAnggota, 'anggota' => $anggota]);
    }

    public function updateAnggota(Request $request, string $no_anggota)
    {
        $selectedAnggota = Anggota::find($no_anggota);

        if (!$selectedAnggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }

        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'no_wa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kelamin' => 'required',
            'agama' => 'required',
            'fakultas_id' => 'required',
            'program_studi_id' => 'required',
            'email' => 'required',
        ]);

        $selectedAnggota->update($request->all());

        return response()->json(['message' => 'Anggota updated', 'data' => $selectedAnggota], 200);
    }

    public function destroyAnggota(string $no_anggota)
    {
        $selectedAnggota = Anggota::find($no_anggota);

        if (!$selectedAnggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }
        $selectedPoin = Poin::where('no_anggota', $no_anggota)->first();
        $selectedUser = User::where('no_anggota', $no_anggota)->first();

        if ($selectedPoin) {
            $selectedPoin->delete();
        }
        if ($selectedUser) {
            $selectedUser->delete();
        }

        $selectedAnggota->delete();
        return response()->json(['message' => 'Anggota deleted'], 200);
    }

    public function editPoin(string $no_anggota)
    {
        $selectedPoin = Poin::with(['anggota' => function ($query) {
            $query->select('no_anggota', 'nama');
        }])->where('no_anggota', $no_anggota)->first();

        if (!$selectedPoin) {
            return response()->json(['message' => 'Poin not found'], 404);
        }

        $poin = Poin::all();

        return view('psda.poin.index', ['selectedPoin' => $selectedPoin, 'poin' => $poin]);
    }

    public function updatePoin(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required',
            'jenis_poin' => 'required',
        ]);


        $poin = Poin::where('no_anggota', $request->no_anggota)->first();

        if (!$poin) {
            return response()->json(['message' => 'Poin not found'], 404);
        }

        $tambahanPoin = JenisPoin::where('jenis', $request->jenis_poin)->first();
        if (!$tambahanPoin) {
            return response()->json(['message' => 'Jenis poin not found'], 404);
        }

        $poin->{$request->jenis_poin} += $tambahanPoin->tambahan_poin;
        $poin->total += $tambahanPoin->tambahan_poin;
        $poin->save();

        return response()->json(['message' => 'Poin updated', 'data' => $poin], 200);
    }

    public function destroyPoin(string $no_anggota)
    {
        $selectedPoin = Poin::where('no_anggota', $no_anggota)->first();

        if (!$selectedPoin) {
            return response()->json(['message' => 'Poin not found'], 404);
        }

        $selectedPoin->delete();
        return response()->json(['message' => 'Poin deleted'], 200);
    }

    public function storeLink(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'link' => 'required',
        ]);

        $grup = Grup::create($request->all());

        if (!$grup) {
            return back()->with('message', 'Pendaftaran failed');
        }

        return back()->with('message', 'Pendaftaran success');
    }

    public function deleteLink(string $id)
    {
        $selectedGrup = Grup::find($id);

        if (!$selectedGrup) {
            return back()->with('message', 'Grup not found');
        }

        $selectedGrup->delete();
        return back()->with('message', 'Grup deleted');
    }
}
