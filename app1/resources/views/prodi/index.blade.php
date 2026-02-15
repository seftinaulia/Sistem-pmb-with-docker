@extends('layouts.app')

@section('title', 'Daftar Program Studi')

@section('content')
<h1 class="text-2xl font-bold mb-4">Program Studi</h1>

<div class="grid md:grid-cols-2 gap-6">
@foreach ($prodis as $p)
    <a href="{{ route('prodi.show', $p['slug']) }}"
       class="block border rounded-xl overflow-hidden shadow hover:shadow-lg transition">
        <img src="{{ asset($p['gambar']) }}" alt="{{ $p['nama'] }}" class="w-full h-48 object-cover">
        <div class="p-4">
            <h2 class="text-lg font-semibold">{{ $p['nama'] }}</h2>
            <p class="text-sm text-gray-600 line-clamp-3">{{ $p['deskripsi'] }}</p>
        </div>
    </a>
@endforeach
</div>
@endsection
