<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $cek = Siswa::all();
        // dd($cek);

        return view('data_siswa.index');
        //
    }

    public function get_siswa()
    {
        $siswa = Siswa::select(['foto_siswa', 'id', 'nama_siswa', 'tempat_lahir', 'tanggal_lahir', 'nama_sekolah_asal', 'tahun_daftar', 'status_selesai', 'status_validasi']); // Ubah urutan kolom untuk menambahkan foto di depan
        $csrf_token = csrf_token();

        return DataTables::of($siswa)
            ->addIndexColumn() // Menambahkan kolom indeks

            ->addColumn('foto', function ($row) {
                // Pastikan 'foto_siswa' berisi path atau URL ke foto siswa
                return '<img src="' . asset('storage/' . $row->foto_siswa) . '" alt="Foto Siswa" style="width: 50px; height: 50px; border-radius: 50%;">';
            })

            ->addColumn('action', function ($row) use ($csrf_token) {
                return '<div class="btn-group" role="group">
                    <a href="' . route('siswa.edit', $row->id) . '" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
                <form id="delete-form-' . $row->id . '" action="' . route('siswa.destroy', $row->id) . '" method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="' . $csrf_token . '">
                </form>';
            })
            ->rawColumns(['foto', 'action']) // Raw columns untuk memastikan HTML tidak di-escape
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('data_siswa.tambah_akun_siswa');


        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());

        // dd($request);
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email|unique:siswas,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ], [
            'nama_siswa.required' => 'Nama siswa harus diisi.',
            'nama_siswa.string' => 'Nama siswa harus berupa teks.',
            'nama_siswa.max' => 'Nama siswa tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berformat yang benar.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus setidaknya 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai dengan password.',
            'password_confirmation.required' => 'Konfirmasi password harus diisi.',
            'password_confirmation.same' => 'Konfirmasi password tidak sesuai dengan password.',
        ]);



        // Simpan data siswa ke database
        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('data_siswa')->with('success', 'Akun siswa berhasil ditambahkan.');
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
