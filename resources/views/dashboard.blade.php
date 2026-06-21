<x-app>
    <x-slot:title>Dashboard Utama - Sistem KKN</x-slot:title>

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Selamat Datang, Andi! 👋</h2>
            <p class="text-sm text-slate-500">Berikut ringkasan progres program kerja kelompok KKN Desa Anda hari ini.</p>
        </div>
        <div class="text-sm text-slate-500 font-medium bg-white px-4 py-2 rounded-xl border border-slate-100 shadow-sm flex items-center gap-2 self-start sm:self-auto">
            <i class="fa-solid fa-clock-retro text-blue-500"></i>
            <span>Minggu, 21 Juni 2026</span>
        </div>
    </div>

    <!-- 1. STATISTIK CARDS (Dinamis Berdasarkan Data Controller) -->
    <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <x-stat-card 
            title="Jadwal Hari Ini" 
            value="{{ $stats['total_jadwal'] }}" 
            icon="fa-solid fa-calendar-day" 
            theme="blue" 
            action="showModal('Detail Jadwal', 'Hari ini terdapat beberapa agenda penting kelompok.')" />

        <x-stat-card 
            title="Jumlah Anggota" 
            value="{{ $stats['jumlah_anggota'] }}" 
            icon="fa-solid fa-users" 
            theme="emerald" />

        <x-stat-card 
            title="Piket Hari Ini" 
            value="{{ $stats['piket_aktif'] }}" 
            icon="fa-solid fa-broom" 
            theme="purple" />

        <x-stat-card 
            title="Pengumuman Baru" 
            value="{{ $stats['pengumuman_baru'] }}" 
            icon="fa-solid fa-bell-concierge" 
            theme="amber" 
            action="showModal('Notifikasi', 'Periksa sidebar pengumuman untuk informasi terbaru.')" />
    </section>

    <!-- Grid Layout Utama -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        
        <!-- KOLOM KIRI (Jadwal, Piket, Proker) -->
        <div class="xl:col-span-2 space-y-6">
            
            <!-- 2. JADWAL HARI INI -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-blue-600"></i> Jadwal Kegiatan Hari Ini
                    </h3>
                    <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">Lihat Semua</a>
                </div>
                <div class="space-y-3">
                    @foreach($schedules as $schedule)
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-xl hover:border-blue-200 transition-all cursor-pointer">
                        <div class="flex items-start gap-3">
                            <div class="mt-1 w-2 h-2 rounded-full {{ $schedule['color'] == 'blue' ? 'bg-blue-600' : 'bg-orange-500' }} shrink-0"></div>
                            <div>
                                <h4 class="text-sm font-semibold text-slate-800">{{ $schedule['title'] }}</h4>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1 text-xs text-slate-400 font-medium">
                                    <span><i class="fa-solid fa-location-dot mr-1"></i> {{ $schedule['location'] }}</span>
                                    <span><i class="fa-solid fa-user-tie mr-1"></i> PJ: {{ $schedule['pj'] }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="mt-2 sm:mt-0 px-3 py-1 {{ $schedule['color'] == 'blue' ? 'bg-blue-100 text-blue-700' : 'bg-orange-100 text-orange-700' }} font-bold text-xs rounded-lg self-start sm:self-auto">
                            {{ $schedule['time'] }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- 4. PIKET TABLE -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 overflow-hidden">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-hand-sparkles text-purple-600"></i> Petugas Piket Posko Hari Ini
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-100 text-xs font-semibold uppercase text-slate-400 tracking-wider">
                                <th class="pb-3 pl-2">Nama Anggota</th>
                                <th class="pb-3">Tugas Utama</th>
                                <th class="pb-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-slate-50">
                            @foreach($piketMembers as $member)
                            <tr>
                                <td class="py-3 pl-2 font-medium text-slate-800">{{ $member['name'] }}</td>
                                <td class="py-3 text-slate-500">{{ $member['task'] }}</td>
                                <td class="py-3">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                                        {{ $member['status_color'] == 'emerald' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                        {{ $member['status_color'] == 'amber' ? 'bg-amber-100 text-amber-800' : '' }}
                                        {{ $member['status_color'] == 'slate' ? 'bg-slate-100 text-slate-500' : '' }}">
                                        {{ $member['status'] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 5. PROGRAM KERJA PROGRESS -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-spinner text-emerald-600"></i> Progres Program Kerja (Proker)
                    </h3>
                </div>
                <div class="space-y-4">
                    @foreach($prokers as $proker)
                        <x-progress-bar title="{{ $proker['title'] }}" percentage="{{ $proker['percentage'] }}" theme="{{ $proker['theme'] }}" />
                    @endforeach
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN (Pengumuman & Dokumentasi) -->
        <div class="space-y-6">
            
            <!-- 3. PENGUMUMAN PENTING -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-bullhorn text-amber-500"></i> Pengumuman Penting
                    </h3>
                </div>
                <div class="space-y-4">
                    @foreach($announcements as $announce)
                    <div onclick="showModal('{{ $announce['title'] }}', '{{ $announce['content'] }}')" 
                         class="p-4 {{ $announce['is_important'] ? 'bg-amber-50/50 border border-amber-100' : 'bg-slate-50 border border-slate-100' }} rounded-xl cursor-pointer hover:opacity-90 transition-all">
                        <div class="flex justify-between items-start gap-2 mb-1">
                            <h4 class="text-sm font-semibold text-slate-800 leading-tight">{{ $announce['title'] }}</h4>
                            @if($announce['is_important'])
                                <span class="text-[10px] bg-amber-100 text-amber-800 font-bold px-1.5 py-0.5 rounded">Penting</span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-500 line-clamp-2">{{ $announce['excerpt'] }}</p>
                        <p class="text-[10px] text-slate-400 mt-2 font-medium"><i class="fa-solid fa-clock mr-1"></i> {{ $announce['time_ago'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- 6. DOKUMENTASI KEGIATAN -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-camera text-blue-600"></i> Dokumentasi Terbaru
                    </h3>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    @foreach($documentations as $doc)
                    <div class="group relative overflow-hidden rounded-xl bg-slate-100 aspect-video cursor-pointer">
                        <img src="{{ $doc['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" alt="Dokumentasi">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-2">
                            <p class="text-[10px] text-white font-medium truncate">{{ $doc['caption'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</x-app>