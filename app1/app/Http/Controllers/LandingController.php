<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (auth()->check()) {
            // Jika sudah login, arahkan ke dashboard
            return redirect()->route('dashboard');
        } else {
            // Jika belum login, tampilkan halaman landing
            return redirect()->route('login');
        }
    }
}
