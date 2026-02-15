<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ProfileUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('warning')) {
                Alert::warning(session('warning'));
            }
            return $next($request);
        });
    }

    //data user
    public function datauser()
    {
        $dataUser = User::all();
        $kode = ProfileUser::id();
        return view('user.data-user-admin', compact('dataUser', 'kode'));
    }

    public function showLoginForm()
    {
        return view('auth.login'); // sesuaikan dengan lokasi blade kamu
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // arahkan ke halaman setelah login
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // sesuaikan dengan file kamu
    }

    public function insertRegis(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
            'role' => 'Calon Mahasiswa',
        ]);

        // Jika ada kolom lain di tabel profile_users, sesuaikan dengan kebutuhan
        ProfileUser::create([
            'user_id' => $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'foto' => null,
            'tempat_lahir' => null,
            'tanggal_lahir' => null,
            'gender' => null,
            'no_hp' => null,
            'alamat' => null,
            'instagram' => null,
            'whatsapp' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
