<div class="mt-5">

  {{-- Header --}}
  <div class="flex justify-between items-center mb-6 px-2">
    <h2 class="text-2xl font-bold text-gray-800">Dokter Unggulan</h2>
    <a href="#" class="text-teal-600 text-sm font-medium hover:underline hover:text-teal-700 transition">
      Lihat Semua
    </a>
  </div>

  {{-- Card Dokter --}}
  <div class="flex overflow-x-auto space-x-5 px-2 pb-2 scrollbar-hide">
    @foreach ($unggulan as $dokter)
      <a href="{{ route('dokter.detail', $dokter->id) }}"
         class="relative rounded-2xl overflow-hidden shadow-lg w-48 h-64 shrink-0 group transform  transition duration-300 ease-in-out">

        {{-- Gambar Dokter --}}
        @if($dokter->foto)
          <img src="{{ asset('storage/app/public/dokter_profiles'. $dokter->foto) }}" alt="{{ $dokter->name }}"
               class="w-full h-full " />
        @else
          <div class="w-full h-full bg-teal-100 flex items-center justify-center text-teal-700 text-xl font-semibold">
            DR.
          </div>
        @endif

        {{-- Overlay --}}
        <div class="absolute bottom-0 w-full p-4 bg-gradient-to-t from-black/70 via-black/30 to-transparent text-white">
          <h3 class="text-base font-semibold truncate">DR. {{ $dokter->name }}</h3>
          <p class="text-sm">{{ $dokter->spesialis }}</p>
          <p class="text-xs opacity-90">{{ $dokter->pengalaman }} tahun pengalaman</p>
        </div>

      </a>
    @endforeach
  </div>
</div>
