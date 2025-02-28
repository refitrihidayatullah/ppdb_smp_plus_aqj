<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use App\Models\Provinsi;
use Illuminate\Contracts\Support\ValidatedData;
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

    public function test_edit()
    {
        return view('data_siswa/edit_detail_siswa');
    }
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $provinsi = Provinsi::all();
        // dd($provinsi);
        // dd($siswa);
        return view('data_siswa/edit_detail_siswa', compact('siswa', 'provinsi'));

        //
    }


    // digunakan untuk kirim hasil form json

    public function send_kelas_dom(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'kelas_masuk' => 'required|string',
            'status_domisili' => 'required|string',
        ]);

        // Find the Siswa record to update
        $siswa = Siswa::find($request->input('siswa_id')); // Assuming you have a siswa_id in the form

        if (!$siswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'Siswa not found.',
            ], 404);
        }

        // Update the Siswa record
        $siswa_update = [
            'kelas' => $validatedData['kelas_masuk'],
            'domisili' => $validatedData['status_domisili'],

        ];


        $siswa->update($siswa_update);

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas dan Domisili Telah Berhasil di update!',
            'data' => $validatedData,
        ]);
    }

    public function send_identitas_siswa(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_siswa' => 'required',
            // 'nisn' => 'required|unique:siswas,nisn_siswa',
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'status_anak' => 'required',
            'agama_siswa' => 'required',
            'no_hp' => 'required',
            'golda' => 'required',
            'penyakit_siswa' => 'required',
        ]);

        // Find the Siswa record to update
        $siswa = Siswa::find($request->input('siswa_id')); // Assuming you have a siswa_id in the form

        if (!$siswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'Siswa not found.',
            ], 404);
        }

        // cek NISN
        if ($siswa->nisn_siswa != $validatedData['nisn']) {
            // Update the Siswa record
            $siswa_update = [
                'nama_siswa' => $validatedData['nama_siswa'],
                'nisn_siswa' => $validatedData['nisn'],
                'tempat_lahir' => $validatedData['tempat_lahir'],
                'tanggal_lahir' => $validatedData['tanggal_lahir_siswa'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'status_anak' => $validatedData['status_anak'],
                'agama' => $validatedData['agama_siswa'],
                'no_hp' => $validatedData['no_hp'],
                'golongan_darah' => $validatedData['golda'],
                'penyakit_yang_diderita' => $validatedData['penyakit_siswa'],



                // 'kelas' => $validatedData['kelas_masuk'],
                // 'domisili' => $validatedData['status_domisili'],

            ];
        } else {
            // Update the Siswa record
            $siswa_update = [
                'nama_siswa' => $validatedData['nama_siswa'],
                'nisn_siswa' => $validatedData['nisn'],
                'tempat_lahir' => $validatedData['tempat_lahir'],
                'tanggal_lahir' => $validatedData['tanggal_lahir_siswa'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'status_anak' => $validatedData['status_anak'],
                'agama' => $validatedData['agama_siswa'],
                'no_hp' => $validatedData['no_hp'],
                'golongan_darah' => $validatedData['golda'],
                'penyakit_yang_diderita' => $validatedData['penyakit_siswa'],



                // 'kelas' => $validatedData['kelas_masuk'],
                // 'domisili' => $validatedData['status_domisili'],

            ];
        }


        // // Update the Siswa record
        // $siswa_update = [
        //     'nama_siswa' => $validatedData['nama_siswa'],
        //     // 'nisn_siswa' => $validatedData['nisn'],
        //     'tempat_lahir' => $validatedData['tempat_lahir'],
        //     'tanggal_lahir' => $validatedData['tanggal_lahir_siswa'],
        //     'jenis_kelamin' => $validatedData['jenis_kelamin'],
        //     'status_anak' => $validatedData['status_anak'],
        //     'agama' => $validatedData['agama_siswa'],
        //     'no_hp' => $validatedData['no_hp'],
        //     'golongan_darah' => $validatedData['golda'],
        //     'penyakit_yang_diderita' => $validatedData['penyakit_siswa'],



        //     // 'kelas' => $validatedData['kelas_masuk'],
        //     // 'domisili' => $validatedData['status_domisili'],

        // ];
        // $siswa_form =

        $siswa->update($siswa_update);

        return response()->json([
            'status' => 'success',
            'message' => 'Identitas Siswa telah berhasil di update!',
            'data' => $validatedData,
        ]);
    }

    public function send_alamat_siswa(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'provinsi_siswa' => 'required|string',
            'kabupaten_siswa' => 'required|string',
            'kecamatan_siswa' => 'required|string',
            'desa_kelurahan_siswa' => 'required|string',
        ]);

        // Find the Siswa record to update
        $siswa = Siswa::find($request->input('siswa_id')); // Assuming you have a siswa_id in the form

        if (!$siswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'Siswa not found.',
            ], 404);
        }

        // Update the Siswa record
        $siswa_update = [
            'alamat_provinsi' => $validatedData['provinsi_siswa'],
            'alamat_kabupaten' => $validatedData['kabupaten_siswa'],
            'alamat_kecamatan' => $validatedData['kecamatan_siswa'],
            'alamat_desa' => $validatedData['desa_kelurahan_siswa'],
        ];


        $siswa->update($siswa_update);

        return response()->json([
            'status' => 'success',
            'message' => 'Alamat Siswa telah berhasil di-update!',
            'data' => $validatedData,
        ]);
    }

    public function send_riwayat_pendidikan_siswa(Request $request) {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // data sekolah
            'npsn_sekolah_asal' => 'required',
            'nama_sekolah_asal' => 'required',
            'jenis_sekolah_asal' => 'required',
            'alamat_sekolah_provinsi' => 'required',
            'alamat_sekolah_kabupaten' => 'required',
            'alamat_sekolah_kecamatan' => 'required',
            'alamat_sekolah_lengkap' => 'required',

            // no ujian dan prestasi
            // 'prestasi_yang_diraih' => 'string',
            // 'no_peserta_ujian' => 'string',
        ]);

        // Find the Siswa record to update
        $siswa = Siswa::find($request->input('siswa_id')); // Assuming you have a siswa_id in the form

        if (!$siswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'Siswa not found.',
            ], 404);
        }

        // Update the Siswa record
        $siswa_update = [
            'npsn_sekolah_asal' => $validatedData['npsn_sekolah_asal'],
            'nama_sekolah_asal' => $validatedData['nama_sekolah_asal'],
            'jenis_sekolah_asal' => $validatedData['jenis_sekolah_asal'],
            'alamat_sekolah_provinsi' => $validatedData['alamat_sekolah_provinsi'],
            'alamat_sekolah_kabupaten' => $validatedData['alamat_sekolah_kabupaten'],
            'alamat_sekolah_kecamatan' => $validatedData['alamat_sekolah_kecamatan'],
            'alamat_sekolah_lengkap' => $validatedData['alamat_sekolah_lengkap'],

            'prestasi_yang_diraih' => $request->input('prestasi_yang_diraih'),
            'no_peserta_ujian' => $request->input('no_peserta_ujian'),
            // 'prestasi_yang_diraih' => $validatedData['prestasi_yang_diraih'],
            // 'no_peserta_ujian' => $validatedData['no_peserta_ujian'],

        ];


        $siswa->update($siswa_update);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Riwayat Pendidikan telah berhasil di-update!',
            'data' => $validatedData,
        ]);



    }

    public function send_ortu_siswa(Request $request)
    {
        $validatedData = $request->validate([
            // validasi data ayah
           'nama_ayah' => 'required',
           'tempat_lahir_ayah' =>'required',
           'tanggal_lahir_ayah' => 'required',
           'hubungan_dengan_siswa_ayah' => 'required',
           'pendidikan_ayah' => 'required',
           'pekerjaan_ayah' => 'required',
           'penghasilan_ayah' => 'required',

            // validasi data ibu

            'nama_ibu'  => 'required',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'hubungan_dengan_siswa_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required'



        ]);


        // Find the Siswa record to update
        $siswa = Siswa::find($request->input('siswa_id')); // Assuming you have a siswa_id in the form


          // Update the Siswa record
        $siswa_update = [
            // update data ayah
            'nama_ayah' => $validatedData['nama_ayah'],
            'tempat_lahir_ayah' => $validatedData['tempat_lahir_ayah'],
            'tanggal_lahir_ayah' => $validatedData['tanggal_lahir_ayah'],
            'hubungan_dengan_siswa_ayah' => $validatedData['hubungan_dengan_siswa_ayah'],
            'pendidikan_ayah' => $validatedData['pendidikan_ayah'],
            'pekerjaan_ayah' => $validatedData['pekerjaan_ayah'],
            'penghasilan_ayah' => $validatedData['penghasilan_ayah'],

            // update data ibu
            'nama_ibu' => $validatedData['nama_ibu'],
            'tempat_lahir_ibu' => $validatedData['tempat_lahir_ibu'],
            'tanggal_lahir_ibu' => $validatedData['tanggal_lahir_ibu'],
            'hubungan_dengan_siswa_ibu' => $validatedData['hubungan_dengan_siswa_ibu'],
            'pendidikan_ibu' => $validatedData['pendidikan_ibu'],
            'pekerjaan_ibu' => $validatedData['pekerjaan_ibu'],
            'penghasilan_ibu' => $validatedData['penghasilan_ibu'],

        ];


        $siswa->update($siswa_update);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Orangtua Telah Berhasil di-update!',
            'data' => $validatedData,
        ]);




    }

    public function send_wali_siswa(Request $request){

         $validatedData = $request->validate([
            // validasi data ayah
           'nama_wali' => 'string',
           'tempat_lahir_wali' =>'string',
           'tanggal_lahir_wali' => 'string',

           'pendidikan_wali' => 'string',
           'pekerjaan_wali' => 'string',
           'penghasilan_wali' => 'string',





        ]);


        // Find the Siswa record to update
        $siswa = Siswa::find($request->input('siswa_id')); // Assuming you have a siswa_id in the form


          // Update the Siswa record
        $siswa_update = [
            // update data ayah
            'nama_wali' => $validatedData['nama_wali'],
            'tempat_lahir_wali' => $validatedData['tempat_lahir_wali'],
            'tanggal_lahir_wali' => $validatedData['tanggal_lahir_wali'],

            'pendidikan_wali' => $validatedData['pendidikan_wali'],
            'pekerjaan_wali' => $validatedData['pekerjaan_wali'],
            'penghasilan_wali' => $validatedData['penghasilan_wali'],



        ];


        $siswa->update($siswa_update);

        return response()->json([
            'status' => 'success',
            'message' => 'Wali Siswa Telah Berhasil di update!',
            'data' => $validatedData,
        ]);




    }

    // digunakan untuk kirim hasil form json

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
