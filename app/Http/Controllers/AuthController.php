<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {


        // Cek apakah pengguna sudah login
        if (Auth::guard('siswa')->check()) {
            return redirect()->route('dashboard_siswa');
        } elseif (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     // dd($credentials);
    //     if (Auth::guard('siswa')->attempt($credentials)) {
    //         return redirect()->intended('/form_siswa');
    //     } elseif (Auth::guard('admin')->attempt($credentials)) {
    //         return redirect()->intended('/admin/dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email atau password salah.',
    //     ]);
    // }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('siswa')->attempt($credentials)) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('dashboard_siswa')
            ]);
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('dashboard')
                // 'redirect_url' => '/dashboard'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau password salah.'
        ], 401);
    }
    // public function register_student()
    // {
    //     return view("auth.register");
    // }



    public function register_student_process(Request $request)
    {
        // Validasi data yang diterima
        $request->validate(
            [
                'nama_siswa' => 'required|string|max:255',
                'email' => 'required|email|unique:siswas,email|unique:admins,email',
                'password' => 'required|string|min:8|confirmed', // Pastikan password dan repeat password sama
            ],

            [
                'email.unique' => 'Email yang anda masukkan sudah terdaftar', // Pesan kustom untuk email yang tidak unik
            ]
        );



        // Membuat siswa baru
        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Enkripsi password
        ]);

        // Mengembalikan respons sukses
        return response()->json(['success' => true, 'message' => 'Pendaftaran berhasil!']);
    }


    // email check

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $exists = Siswa::where('email', $request->email)->exists();

        return response()->json(['exists' => $exists]);
    }


    public function logout(Request $request)
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth'); // Redirect ke halaman login setelah logout
    }
}
