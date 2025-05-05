<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Provinsi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportSiswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data_siswa.index');
    }

    /**
     * Get data for DataTables.
     */
    public function get_siswa()
    {
        $siswa = Siswa::select([
            'foto_siswa',
            'id',
            'nama_siswa',
            'tempat_lahir',
            'tanggal_lahir',
            'nama_sekolah_asal',
            'tahun_daftar',
            'status_selesai',
            'status_validasi'
        ]);

        return DataTables::of($siswa)
            ->addIndexColumn()
            ->addColumn('tempat_tanggal_lahir', function ($row) {
                return $row->tempat_lahir . ', ' . $row->tanggal_lahir;
            })
            ->addColumn('foto', function ($row) {
                if ($row->foto_siswa == '') {
                    $image = asset('asset/user.png');
                } else {
                    $image = asset('uploads/foto_siswa/' . $row->foto_siswa);
                }
                ;


                return '<img src="' .
                    $image . '" alt="Foto Siswa" style="width: 50px; height: 50px; border-radius: 50%;">';
            })

            ->addColumn('status', function ($row) {
                $statusValidasi = $row->status_validasi == 'Belum Validasi'
                    ? '<i class="fa fa-circle-o text-warning mr-2"></i> Belum Validasi'
                    : '<i class="fa fa-circle-o text-success mr-2"></i> Sudah Validasi';

                $statusSelesai = $row->status_selesai == 'Belum Selesai'
                    ? '<i class="fa fa-circle-o text-warning mr-2"></i> Belum Selesai'
                    : '<i class="fa fa-circle-o text-success mr-2"></i> Sudah Selesai';

                return $statusValidasi . '<br>' . $statusSelesai;
            })
            ->addColumn('action', function ($row) {
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
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                </form>';
            })
            ->rawColumns(['foto', 'status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_siswa.tambah_akun_siswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
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

            Siswa::create([
                'nama_siswa' => $validatedData['nama_siswa'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Akun siswa berhasil ditambahkan.',
            // ]);

            return redirect(route('data_siswa'));
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('data_siswa.edit_detail_siswa', compact('siswa', 'provinsi'));
    }

    /**
     * Change password for the specified resource.
     */
    public function changePassword(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'new_password' => 'required|min:8|confirmed',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('siswas', 'email')->ignore($request->input('siswa_id')),
                ],
                [
                    'email.required' => 'Email harus diisi.',
                    'email.email' => 'Email tidak valid.',
                    'email.unique' => 'Email sudah digunakan.',
                    'new_password.required' => 'Password baru harus diisi.',
                    'new_password.min' => 'Password baru harus minimal 8 karakter.',
                    'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai.',




                ]
            ]);

            $siswa = Siswa::find($request->input('siswa_id'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            $siswa->update([
                'password' => Hash::make($validatedData['new_password']),
                'email' => $validatedData['email'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Informasi Akun telah diganti',
                'data' => $validatedData,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    public function ekspor_excel()
    {
        $tahun = Siswa::select('tahun_daftar')->distinct()->get();
        // dd($tahun);
        return view('data_siswa.ekspor', compact('tahun'));
    }

    public function ekspor_excel_tahun(Request $request)
    {
        return (new ExportSiswa)->forYear($request->tahun_daftar)->download('siswa.xlsx');
    }

    /**
     * Update kelas and domisili for the specified resource.
     */
    public function send_kelas_dom(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    'kelas_masuk' => 'required|string',
                    'status_domisili' => 'required|string',
                ],
                [
                    'kelas_masuk.required' => 'Kelas masuk harus diisi.',
                    'kelas_masuk.string' => 'Kelas masuk harus berupa teks.',
                    'status_domisili.required' => 'Status domisili harus diisi.',
                    'status_domisili.string' => 'Status domisili harus berupa teks.',
                ]
            );

            $siswa = Siswa::find($request->input('siswa_id'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            $siswa->update([
                'kelas' => $validatedData['kelas_masuk'],
                'domisili' => $validatedData['status_domisili'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Kelas dan Domisili Telah Berhasil di update!',
                'data' => $validatedData,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Update identitas siswa for the specified resource.
     */
    public function send_identitas_siswa(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    'nama_siswa' => 'required',
                    'nisn' => [
                        'required',
                        Rule::unique('siswas', 'nisn_siswa')->ignore($request->input('siswa_id')),
                    ],
                    'tempat_lahir' => 'required',
                    'tanggal_lahir_siswa' => 'required',
                    'jenis_kelamin' => 'required',
                    'status_anak' => 'required',
                    'agama_siswa' => 'required',
                    'no_hp' => 'required',
                    'golda' => 'required',
                    'penyakit_siswa' => 'required',
                ],
                [
                    'nama_siswa.required' => 'Nama siswa harus diisi.',
                    'nama_siswa.string' => 'Nama siswa harus berupa teks.',
                    'nama_siswa.max' => 'Nama siswa tidak boleh lebih dari 255 karakter.',
                    'nisn.required' => 'NISN harus diisi.',
                    'nisn.unique' => 'NISN sudah terdaftar.',
                    'tempat_lahir.required' => 'Tempat lahir harus diisi.',
                    'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
                    'tanggal_lahir_siswa.required' => 'Tanggal lahir harus diisi.',
                    'tanggal_lahir_siswa.date' => 'Tanggal lahir harus berformat tanggal yang benar.',
                    'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
                    'jenis_kelamin.string' => 'Jenis kelamin harus berupa teks.',
                    'status_anak.required' => 'Status anak harus diisi.',
                    'status_anak.string' => 'Status anak harus berupa teks.',
                    'agama_siswa.required' => 'Agama harus diisi.',
                    'agama_siswa.string' => 'Agama harus berupa teks.',
                    'no_hp.required' => 'Nomor HP harus diisi.',
                    'no_hp.string' => 'Nomor HP harus berupa teks.',
                    'golda.required' => 'Golongan darah harus diisi.',
                    'golda.string' => 'Golongan darah harus berupa teks.',
                    'penyakit_siswa.required' => 'Penyakit harus diisi.',
                    'penyakit_siswa.string' => 'Penyakit harus berupa teks.',
                ]

            );

            $siswa = Siswa::find($request->input('siswa_id'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            $siswa->update([
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
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Identitas Siswa telah berhasil di update!',
                'data' => $validatedData,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Update alamat siswa for the specified resource.
     */
    public function send_alamat_siswa(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    'provinsi_siswa' => 'required|string',
                    'kabupaten_siswa' => 'required|string',
                    'kecamatan_siswa' => 'required|string',
                    'desa_kelurahan_siswa' => 'required|string',
                ],
                [
                    'provinsi_siswa.required' => 'Provinsi harus diisi.',
                    'provinsi_siswa.string' => 'Provinsi harus berupa teks.',
                    'kabupaten_siswa.required' => 'Kabupaten harus diisi.',
                    'kabupaten_siswa.string' => 'Kabupaten harus berupa teks.',
                    'kecamatan_siswa.required' => 'Kecamatan harus diisi.',
                    'kecamatan_siswa.string' => 'Kecamatan harus berupa teks.',
                    'desa_kelurahan_siswa.required' => 'Desa/Kelurahan harus diisi.',
                    'desa_kelurahan_siswa.string' => 'Desa/Kelurahan harus berupa teks.',
                ]

            );

            $siswa = Siswa::find($request->input('siswa_id'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            $siswa->update([
                'alamat_provinsi' => $validatedData['provinsi_siswa'],
                'alamat_kabupaten' => $validatedData['kabupaten_siswa'],
                'alamat_kecamatan' => $validatedData['kecamatan_siswa'],
                'alamat_desa' => $validatedData['desa_kelurahan_siswa'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Alamat Siswa telah berhasil di-update!',
                'data' => $validatedData,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Update riwayat pendidikan siswa for the specified resource.
     */
    public function send_riwayat_pendidikan_siswa(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'npsn_sekolah_asal' => 'required|string',
                'nama_sekolah_asal' => 'required|string',
                'jenis_sekolah_asal' => 'required|string',
                'alamat_sekolah_provinsi' => 'required|string',
                'alamat_sekolah_kabupaten' => 'required|string',
                'alamat_sekolah_kecamatan' => 'required|string',
                'alamat_sekolah_lengkap' => 'required|string',
            ], [
                'npsn_sekolah_asal.required' => 'NPSN sekolah asal harus diisi.',
                'npsn_sekolah_asal.string' => 'NPSN sekolah asal harus berupa teks.',
                'nama_sekolah_asal.required' => 'Nama sekolah asal harus diisi.',
                'nama_sekolah_asal.string' => 'Nama sekolah asal harus berupa teks.',
                'jenis_sekolah_asal.required' => 'Jenis sekolah asal harus diisi.',
                'jenis_sekolah_asal.string' => 'Jenis sekolah asal harus berupa teks.',
                'alamat_sekolah_provinsi.required' => 'Alamat sekolah provinsi harus diisi.',
                'alamat_sekolah_provinsi.string' => 'Alamat sekolah provinsi harus berupa teks.',
                'alamat_sekolah_kabupaten.required' => 'Alamat sekolah kabupaten harus diisi.',
                'alamat_sekolah_kabupaten.string' => 'Alamat sekolah kabupaten harus berupa teks.',
                'alamat_sekolah_kecamatan.required' => 'Alamat sekolah kecamatan harus diisi.',
                'alamat_sekolah_kecamatan.string' => 'Alamat sekolah kecamatan harus berupa teks.',
                'alamat_sekolah_lengkap.required' => 'Alamat sekolah lengkap harus diisi.',
                'alamat_sekolah_lengkap.string' => 'Alamat sekolah lengkap harus berupa teks.',
            ]);

            $siswa = Siswa::find($request->input('siswa_id'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            $siswa->update(
                [
                    'npsn_sekolah_asal' => $validatedData['npsn_sekolah_asal'],
                    'nama_sekolah_asal' => $validatedData['nama_sekolah_asal'],
                    'jenis_sekolah_asal' => $validatedData['jenis_sekolah_asal'],
                    'alamat_sekolah_provinsi' => $validatedData['alamat_sekolah_provinsi'],
                    'alamat_sekolah_kabupaten' => $validatedData['alamat_sekolah_kabupaten'],
                    'alamat_sekolah_kecamatan' => $validatedData['alamat_sekolah_kecamatan'],
                    'alamat_sekolah_lengkap' => $validatedData['alamat_sekolah_lengkap'],
                    'prestasi_yang_diraih' => $request->input('prestasi_yang_diraih'),
                    'no_peserta_ujian' => $request->input('no_peserta_ujian'),
                ]

            );

            return response()->json([
                'status' => 'success',
                'message' => 'Data Riwayat Pendidikan telah berhasil di-update!',
                'data' => $validatedData,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Update data orang tua siswa for the specified resource.
     */
    public function send_ortu_siswa(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_ayah' => 'required|string',
                'tempat_lahir_ayah' => 'required|string',
                'tanggal_lahir_ayah' => 'required|date',
                'hubungan_dengan_siswa_ayah' => 'required|string',
                'pendidikan_ayah' => 'required|string',
                'pekerjaan_ayah' => 'required|string',
                'penghasilan_ayah' => 'required|string',
                'nama_ibu' => 'required|string',
                'tempat_lahir_ibu' => 'required|string',
                'tanggal_lahir_ibu' => 'required|date',
                'hubungan_dengan_siswa_ibu' => 'required|string',
                'pendidikan_ibu' => 'required|string',
                'pekerjaan_ibu' => 'required|string',
                'penghasilan_ibu' => 'required|string',
            ], [
                'nama_ayah.required' => 'Nama ayah harus diisi.',
                'nama_ayah.string' => 'Nama ayah harus berupa teks.',
                'tempat_lahir_ayah.required' => 'Tempat lahir ayah harus diisi.',
                'tempat_lahir_ayah.string' => 'Tempat lahir ayah harus berupa teks.',
                'tanggal_lahir_ayah.required' => 'Tanggal lahir ayah harus diisi.',
                'tanggal_lahir_ayah.date' => 'Tanggal lahir ayah harus berformat tanggal yang benar.',
                'hubungan_dengan_siswa_ayah.required' => 'Hubungan dengan siswa ayah harus diisi.',
                'hubungan_dengan_siswa_ayah.string' => 'Hubungan dengan siswa ayah harus berupa teks.',
                'pendidikan_ayah.required' => 'Pendidikan ayah harus diisi.',
                'pendidikan_ayah.string' => 'Pendidikan ayah harus berupa teks.',
                'pekerjaan_ayah.required' => 'Pekerjaan ayah harus diisi.',
                'pekerjaan_ayah.string' => 'Pekerjaan ayah harus berupa teks.',
                'penghasilan_ayah.required' => 'Penghasilan ayah harus diisi.',
                'penghasilan_ayah.string' => 'Penghasilan ayah harus berupa teks.',
                'nama_ibu.required' => 'Nama ibu harus diisi.',
                'nama_ibu.string' => 'Nama ibu harus berupa teks.',
                'tempat_lahir_ibu.required' => 'Tempat lahir ibu harus diisi.',
                'tempat_lahir_ibu.string' => 'Tempat lahir ibu harus berupa teks.',
                'tanggal_lahir_ibu.required' => 'Tanggal lahir ibu harus diisi.',
                'tanggal_lahir_ibu.date' => 'Tanggal lahir ibu harus berformat tanggal yang benar.',
                'hubungan_dengan_siswa_ibu.required' => 'Hubungan dengan siswa ibu harus diisi.',
                'hubungan_dengan_siswa_ibu.string' => 'Hubungan dengan siswa ibu harus berupa teks.',
                'pendidikan_ibu.required' => 'Pendidikan ibu harus diisi.',
                'pendidikan_ibu.string' => 'Pendidikan ibu harus berupa teks.',
                'pekerjaan_ibu.required' => 'Pekerjaan ibu harus diisi.',
                'pekerjaan_ibu.string' => 'Pekerjaan ibu harus berupa teks.',
                'penghasilan_ibu.required' => 'Penghasilan ibu harus diisi.',
                'penghasilan_ibu.string' => 'Penghasilan ibu harus berupa teks.',
            ]);

            $siswa = Siswa::find($request->input('siswa_id'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            $siswa->update([
                'nama_ayah' => $validatedData['nama_ayah'],
                'tempat_lahir_ayah' => $validatedData['tempat_lahir_ayah'],
                'tanggal_lahir_ayah' => $validatedData['tanggal_lahir_ayah'],
                'hubungan_dengan_siswa_ayah' => $validatedData['hubungan_dengan_siswa_ayah'],
                'pendidikan_ayah' => $validatedData['pendidikan_ayah'],
                'pekerjaan_ayah' => $validatedData['pekerjaan_ayah'],
                'penghasilan_ayah' => $validatedData['penghasilan_ayah'],
                'nama_ibu' => $validatedData['nama_ibu'],
                'tempat_lahir_ibu' => $validatedData['tempat_lahir_ibu'],
                'tanggal_lahir_ibu' => $validatedData['tanggal_lahir_ibu'],
                'hubungan_dengan_siswa_ibu' => $validatedData['hubungan_dengan_siswa_ibu'],
                'pendidikan_ibu' => $validatedData['pendidikan_ibu'],
                'pekerjaan_ibu' => $validatedData['pekerjaan_ibu'],
                'penghasilan_ibu' => $validatedData['penghasilan_ibu'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Orangtua Telah Berhasil di-update!',
                'data' => $validatedData,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Update data wali siswa for the specified resource.
     */
    public function send_wali_siswa(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_wali' => 'nullable|string',
                'tempat_lahir_wali' => 'nullable|string',
                'tanggal_lahir_wali' => 'nullable|date',
                'pendidikan_wali' => 'nullable|string',
                'pekerjaan_wali' => 'nullable|string',
                'penghasilan_wali' => 'nullable|string',
            ], [
                'nama_wali.string' => 'Nama wali harus berupa teks.',
                'tempat_lahir_wali.string' => 'Tempat lahir wali harus berupa teks.',
                'tanggal_lahir_wali.date' => 'Tanggal lahir wali harus berformat tanggal yang benar.',
                'pendidikan_wali.string' => 'Pendidikan wali harus berupa teks.',
                'pekerjaan_wali.string' => 'Pekerjaan wali harus berupa teks.',
                'penghasilan_wali.string' => 'Penghasilan wali harus berupa teks.',
            ]);

            $siswa = Siswa::find($request->input('siswa_id'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            $siswa->update([
                'nama_wali' => $validatedData['nama_wali'],
                'tempat_lahir_wali' => $validatedData['tempat_lahir_wali'],
                'tanggal_lahir_wali' => $validatedData['tanggal_lahir_wali'],
                'pendidikan_wali' => $validatedData['pendidikan_wali'],
                'pekerjaan_wali' => $validatedData['pekerjaan_wali'],
                'penghasilan_wali' => $validatedData['penghasilan_wali'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Wali Siswa Telah Berhasil di update!',
                'data' => $validatedData,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Upload foto siswa.
     */
    public function upload_foto(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'upload_foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'upload_foto.image' => 'File yang diunggah harus berupa gambar.',
                'upload_foto.mimes' => 'File yang diunggah harus berformat JPG, JPEG, atau PNG.',
                'upload_foto.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            ]);


            $siswa = Siswa::find($request->input('id_siswa'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            if ($request->hasFile('upload_foto')) {
                $file = $request->file('upload_foto');

                if ($siswa->foto_siswa) {
                    $oldPhotoPath = public_path('uploads/foto_siswa/' . $siswa->foto_siswa);
                    if (file_exists($oldPhotoPath)) {
                        unlink($oldPhotoPath);
                    }
                }

                $filename = time() . '_' . $file->getClientOriginalName();
                $path = public_path('uploads/foto_siswa');
                $file->move($path, $filename);

                $siswa->foto_siswa = $filename;
                $siswa->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Siswa data updated successfully',
                'data' => $siswa,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Upload kartu keluarga.
     */
    public function upload_kk(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'upload_kk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'upload_kk.image' => 'File yang diunggah harus berupa gambar.',
                'upload_kk.mimes' => 'File yang diunggah harus berformat JPG, JPEG, atau PNG.',
                'upload_kk.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            ]);

            $siswa = Siswa::find($request->input('id_siswa'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            if ($request->hasFile('upload_kk')) {
                $file = $request->file('upload_kk');

                if ($siswa->kartu_keluarga) {
                    $oldPhotoPath = public_path('uploads/kartu_keluarga/' . $siswa->kartu_keluarga);
                    if (file_exists($oldPhotoPath)) {
                        unlink($oldPhotoPath);
                    }
                }

                $filename = time() . '_' . $file->getClientOriginalName();
                $path = public_path('uploads/kartu_keluarga');
                $file->move($path, $filename);

                $siswa->kartu_keluarga = $filename;
                $siswa->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Siswa data updated successfully',
                'data' => $siswa,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Upload ijazah.
     */
    public function upload_ijazah(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'upload_ijazah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'upload_ijazah.image' => 'File yang diunggah harus berupa gambar.',
                'upload_ijazah.mimes' => 'File yang diunggah harus berformat JPG, JPEG, atau PNG.',
                'upload_ijazah.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            ]);

            $siswa = Siswa::find($request->input('id_siswa'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            if ($request->hasFile('upload_ijazah')) {
                $file = $request->file('upload_ijazah');

                if ($siswa->ijazah_sd_mi) {
                    $oldPhotoPath = public_path('uploads/ijazah/' . $siswa->ijazah_sd_mi);
                    if (file_exists($oldPhotoPath)) {
                        unlink($oldPhotoPath);
                    }
                }

                $filename = time() . '_' . $file->getClientOriginalName();
                $path = public_path('uploads/ijazah');
                $file->move($path, $filename);

                $siswa->ijazah_sd_mi = $filename;
                $siswa->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Siswa data updated successfully',
                'data' => $siswa,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    /**
     * Upload KTP.
     */
    public function upload_ktp(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'upload_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'upload_ktp.image' => 'File yang diunggah harus berupa gambar.',
                'upload_ktp.mimes' => 'File yang diunggah harus berformat JPG, JPEG, atau PNG.',
                'upload_ktp.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            ]);

            $siswa = Siswa::find($request->input('id_siswa'));

            if (!$siswa) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Siswa not found.',
                ], 404);
            }

            if ($request->hasFile('upload_ktp')) {
                $file = $request->file('upload_ktp');

                if ($siswa->ktp_orang_tua) {
                    $oldPhotoPath = public_path('uploads/ktp/' . $siswa->ktp_orang_tua);
                    if (file_exists($oldPhotoPath)) {
                        unlink($oldPhotoPath);
                    }
                }

                $filename = time() . '_' . $file->getClientOriginalName();
                $path = public_path('uploads/ktp');
                $file->move($path, $filename);

                $siswa->ktp_orang_tua = $filename;
                $siswa->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Siswa data updated successfully',
                'data' => $siswa,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    public function send_status_daftar(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'status_selesai' => 'required|string',
            'status_validasi' => 'required|string',
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
            'status_selesai' => $validatedData['status_selesai'],
            'status_validasi' => $validatedData['status_validasi'],

        ];


        $siswa->update($siswa_update);

        return response()->json([
            'status' => 'success',
            'message' => 'Status Sudah Berubah',
            'data' => $validatedData,
        ]);
    }



    public function generate_pdf_siswa(string $id)
    {
        //load data siswa berdasarkan user login
        $siswa = Siswa::select('siswas.*')
            ->leftJoin('indonesia_provinces as ip', 'siswas.alamat_provinsi', '=', 'ip.code')
            ->leftJoin('indonesia_cities as ic', 'siswas.alamat_kabupaten', '=', 'ic.code')
            ->leftJoin('indonesia_districts as idt', 'siswas.alamat_kecamatan', '=', 'idt.code')
            ->leftJoin('indonesia_villages as iv', 'siswas.alamat_desa', '=', 'iv.code')
            ->addSelect([
                'ip.name as nama_provinsi',
                'ic.name as nama_kabupaten',
                'idt.name as nama_kecamatan',
                'iv.name as nama_desa'
            ])
            ->where('siswas.id', $id)
            ->first();
        // cek sudah selesai isi belum
        $data = [
            'title' => 'Formulir SPMB SMPP Al-Qodiri Jember',
            'siswa' => $siswa

        ];
        $pdf = PDF::loadView('pdf.form_siswa', $data);
        return $pdf->download('form_data_siswa' . $data['siswa']->nama_siswa . '.pdf');
        // dd($siswa);
        // return view('siswa.dashboard', compact('siswa'));




    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect(route('data_siswa'));
        // return response()->json(['success' => 'Siswa deleted successfully.']);
    }
}
