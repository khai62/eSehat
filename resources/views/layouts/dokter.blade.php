<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dashboard Dokter - eSehat')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="{{ asset('img/logo2.png') }}">
</head>
<body class="bg-gray-100  flex">

    {{-- Sidebar --}}
    @include('components.dokter.sidebar')


    {{-- Konten Utama --}}
     <main class="w-full flex-1">
        @yield('content')
    </main>
    
</body>
 <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const texts = sidebar.querySelectorAll('.sidebar-text');

        // Toggle lebar sidebar
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-20');

        // Toggle teks
        texts.forEach(text => {
            text.classList.toggle('hidden');
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    });

    // --- edit jadwal praktek -- 
    document.addEventListener('DOMContentLoaded', () => {
    const rows = document.getElementById('rows');
    const addBtn = document.getElementById('addRow');

    // Fungsi tambah
    addBtn?.addEventListener('click', () => {
        const first = rows.querySelector('.jadwal-row');
        if (!first) return;

        const clone = first.cloneNode(true);
        clone.querySelectorAll('input').forEach(el => el.value = '');
        clone.querySelector('select').selectedIndex = 0;
        rows.appendChild(clone);

        attachDeleteEvents(); // reattach delete buttons
    });

    // Fungsi hapus
    function attachDeleteEvents() {
        rows.querySelectorAll('.hapus-row').forEach(button => {
            button.onclick = () => {
                const row = button.closest('.jadwal-row');
                if (rows.childElementCount > 1) {
                    row.remove();
                }
            };
        });
    }

    attachDeleteEvents(); // pertama kali
});

    </script>
</html>
