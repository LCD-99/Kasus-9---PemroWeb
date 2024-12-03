<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Memeriksa apakah user ditemukan dan passwordnya sesuai
        if ($user && Hash::check($request->password, $user->password)) {
            // Jika login berhasil, set session dan redirect ke dashboard
            Auth::login($user);
            
            // Redirect sesuai role pengguna
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'manager') {
                return redirect()->route('manager.dashboard');
            } else {
                return redirect()->route('staff.dashboard');
            }
        } else {
            // Jika gagal, kembali ke halaman login dengan pesan error
            return back()->withErrors(['email' => 'Email atau password salah']);
        }
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}