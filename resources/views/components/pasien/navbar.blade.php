<nav class="bg-white/80 backdrop-blur-md border-b border-teal-100 shadow-sm top-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    
    {{-- Logo --}}
    <a href="{{ route('dashboard.pasien') }}" class="text-2xl font-extrabold tracking-tight text-teal-600 flex items-center gap-2">
      <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M12 8v8m4-4H8m13 0A9 9 0 1 1 3 12a9 9 0 0 1 18 0Z" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <span>eSehat</span>
    </a>

    {{-- Profil Pengguna --}}
    <a href="{{ route('profil.pasien') }}" class="flex items-center gap-3 hover:bg-teal-50 px-3 py-2 rounded-xl transition">
      @if(Auth::user()->foto)
        <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="w-9 h-9 rounded-full object-cover ring-2 ring-teal-200 shadow-sm" alt="Foto Profil">
      @else
        <div class="w-9 h-9 bg-teal-100 rounded-full flex items-center justify-center text-white font-semibold shadow-sm ring-2 ring-teal-200">
          {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
      @endif
      <span class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</span>
    </a>

  </div>
</nav>

