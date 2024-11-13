<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $status = request()->query('status');
        switch ($status) {
            case '':
                return view('pendaftaran.pengumuman');
                break;
            case 'close':
                return view('pendaftaran.close');
                break;
            default:
                return abort(404, 'File not found');
                break;
        }
    }

    public function checkWithNim(Request $request)
    {
        $request->validate([
            'nim' => 'required'
        ]);

        $pendaftaran = Pendaftaran::where('nim', $request->nim)->first();

        if (!$pendaftaran) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        if ($pendaftaran->status != 'diterima') {
            return view('pendaftaran.rejected', ['pendaftaran' => $pendaftaran->nama]);
        }

        return view('pendaftaran.accepted', ['pendaftaran' => $pendaftaran->nama]);
    }
}
