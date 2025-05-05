<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SekolahController extends Controller
{
    // Method untuk menampilkan form pencarian
    public function index()
    {
        return view('cari-sekolah');
    }

    // Method untuk mencari sekolah berdasarkan NPSN
    public function cariSekolah(Request $request)
    {
        $npsn = $request->input('npsn'); // Ambil NPSN dari form
        $client = new Client();
        $url = "https://api-sekolah-indonesia.vercel.app/sekolah?npsn={$npsn}";

        try {
            $response = $client->get($url, [
                'verify' => false, // Nonaktifkan verifikasi SSL
            ]);
            $responseData = json_decode(
                $response->getBody(),
                true
            );

            // Cek status response
            if ($responseData['status'] === 'success' && count($responseData['dataSekolah']) > 0) {
                $sekolah = $responseData['dataSekolah'][0]; // Ambil data pertama dari array dataSekolah
                return view('cari-sekolah', [
                    'sekolah' => $sekolah,
                    'creator' => $responseData['creator'],
                    'status' => $responseData['status'],
                    'total_data' => $responseData['total_data'],
                    'page' => $responseData['page'],
                    'per_page' => $responseData['per_page']
                ]);
            } else {
                return view('cari-sekolah')->with('error', 'Sekolah dengan NPSN tersebut tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return view('cari-sekolah')->with('error', 'Terjadi kesalahan saat mengambil data dari API.');
        }
    }
}
