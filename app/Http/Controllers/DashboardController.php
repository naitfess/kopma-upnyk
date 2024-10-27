<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'anggota' => Anggota::count(),
            'pendaftar' => Pendaftaran::where('status', 'pending')->count(),
            'diterima' => Pendaftaran::where('status', 'diterima')->count(),
        ];
        return view('dashboard.index', $data);
    }
}
