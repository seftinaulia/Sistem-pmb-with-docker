<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
     /** Halaman daftar semua prodi. */
    public function index()
    {
        $prodis = Prodi::all();
        return view('prodi.index', compact('prodis'));
    }

    /** Halaman detail satu prodi. */
    public function show(string $slug)
    {
        $prodi = Prodi::find($slug);
        abort_unless($prodi, 404);

        return view('prodi.show', compact('prodi'));
    }
}
