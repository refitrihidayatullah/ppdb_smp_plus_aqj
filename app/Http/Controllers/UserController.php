<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('level', ['admin', 'panitia'])->get();   
        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.tambah_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'no_hp_panitia' => 'required|numeric|digits:12|unique:users',
            'password' => 'required|confirmed',
        ],
        [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'level.required' => 'Role harus diisi',
            'no_hp_panitia.required' => 'No HP harus diisi',
            'no_hp_panitia.numeric' => 'No HP harus berupa angka',
            'no_hp_panitia.digits' => 'No HP harus berupa 12 digit',
            'no_hp_panitia.unique' => 'No HP sudah terdaftar',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->no_hp_panitia = $request->no_hp_panitia;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->whereIn('level', ['admin', 'panitia'])->first();
        return view('pages.user.detail_user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->whereIn('level', ['admin', 'panitia'])->first();
        return view('pages.user.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'level' => 'required',
            'no_hp_panitia' => 'required|numeric|digits:12|unique:users,no_hp_panitia,'.$id,
            'password' => 'required|confirmed',

        ],
        [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'level.required' => 'Role harus diisi',
            'no_hp_panitia.required' => 'No HP harus diisi',
            'no_hp_panitia.numeric' => 'No HP harus berupa angka',
            'no_hp_panitia.digits' => 'No HP harus berupa 12 digit',
            'no_hp_panitia.unique' => 'No HP sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak cocok',
        ]);

        $user = User::where('id', $id)->whereIn('level', ['admin', 'panitia'])->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->no_hp_panitia = $request->no_hp_panitia;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user');
    }
}
?>