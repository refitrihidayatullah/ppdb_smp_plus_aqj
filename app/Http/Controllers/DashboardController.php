<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
class DashboardController extends Controller
{
    //


    public function index()
    {

        $data =
            [
                'hitung_semua_siswa' => Siswa::all()->count(),
                'menunggu_validasi' => Siswa::where('status_validasi', 'Belum Validasi')->count(),
                'sudah_validasi' => Siswa::where('status_validasi', 'Sudah Validasi')->count()
                // ''=> Siswa::all()->count(),
            ];
        // dd($data);
        return view('dashboard.index', compact('data'));
    }
}
