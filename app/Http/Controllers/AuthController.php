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
            return redirect()->route('siswa.dashboard');
        } elseif (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd($credentials);
        if (Auth::guard('siswa')->attempt($credentials)) {
            return redirect()->intended('/form_siswa');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // public function register_student()
    // {
    //     return view("auth.register");
    // }
    public function register_student_process(Request $request)
    {

        // Validasi data yang diterima
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'email' => 'required|email|unique:siswas,email',
            'password' => 'required|string|min:8|confirmed', // Pastikan password dan repeat password sama
        ]);

        // Membuat siswa baru
        Siswa::create([
            'nama' => $request->nama_siswa,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
        ]);

        // Redirect ke halaman login atau dashboard setelah berhasil registrasi
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
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

        return redirect('/login'); // Redirect ke halaman login setelah logout
    }
}
