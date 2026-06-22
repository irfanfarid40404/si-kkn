<x-app>
    <!-- Slot Title untuk <title> di layout -->
    <x-slot:title>Jadwal Kegiatan KKN - Sistem Informasi</x-slot:title>

    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Jadwal Agenda & Kegiatan</h2>
            <p class="text-sm text-slate-500">Manajemen linimasa, program kerja, dan agenda harian kelompok KKN Anda.</p>
        </div>
        <!-- Tombol Tambah Kegiatan (Memicu Modal Simulasi) -->
        <button onclick="showModal('Tambah Kegiatan Baru', 'Fitur Form Input Tambah Jadwal Kegiatan akan mengarah ke sistem validasi database (POST request).')" 
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-sm transition-colors self-start sm:self-auto">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah Kegiatan</span>
        </button>
    </div>

    <!-- MAIN TIMELINE CONTENT -->
    <div class="space-y-8 mt-6">

        <!-- KATEGORI 1: HARI INI -->
        <div class="space-y-4">
            <div class="flex items-center gap-2 pb-2 border-b border-slate-200">
                <span class="flex h-2.5 w-2.5 rounded-full bg-blue-600 animate-ping"></span>
                <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                    Agenda Hari Ini <span class="text-xs font-normal text-slate-400">({{ count($todaySchedules) }} Kegiatan)</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
                @forelse($todaySchedules as $schedule)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 hover:border-blue-300 transition-all cursor-pointer flex flex-col justify-between"
                         onclick="showModal('{{ $schedule['title'] }}', '{{ $schedule['description'] }}\n\n📍 Lokasi: {{ $schedule['location'] }}\n👤 PJ: {{ $schedule['pj'] }}')">
                        <div>
                            <div class="flex items-start justify-between gap-4 mb-2">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-bold {{ $schedule['badge_color'] }}">
                                    {{ $schedule['status'] }}
                                </span>
                                <span class="text-xs text-slate-400 font-medium"><i class="fa-solid fa-clock mr-1"></i> {{ $schedule['time'] }}</span>
                            </div>
                            <h4 class="text-base font-bold text-slate-800 leading-snug hover:text-blue-600 transition-colors">{{ $schedule['title'] }}</h4>
                            <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $schedule['description'] }}</p>
                        </div>
                        <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-50 text-xs text-slate-400 font-medium">
                            <span><i class="fa-solid fa-location-dot text-slate-400 mr-1"></i> {{ $schedule['location'] }}</span>
                            <span class="bg-slate-50 text-slate-600 px-2 py-1 rounded-md">PJ: {{ $schedule['pj'] }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-slate-400 italic">Tidak ada agenda tersisa untuk hari ini.</p>
                @endforelse
            </div>
        </div>

        <!-- KATEGORI 2: AKAN DATANG -->
        <div class="space-y-4">
            <div class="pb-2 border-b border-slate-200">
                <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days text-amber-500"></i> Agenda Mendatang <span class="text-xs font-normal text-slate-400">({{ count($upcomingSchedules) }} Kegiatan)</span>
                </h3>
            </div>

            <div class="space-y-3">
                @foreach($upcomingSchedules as $schedule)
                    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:shadow-md transition-shadow cursor-pointer"
                         onclick="showModal('{{ $schedule['title'] }}', '{{ $schedule['description'] }}')">
                        <div class="space-y-1 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-xs font-bold text-slate-700 bg-slate-100 px-2 py-0.5 rounded">{{ $schedule['date'] }}</span>
                                <span class="text-xs font-semibold text-amber-600"><i class="fa-regular fa-clock mr-1"></i> {{ $schedule['time'] }}</span>
                                @if($schedule['status'] === 'Penting')
                                    <span class="text-[10px] bg-rose-100 text-rose-700 font-bold px-1.5 rounded">PENTING</span>
                                @endif
                            </div>
                            <h4 class="text-sm font-bold text-slate-800">{{ $schedule['title'] }}</h4>
                            <p class="text-xs text-slate-400 line-clamp-1">{{ $schedule['description'] }}</p>
                        </div>
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-2 border-t md:border-t-0 pt-3 md:pt-0 text-xs text-slate-500 font-medium">
                            <span class="shrink-0"><i class="fa-solid fa-location-dot text-slate-400 mr-1"></i> {{ $schedule['location'] }}</span>
                            <span class="shrink-0 bg-slate-50 px-2 py-1 rounded border border-slate-100 text-slate-600">PJ: {{ $schedule['pj'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- KATEGORI 3: SUDAH SELESAI -->
        <div class="space-y-4">
            <div class="pb-2 border-b border-slate-200">
                <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-500"></i> Telah Selesai <span class="text-xs font-normal text-slate-400">({{ count($pastSchedules) }} Kegiatan)</span>
                </h3>
            </div>

            <div class="space-y-3 opacity-75">
                @foreach($pastSchedules as $schedule)
                    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-4 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:opacity-100 transition-opacity cursor-pointer"
                         onclick="showModal('{{ $schedule['title'] }} (SELESAI)', '{{ $schedule['description'] }}')">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 text-xs text-slate-400 font-medium mb-1">
                                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-md font-bold text-[10px]">SUCCESS</span>
                                <span>{{ $schedule['date'] }}</span>
                                <span>•</span>
                                <span>{{ $schedule['time'] }}</span>
                            </div>
                            <h4 class="text-sm font-semibold text-slate-600 line-through">{{ $schedule['title'] }}</h4>
                        </div>
                        <div class="text-xs text-slate-400 font-medium flex items-center gap-4">
                            <span><i class="fa-solid fa-location-dot mr-1"></i> {{ $schedule['location'] }}</span>
                            <span class="bg-slate-100 px-2 py-0.5 rounded text-[11px]">PJ: {{ $schedule['pj'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-app>