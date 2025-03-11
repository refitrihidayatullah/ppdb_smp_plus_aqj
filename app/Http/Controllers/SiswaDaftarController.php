<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\ValidationException;


class SiswaDaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //load data siswa berdasarkan user login
        $siswa = Siswa::where('id',  Auth::guard('siswa')->user()->id )->first();
        // dd($siswa);
        return view('siswa.dashboard' ,compact('siswa') );

    }

    /**
     * Show the form for creating a new resource.
     */


     public function send_domisili_siswa(Request $request){





     }
    public function create()
    {


        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
