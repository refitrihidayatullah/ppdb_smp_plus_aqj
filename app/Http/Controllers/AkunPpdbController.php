<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunPpdb;
class AkunPpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akunPpdb = AkunPpdb::where('level', 'siswa')->get();
        return view('pages.akun-ppdb.index', compact('akunPpdb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.akun-ppdb.tambah_akun');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);
        $request['level'] = 'siswa';

        AkunPpdb::create($request->all());
        return redirect()->route('akun-ppdb')->with('success', 'Akun PPDB berhasil ditambahkan');   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $akunPpdb = AkunPpdb::find($id);
        return view('pages.akun-ppdb.detail_akun', compact('akunPpdb'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $akunPpdb = AkunPpdb::find($id);
        return view('pages.akun-ppdb.edit_akun', compact('akunPpdb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $akunPpdb = AkunPpdb::find($id);
        $akunPpdb->update($request->all());
        return redirect()->route('akun-ppdb')->with('success', 'Akun PPDB berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $akunPpdb = AkunPpdb::find($id);
        $akunPpdb->delete();
        return redirect()->route('akun-ppdb')->with('success', 'Akun PPDB berhasil dihapus');
        //
    }
}
