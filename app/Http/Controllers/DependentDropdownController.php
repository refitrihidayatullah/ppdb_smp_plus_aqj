<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response; // Pastikan untuk mengimpor Response jika diperlukan

class DependentDropdownController extends Controller
{
    public function provinces()
    {
        try {
            // Mengambil semua provinsi
            $provinces = \Indonesia::allProvinces();
            return response()->json($provinces); // Mengembalikan data dalam format JSON
        } catch (\Exception $e) {
            // Menangani kesalahan dan mengembalikan respons error
            return response()->json(['error' => 'Unable to fetch provinces.'], 500);
        }
    }

    public function cities(Request $request)
    {
        try {
            // Memastikan ID provinsi ada
            $this->validate($request, [
                'id' => 'required|exists:provinces,id', // Validasi ID provinsi
            ]);

            // Mengambil kota berdasarkan ID provinsi
            $cities = \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
            return response()->json($cities); // Mengembalikan data dalam format JSON
        } catch (\Exception $e) {
            // Menangani kesalahan dan mengembalikan respons error
            return response()->json(['error' => 'Unable to fetch cities.'], 500);
        }
    }

    public function districts(Request $request)
    {
        try {
            // Memastikan ID kota ada
            $this->validate($request, [
                'id' => 'required|exists:cities,id', // Validasi ID kota
            ]);

            // Mengambil distrik berdasarkan ID kota
            $districts = \Indonesia::findCity($request->id, ['districts'])->districts->pluck('name', 'id');
            return response()->json($districts); // Mengembalikan data dalam format JSON
        } catch (\Exception $e) {
            // Menangani kesalahan dan mengembalikan respons error
            return response()->json(['error' => 'Unable to fetch districts.'], 500);
        }
    }

    public function villages(Request $request)
    {
        try {
            // Memastikan ID distrik ada
            $this->validate($request, [
                'id' => 'required|exists:districts,id', // Validasi ID distrik
            ]);

            // Mengambil desa berdasarkan ID distrik
            $villages = \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('name', 'id');
            return response()->json($villages); // Mengembalikan data dalam format JSON
        } catch (\Exception $e) {
            // Menangani kesalahan dan mengembalikan respons error
            return response()->json(['error' => 'Unable to fetch villages.'], 500);
        }
    }
}
