@extends('layouts.pasien')

@section('title', 'Profil Pasien')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12 flex flex-col md:flex-row gap-8">

    {{-- Sidebar Pasien --}}
    <aside class="w-full md:w-1/4">
        @include('components.pasien.sidebar')
    </aside>

    {{-- Konten Profil --}}
    <section class="w-full md:w-3/4 space-y-8">

        {{-- Header Profil --}}
        <div class="bg-gradient-to-br from-teal-400 to-sky-500 text-white rounded-3xl p-6 shadow-md">
            <h2 class="text-2xl md:text-3xl font-bold mb-1">Profil Saya</h2>
            <p class="text-sm opacity-90">Informasi lengkap akun Anda sebagai pasien.</p>
        </div>

        {{-- Kartu Profil Pengguna --}}
        <div class="bg-white shadow-md rounded-3xl p-6 flex flex-col md:flex-row items-center justify-between gap-6 border border-teal-50">

            <div class="flex items-center gap-4">
                {{-- Foto --}}
                @if(Auth::user()?->foto)
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="w-20 h-20 rounded-full object-cover ring-2 ring-teal-300 shadow-sm" alt="Foto Profil">
                @else
                    <div class="w-20 h-20 bg-teal-100 text-teal-700 rounded-full flex items-center justify-center text-2xl font-semibold shadow-sm">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif

                {{-- Info Nama --}}
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                </div>
            </div>

            {{-- Tombol Edit --}}
            <div>
                <a href="{{ route('pasien.profil.edit') }}"
                   class="bg-teal-500 hover:bg-teal-600 text-white px-5 py-2 rounded-full text-sm font-medium shadow transition">
                   Edit Profil
                </a>
            </div>
        </div>

        {{-- Detail Tambahan --}}
        <div class="bg-white shadow-sm rounded-3xl p-6 space-y-4 border border-teal-50">
            <div class="flex justify-between items-center py-2 text-sm">
                <span class="text-gray-600 font-medium">Tanggal Lahir</span>
                <span>
                    @if(Auth::user()?->birthdate)
                        {{ \Carbon\Carbon::parse(Auth::user()->birthdate)->translatedFormat('d F Y') }}
                    @else
                        <span class="text-gray-400 italic">Belum diisi</span>
                    @endif
                </span>
            </div>

            <div class="flex justify-between items-center py-2 text-sm">
                <span class="text-gray-600 font-medium">Jenis Kelamin</span>
                <span>{{ Auth::user()->gender ?? '-' }}</span>
            </div>

            <div class="flex justify-between items-center py-2 text-sm">
                <span class="text-gray-600 font-medium">Kota/Kabupaten</span>
                <span>{{ Auth::user()->city ?? '-' }}</span>
            </div>
        </div>

    </section>
</div>
@endsection
