<?php

namespace App\Http\Controllers;

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
            case 'accepted':
                return view('pendaftaran.accepted');
                break;
            case 'rejected':
                return view('pendaftaran.rejected');
                break;
            default:
                return abort(404, 'File not found');
                break;
        }
    }

    public function showPengumuman()
    {
        $status = request()->query('status');
        switch ($status) {
            case 'close':
                return view('pendaftaran.close');
                break;
            case 'accepted':
                return view('pendaftaran.accepted');
                break;
            case 'rejected':
                return view('pendaftaran.rejected');
                break;
            default:
                return abort(404, 'File not found');
                break;
        }
    }
}
