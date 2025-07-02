@extends('layouts.pasien')

@section('title', 'Detail Dokter')

@section('content')
<div class="bg-gradient-to-b from-white to-teal-50 min-h-screen py-12 px-6 md:px-20 max-w-6xl mx-auto">

  {{-- Header Dokter --}}
  <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-10">
    <div class="w-32 h-32 rounded-full shadow-xl overflow-hidden ring-4 ring-white">
      @if($dokter->foto)
        <img src="{{ asset('storage/dokter_foto/' . $dokter->foto) }}" alt="Foto Dokter" class="w-full h-full object-cover">
      @else
        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">Foto</div>
      @endif
    </div>
    <div class="text-center md:text-left">
      <h2 class="text-3xl font-bold text-gray-800">dr. {{ $dokter->name }}</h2>
      <p class="text-lg text-teal-600 mt-1 font-medium">Spesialis {{ $dokter->spesialis }}</p>
    </div>
  </div>

{{-- === Profil Dokter (responsive) === --}}
<div x-data="{ open:false }" class="bg-white rounded-2xl shadow-md mb-10">

    {{-- Header --}}
    <div class="flex items-start justify-between p-6"
         @click.stop="if (window.innerWidth < 768) open = !open">

        <h3 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
            🩺 Profil Dokter
        </h3>

        {{-- Tombol + / –  (mobile saja) --}}
        <button
            class="md:hidden w-8 h-8 flex items-center justify-center rounded-full
                   hover:bg-teal-50 active:bg-teal-100"
            @click.stop="open = !open" aria-label="Toggle profil">
            <svg x-show="!open" class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
            </svg>
            <svg x-show="open" class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5"/>
            </svg>
        </button>
    </div>

    {{-- Excerpt – tampil saat tertutup --}}
    <p x-show="!open"
       class="px-6 pb-6 text-gray-700 leading-relaxed text-justify">
        {{ Str::limit($dokter->deskripsi, 200) }}
    </p>

    {{-- Deskripsi penuh – tampil saat open --}}
    <div x-show="open" x-collapse
         class="px-6 pb-6 text-gray-700 leading-relaxed text-justify">
        {!! nl2br(e($dokter->deskripsi)) !!}
    </div>

    {{-- Link desktop --}}
    @if(Str::length($dokter->deskripsi) > 200)
        <div class="hidden md:block px-6 pb-6">
            <button class="text-teal-600 hover:underline text-sm font-medium"
                    @click="open = !open"
                    x-text="open ? 'Tutup' : 'Baca Selengkapnya'">
            </button>
        </div>
    @endif
</div>




  {{-- Informasi Singkat --}}
  <div class="grid md:grid-cols-3 gap-6 mb-10">
    @php
        $info = [
            ['icon' => '👤', 'label' => 'Jenis Kelamin', 'value' => $dokter->gender],
            ['icon' => '🎓', 'label' => 'Pendidikan', 'value' => $dokter->pendidikan],
            ['icon' => '📞', 'label' => 'Telepon', 'value' => $dokter->no_hp],
            ['icon' => '📍', 'label' => 'Klinik', 'value' => $dokter->alamat_klinik],
            ['icon' => '🧾', 'label' => 'No Lisensi', 'value' => $dokter->no_lisensi],
            ['icon' => '🧰', 'label' => 'Pengalaman', 'value' => $dokter->pengalaman . ' tahun'],
        ];
    @endphp

    @foreach ($info as $i)
    <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
        <p class="text-sm text-gray-500 mb-1">{{ $i['icon'] }} <strong>{{ $i['label'] }}</strong></p>
        <p class="text-gray-800 font-medium">{{ $i['value'] }}</p>
    </div>
    @endforeach
  </div>

  {{-- Jadwal Praktik --}}
  <div class="bg-white p-6 rounded-2xl shadow-md mb-10">
    <h3 class="text-xl font-semibold mb-4 text-gray-800">🗓️ Jadwal Praktik</h3>
    @php
      $jadwal = json_decode($dokter->jadwal_praktek ?? '[]', true);
    @endphp

    @if($jadwal)
      <div class="grid md:grid-cols-2 gap-4">
        @foreach($jadwal as $j)
          <div class="bg-teal-50 border border-teal-200 rounded-lg p-4">
            <p class="font-semibold text-gray-800">{{ ucfirst($j['hari']) }}</p>
            <p class="text-sm text-teal-700">Jam: {{ $j['jam_mulai'] }} - {{ $j['jam_selesai'] }}</p>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-gray-500">Belum ada jadwal praktik.</p>
    @endif
  </div>

  {{-- Tombol Booking --}}
    <div class="flex justify-end mt-8">
      <a href="{{ route('booking.form', $dokter->id) }}"
      class="fixed bottom-4 right-4 z-50 bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-full shadow-lg text-sm md:text-base font-medium transition">
      Booking Sekarang
    </a>
  </div>
</div>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
