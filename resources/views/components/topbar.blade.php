<header class="bg-white h-16 border-b border-slate-100 sticky top-0 z-30 flex items-center justify-between px-6">
    <!-- Left: Burger Button & Global Search -->
    <div class="flex items-center gap-4">
        <button id="sidebarToggle" class="lg:hidden p-2 text-slate-500 hover:bg-slate-50 rounded-xl">
            <i class="fa-solid fa-bars text-lg"></i>
        </button>
        <div class="hidden sm:block relative w-64 md:w-80">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400 text-sm">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" placeholder="Cari agenda, proker, data..."
                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2 pl-9 pr-4 text-sm focus:outline-none focus:border-blue-500 focus:bg-white transition-all">
        </div>
    </div>

    <!-- Right: Actions Profile & Quick Export -->
    <div class="flex items-center gap-4">
        <button onclick="showToast('Ekspor berkas PDF sedang diproses...')"
            class="hidden md:flex items-center gap-2 px-3 py-1.5 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-all">
            <i class="fa-solid fa-file-pdf text-red-500"></i> Export PDF
        </button>

        <button class="relative p-2 text-slate-500 hover:bg-slate-50 rounded-xl transition-all">
            <i class="fa-solid fa-bell text-lg"></i>
            <span class="absolute top-1 right-1 w-2 h-2 bg-blue-600 rounded-full border border-white"></span>
        </button>

        <div class="h-6 w-px bg-slate-200"></div>

        <!-- User Profile Dropdown Placeholder -->
        <div class="flex items-center gap-3 cursor-pointer group">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop"
                alt="Avatar"
                class="w-9 h-9 rounded-xl object-cover ring-2 ring-slate-100 group-hover:ring-blue-100 transition-all">
            <div class="hidden md:block text-left">
                <p
                    class="text-sm font-semibold text-slate-800 leading-none mb-0.5 group-hover:text-blue-600 transition-colors">
                    Andi Wijaya</p>
                <p class="text-[11px] text-slate-400 font-medium">Kelompok 12 - Desa Maju</p>
            </div>
            <i
                class="fa-solid fa-chevron-down text-xs text-slate-400 group-hover:text-slate-600 transition-colors ml-1"></i>
        </div>
    </div>
</header>
