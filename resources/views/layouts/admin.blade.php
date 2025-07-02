<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel | eSehat')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Tailwind CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- Google Font (optional) --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo3.png') }}">
    
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r border-green-100 shadow-lg hidden md:block">
            <div class="p-6 border-b border-green-100 bg-green-50">
                <h1 class="text-2xl font-bold text-green-700">eSehat Admin</h1>
                <p class="text-sm text-gray-500">Panel Kontrol</p>
            </div>

            <ul class="p-4 space-y-3">
                <li>
                    <a href="{{ route('articles.index') }}" class="flex items-center p-2 rounded-lg hover:bg-green-100 transition">
                        <span class="mr-2">📄</span>
                        <span class="text-sm font-medium">Daftar Artikel</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('articles.create') }}" class="flex items-center p-2 rounded-lg hover:bg-green-100 transition">
                        <span class="mr-2">➕</span>
                        <span class="text-sm font-medium">Tambah Artikel</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center p-2 w-full text-left rounded-lg hover:bg-red-100 text-red-600 transition">
                            <span class="mr-2">🚪</span>
                            <span class="text-sm font-medium">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        {{-- Konten Utama --}}
        <main class="flex-1 p-6">
            <div class="bg-white shadow rounded-xl p-6">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>
