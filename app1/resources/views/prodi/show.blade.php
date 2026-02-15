@extends('layouts.app')

@section('title', $prodi['nama'])

@section('content')
<a href="{{ route('prodi.index') }}" class="text-blue-600 hover:underline">&larr; Kembali</a>

<h1 class="text-3xl font-bold mt-2 mb-4">{{ $prodi['nama'] }}</h1>

<img src="{{ asset($prodi['gambar']) }}" alt="{{ $prodi['nama'] }}"
     class="w-full max-w-3xl mx-auto rounded-xl shadow mb-6">

<p class="mb-4">{{ $prodi['deskripsi'] }}</p>

<ul class="mb-6">
    <li><strong>Kuota:</strong> {{ $prodi['kuota'] }} mahasiswa</li>
    <li><strong>Fakultas:</strong> {{ $prodi['fakultas'] }}</li>
</ul>

{{-- Contoh tombol integrasi fitur lain, mis. daftar PMB --}}
<a href="{{ url('/pmb/daftar?prodi='.$prodi['slug']) }}"
   class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
   Daftar Sekarang
</a>
@endsection
