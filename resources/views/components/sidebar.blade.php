<aside id="sidebar"
    class="bg-white w-64 fixed inset-y-0 left-0 z-50 border-r border-slate-100 flex flex-col justify-between transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="p-6">
        <!-- Logo Kelompok -->
        <div class="flex items-center gap-3 px-2 mb-8">
            <div
                class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-md shadow-blue-200">
                K</div>
            <div>
                <h1 class="font-bold text-slate-900 leading-tight">SekoKKN</h1>
                <p class="text-xs text-slate-400 font-medium">Sistem Informasi KKN</p>
            </div>
        </div>

        <!-- Role Badge -->
        <div class="bg-slate-50 rounded-xl p-3 mb-6 flex items-center gap-3 border border-slate-100">
            <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
            <div>
                <p class="text-xs text-slate-400 font-medium leading-none mb-1">Role Akun</p>
                <p class="text-sm font-semibold text-slate-700 leading-none">Ketua Kelompok</p>
            </div>
        </div>

        <!-- Navigasi Menu -->
        <nav class="space-y-1">
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl bg-blue-50 text-blue-600 transition-all">
                <i class="fa-solid fa-chart-pie w-5 text-center text-base"></i> Dashboard
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">
                <i class="fa-solid fa-calendar-days w-5 text-center text-base"></i> Jadwal Kegiatan
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">
                <i class="fa-solid fa-clipboard-user w-5 text-center text-base"></i> Piket Harian
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">
                <i class="fa-solid fa-bullhorn w-5 text-center text-base"></i> Pengumuman
                <span class="ml-auto bg-amber-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">2
                    Baru</span>
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">
                <i class="fa-solid fa-user-check w-5 text-center text-base"></i> Absensi
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">
                <i class="fa-solid fa-list-check w-5 text-center text-base"></i> Program Kerja
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">
                <i class="fa-solid fa-images w-5 text-center text-base"></i> Dokumentasi
            </a>
            <div class="pt-4 mt-4 border-t border-slate-100 space-y-1">
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">
                    <i class="fa-solid fa-file-invoice w-5 text-center text-base"></i> Laporan
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all">
                    <i class="fa-solid fa-gear w-5 text-center text-base"></i> Settings
                </a>
            </div>
        </nav>
    </div>

    <!-- Dark Mode Toggle Particle -->
    <div class="p-4 border-t border-slate-100 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-circle-half-stroke text-slate-400 text-sm"></i>
            <span class="text-xs font-medium text-slate-500">Mode Gelap</span>
        </div>
        <button class="w-9 h-5 bg-slate-200 rounded-full p-0.5 focus:outline-none transition-colors duration-200"
            id="darkModeBtn">
            <div class="w-4 h-4 bg-white rounded-full shadow-sm transition-transform duration-200"></div>
        </button>
    </div>
</aside>
