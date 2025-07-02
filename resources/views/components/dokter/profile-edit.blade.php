@extends('layouts.dokter')

@section('title', 'Edit Profil Dokter')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-4xl p-6 bg-white shadow-xl rounded-2xl border-l-8 border-teal-500">
        <h1 class="text-2xl font-bold text-teal-700 mb-6 flex items-center gap-2">
            🩺 Edit Profil Dokter
        </h1>

        {{-- Flash message --}}
        @if (session('status'))
            <div class="mb-4 text-green-700 bg-green-100 p-3 rounded border border-green-300">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('dokter.profile.update') }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700">Nomor HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                       class="mt-1 w-full border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                <select name="gender"
                        class="mt-1 w-full border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-md" required>
                    <option value="Laki-laki"  @selected(old('gender', $user->gender) === 'Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(old('gender', $user->gender) === 'Perempuan')>Perempuan</option>
                </select>
            </div>
            

            <div>
                <label class="block text-sm font-semibold text-gray-700">Spesialis</label>
                <input type="text" name="spesialis" value="{{ old('spesialis', $user->spesialis) }}"
                       class="mt-1 w-full border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">No Lisensi</label>
                <input type="text" name="no_lisensi" value="{{ old('no_lisensi', $user->no_lisensi) }}"
                       class="mt-1 w-full border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Pengalaman (tahun)</label>
                <input type="number" name="pengalaman" min="0" value="{{ old('pengalaman', $user->pengalaman) }}"
                       class="mt-1 w-full border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Pendidikan Terakhir</label>
                <input type="text" name="pendidikan" value="{{ old('pendidikan', $user->pendidikan) }}"
                       class="mt-1 w-full border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-md" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700">Alamat Klinik / Rumah Sakit</label>
                <input type="text" name="alamat_klinik" value="{{ old('alamat_klinik', $user->alamat_klinik) }}"
                       class="mt-1 w-full border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-md" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700">Deskripsi Profil</label>
                <textarea name="deskripsi" rows="4"
                          class="mt-1 w-full border-gray-300 focus:ring-teal-500 focus:border-teal-500 rounded-md"
                          required>{{ old('deskripsi', $user->deskripsi) }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700">Foto Profil (opsional)</label>
                <input type="file" name="foto" class="mt-1 w-full border-gray-300 rounded-md">
                @if($user->foto)
                    <p class="mt-3 text-sm text-gray-600">Foto saat ini:</p>
                    <img src="{{ Storage::disk('public')->url($user->foto) }}" alt="Foto {{ $user->name }}" class="h-24 rounded-lg mt-2 shadow-md" />
                @endif
            </div>

            <div class="md:col-span-2 flex justify-end">
                <button type="submit"
                        class="px-6 py-2 bg-teal-600 hover:bg-teal-700 text-white rounded-md shadow-md transition">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
