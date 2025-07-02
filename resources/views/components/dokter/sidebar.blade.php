<aside id="sidebar" class="bg-gradient-to-b from-white via-teal-50 to-sky-50 h-screen w-64 p-5 flex flex-col justify-between shadow-lg border-r border-teal-100 transition-all duration-300 overflow-hidden">

    {{-- Header --}}
    <div>
        <div class="flex items-center justify-between p-2">
            <h1 class="text-xl font-bold text-teal-600 whitespace-nowrap sidebar-text">🩺 eSehat</h1>
            <button id="sidebarToggle" class="text-gray-500 hover:text-teal-600 text-xl lg:hidden">
                ☰
            </button>
        </div>

        {{-- Menu --}}
        <ul class="mt-6 space-y-2 text-sm">
            <li>
                <a href="{{ route('dashboard.dokter') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-md transition hover:bg-teal-100 border-l-4
                   {{ request()->routeIs('dashboard.dokter') ? 'bg-teal-50 border-teal-500 font-semibold text-teal-700' : 'border-transparent text-gray-600' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path d="M3 12l2-2 7-7 7 7 2 2v10a1 1 0 01-1 1h-3m-10 0h6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('dokter.profile.edit') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-md transition hover:bg-teal-100 border-l-4
                   {{ request()->routeIs('dokter.profile.*') ? 'bg-teal-50 border-teal-500 font-semibold text-teal-700' : 'border-transparent text-gray-600' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                         stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="sidebar-text">Profil</span>
                </a>
            </li>

            <li>
                <a href="{{ route('dokter.riwayat') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-md transition hover:bg-teal-100 border-l-4
                   {{ request()->routeIs('dokter.riwayat') ? 'bg-teal-50 border-teal-500 font-semibold text-teal-700' : 'border-transparent text-gray-600' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path d="M9 17v-6h13v6M9 21H4V3h5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="sidebar-text">Riwayat Kunjungan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('jadwal.edit') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-md transition hover:bg-teal-100 border-l-4
                   {{ request()->routeIs('jadwal.*') ? 'bg-teal-50 border-teal-500 font-semibold text-teal-700' : 'border-transparent text-gray-600' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"
                         stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="sidebar-text">Jadwal Praktik</span>
                </a>
            </li>
{{-- 
            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-teal-100 text-gray-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path d="M11 12h2M12 9v6m-9 3a9 9 0 1118 0 9 9 0 01-18 0z"
                         stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="sidebar-text">Pengaturan</span>
                </a>
            </li> --}}
        </ul>
    </div>

    {{-- Footer --}}
    <div class="mt-10 border-t pt-4">
        <div class="flex items-center gap-3 mb-4">
            <img src="{{ Auth::user()->foto
            ? Storage::url(Auth::user()->foto)        
          }}"
     class="w-9 h-9 rounded-full object-cover ring-2 ring-teal-200 shadow-sm"
     alt="Foto Profil">
                 class="w-10 h-10 rounded-full object-cover ring-2 ring-teal-300" alt="Foto Dokter">
            <div class="sidebar-text">
                <p class="text-sm font-semibold text-gray-800">Dr. {{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left text-red-600 hover:text-red-800 hover:underline text-sm">
                Keluar
            </button>
        </form>
    </div>
</aside>
