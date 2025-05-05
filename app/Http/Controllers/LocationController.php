<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;

class LocationController extends Controller
{
    public function getProvinces()
    {
        $provinces = Provinsi::all();
        return response()->json($provinces);
    }

    public function getCities(Request $request)
    {
        $cities = Kabupaten::where('province_code', $request->province_code)->get();
        return response()->json($cities);
    }

    public function getDistricts(Request $request)
    {
        $districts = Kecamatan::where('city_code', $request->city_code)->get();
        return response()->json($districts);
    }

    public function getVillages(Request $request)
    {
        $villages = Desa::where('district_code', $request->district_code)->get();
        return response()->json($villages);
    }

    // public function index()
    // {
    //     $provinsi = Province::all();
    //     return view('location', compact('provinsi'));
    // }
}
