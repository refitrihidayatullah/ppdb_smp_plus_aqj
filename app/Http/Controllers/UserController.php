<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $csrf_token = csrf_token();

        return DataTables::of($users)
            ->addIndexColumn() // Menambahkan kolom indeks
            ->addColumn('action', function ($row) use ($csrf_token) {
                return '<div class="btn-group" role="group">
                        <a href="' . route('user.edit', $row->id) . '" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                    <form id="delete-form-' . $row->id . '" action="' . route('user.destroy', $row->id) . '" method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="' . $csrf_token . '">
                    </form>';
            })
            ->rawColumns(['action']) // Raw columns untuk memastikan HTML tidak di-escape
            ->make(true);
    }
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'no_hp' => 'required|string|unique:admins,no_hp|regex:/^\+?[0-9]{10,15}$/',
            'password' => 'required|string|min:8|confirmed|',
            'password_confirmation' => 'required|same:password',
        ], [
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'nama_lengkap.string' => 'Nama lengkap harus berupa teks.',
            'nama_lengkap.max' => 'Nama lengkap tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berformat yang benar.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'Nomor HP harus diisi.',
            'no_hp.string' => 'Nomor HP harus berupa teks.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar.',
            'no_hp.regex' => 'Nomor HP harus berformat yang benar (10-15 digit, boleh diawali dengan +).',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus setidaknya 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai dengan password.',
            // 'password.regex' => 'Password harus mengandung minimal satu huruf kecil, satu huruf besar, satu angka, dan satu simbol (@$!%*?&).',
            'password_confirmation.required' => 'Konfirmasi password harus diisi.',
            'password_confirmation.same' => 'Konfirmasi password tidak sesuai dengan password.',
        ]);

        // Simpan data ke database
        Admin::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
        ]);

        // var_dump($request);
        echo "hore sukses";
        return redirect()->route('users');
        return redirect()->back()->with('success', 'Pendaftaran berhasil! Selamat, Anda telah berhasil mendaftar. Silakan cek email Anda untuk konfirmasi.');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Admin::find($id);
        return view('user.edit_user', compact('user'));
        // return response()->json($user);


    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate(
            [
                'nama_lengkap' => 'required|string|max:255',
                'email' => 'required|email|unique:admins,email,' . $id,
                'no_hp' => 'required|string|unique:admins,no_hp,' . $id . '|regex:/^\+?[0-9]{10,15}$/',
                'password' => 'nullable|string|min:8|',
            ],
            [
                'nama_lengkap.required' => 'Nama lengkap harus diisi.',
                'nama_lengkap.string' => 'Nama lengkap harus berupa teks.',
                'nama_lengkap.max' => 'Nama lengkap tidak boleh lebih dari 255 karakter.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Email harus berformat yang benar.',
                'email.unique' => 'Email sudah terdaftar.',
                'no_hp.required' => 'Nomor HP harus diisi.',
                'no_hp.string' => 'Nomor HP harus berupa teks.',
                'no_hp.unique' => 'Nomor HP sudah terdaftar.',
                'no_hp.regex' => 'Nomor HP harus berformat yang benar (10-15 digit, boleh diawali dengan +).',
                'password.required' => 'Password harus diisi.',
                'password.string' => 'Password harus berupa teks.',
                'password.min' => 'Password harus setidaknya 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sesuai dengan password.',
                // 'password.regex' => 'Password harus mengandung minimal satu huruf kecil, satu huruf besar, satu angka, dan satu simbol (@$!%*?&).',
                'password_confirmation.required' => 'Konfirmasi password harus diisi.',
                'password_confirmation.same' => 'Konfirmasi password tidak sesuai dengan password.',
            ]


        );

        // Temukan pengguna berdasarkan ID
        $user = Admin::findOrFail($id);

        // Update data pengguna
        $user->name = $request->input('nama_lengkap');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('no_hp');

        // Cek apakah password diisi
        if ($request->filled('password')) {
            // Jika password diisi, hash dan simpan
            $user->password = bcrypt($request->input('password'));
        }

        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('users')->with('success', 'Data pengguna berhasil diperbarui.');
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
        return redirect()->route('users');
        return response()->json(['error' => 'User not found.'], 404);
    }
}
