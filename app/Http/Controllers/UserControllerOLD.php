<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('user.index');
        //
    }

    public function get_user()
    {

        $users = Admin::select(['id', 'name', 'no_hp', 'email']); // Ambil kolom yang diperlukan
        $csrf_token =  csrf_token();
        return DataTables::of($users)
            ->addIndexColumn() // Menambahkan kolom indeks
            ->addColumn('action', function ($row) {
                return '<div class="btn-group" role="group">
                        <button type="button" class="btn mb-1 btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                        <div class="dropdown-menu">
                             <a class="dropdown-item edit-user" href="#" data-id="' . $row->id . '">Ubah</a>
                            <a class="dropdown-item delete-user" href="#"   data-id="' . $row->id . '">Hapus</a>
                        </div>
                    </div>';
            })
            ->make(true);
    }
    // $users = Admin::all();
    // return response()->json($users);


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tambah_user');
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
    // public function show($id)
    // {

    //     $user = Admin::find($id);
    //     return response()->json($user);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Admin::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Admin::find($request->id);
        $user->name = $request->name;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->save();
        // return redirect()->route('user.index')->with('success', 'Pengguna berhasil diperbarui.');

        return response()->json(['success' => 'User updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Admin::findOrFail($id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => 'User deleted successfully.']);
        }
        return response()->json(['error' => 'User not found.'], 404);
    }
}
