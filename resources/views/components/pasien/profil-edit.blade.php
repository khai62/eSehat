@extends('layouts.pasien')

@section('title', 'Edit Profil')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-white via-blue-50 to-teal-50 px-6 py-12 flex justify-center items-start">
    <div class="w-full max-w-4xl space-y-10">

        <!-- Header Card -->
        <div class="bg-white border border-blue-100 rounded-3xl shadow-xl p-8 flex items-center gap-6">
            @if($user->foto)
                <img src="{{ Storage::disk('public')->url($user->foto) }}" alt="Foto {{ $user->foto }}" class="w-24 h-24 rounded-full object-cover ring-4 ring-teal-300 shadow-md" />
            @else
                <div class="w-24 h-24 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center text-3xl font-bold ring-4 ring-teal-200">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif

            <div>
                <h1 class="text-2xl md:text-3xl font-semibold text-blue-800">Selamat datang, {{ $user->name }}</h1>
                <p class="text-sm text-gray-600 mt-1">Pastikan informasi Anda akurat demi pelayanan medis terbaik.</p>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white border border-blue-100 rounded-3xl shadow-lg p-10">
            @if(session('status'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('pasien.profil.update') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-blue-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name',$user->name) }}" class="w-full bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 text-blue-800 focus:outline-none focus:ring-2 focus:ring-teal-300">
                    </div>

                    <!-- Kota -->
                    <div>
                        <label class="block text-sm font-medium text-blue-700 mb-1">Kota / Kabupaten</label>
                        <input type="text" name="city" value="{{ old('city',$user->city) }}" class="w-full bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 text-blue-800 focus:outline-none focus:ring-2 focus:ring-teal-300">
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block text-sm font-medium text-blue-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="birthdate" value="{{ old('birthdate',$user->birthdate) }}" class="w-full bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 text-blue-800 focus:outline-none focus:ring-2 focus:ring-teal-300">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-medium text-blue-700 mb-1">Jenis Kelamin</label>
                        <select name="gender" class="w-full bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 text-blue-800 focus:outline-none focus:ring-2 focus:ring-teal-300">
                            <option value="">Pilih</option>
                            <option value="Laki-laki" @selected(old('gender',$user->gender)=='Laki-laki')>Laki-laki</option>
                            <option value="Perempuan" @selected(old('gender',$user->gender)=='Perempuan')>Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- Upload Foto -->
                <div>
                    <label class="block text-sm font-medium text-blue-700 mb-1">Foto Profil</label>
                    <input type="file" name="foto" accept="image/*" class="w-full file:bg-teal-100 file:border-0 file:text-teal-800 file:rounded-lg file:px-4 file:py-2 hover:file:bg-teal-200 transition text-sm">
                    @if($user->foto)
                        <p class="mt-3 text-sm text-gray-600">Foto saat ini:</p>
            
                        <img src="{{ Storage::disk('public')->url($user->foto) }}" alt="Foto {{ $user->foto }}"  class="h-24 mt-2 rounded-lg border border-blue-100 shadow-sm" />
                    @endif
                </div>

                <!-- Tombol -->
                <div class="flex justify-end">
                    <button class="bg-teal-500 hover:bg-teal-600 transition px-6 py-3 rounded-lg font-medium shadow text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-400">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
