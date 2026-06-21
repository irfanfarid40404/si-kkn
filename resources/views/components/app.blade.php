<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Sistem Informasi KKN' }}</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome Core Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased flex min-h-screen overflow-x-hidden">

    <!-- Component Utama: Sidebar -->
    <x-sidebar />

    <!-- Overlay Sidebar untuk Mobile -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/30 z-40 hidden lg:hidden backdrop-blur-sm"></div>

    <!-- Main Content Wrapper -->
    <div class="flex-1 min-w-0 flex flex-col lg:pl-64">

        <!-- Component Utama: Topbar -->
        <x-topbar />

        <!-- Main Dashboard Content Injection -->
        <main class="p-6 space-y-6 max-w-[1600px] w-full mx-auto flex-1">
            {{ $slot }}
        </main>
    </div>

    <!-- Particle Component: Global Modal Info -->
    <div id="infoModal"
        class="fixed inset-0 z-50 overflow-y-auto hidden flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm">
        <div
            class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-start mb-4">
                <h3 id="modalTitle" class="text-lg font-bold text-slate-900">Judul</h3>
                <button onclick="closeModal()"
                    class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-50">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <p id="modalContent" class="text-sm text-slate-600 leading-relaxed"></p>
            <div class="mt-6 text-right">
                <button onclick="closeModal()"
                    class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-xl transition-colors">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Particle Component: Toast Notification -->
    <div id="toastNotification"
        class="fixed bottom-5 right-5 z-50 bg-slate-900 text-white text-xs font-medium px-4 py-3 rounded-xl shadow-xl flex items-center gap-3 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none">
        <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
        <span id="toastMessage">Notifikasi</span>
    </div>

    <!-- Global Javascript for UI Interaction -->
    <script>
        // Sidebar Toggle Mobile
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });
        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Dark Mode Toggle Mockup
        document.getElementById('darkModeBtn')?.addEventListener('click', function() {
            this.classList.toggle('bg-blue-600');
            this.classList.toggle('bg-slate-200');
            this.querySelector('div').classList.toggle('translate-x-4');
            showToast("Mode Gelap berhasil diubah (Simulasi)");
        });

        // Modal Handlers
        function showModal(title, content) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalContent').innerText = content;
            const modal = document.getElementById('infoModal');
            modal.classList.remove('hidden');
            setTimeout(() => modal.querySelector('div').classList.remove('scale-95'), 10);
        }

        function closeModal() {
            const modal = document.getElementById('infoModal');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => modal.classList.add('hidden'), 200);
        }

        // Toast Handler
        function showToast(message) {
            const toast = document.getElementById('toastNotification');
            document.getElementById('toastMessage').innerText = message;
            toast.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => toast.classList.add('translate-y-20', 'opacity-0'), 3000);
        }
    </script>
</body>

</html>
