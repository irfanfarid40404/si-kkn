<x-app>
    <x-slot:title>Piket Harian Posko - Sistem Informasi KKN</x-slot:title>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900">Jadwal Piket Harian</h2>
        <p class="text-sm text-slate-500">Pembagian tugas domestik, konsumsi, dan operasional kebersihan di lingkungan
            posko KKN.</p>
    </div>

    <div class="mb-6 p-4 bg-blue-50 border border-blue-100 rounded-2xl flex items-center gap-3 text-blue-800 text-sm">
        <i class="fa-solid fa-circle-info text-base shrink-0"></i>
        <span>Hari ini adalah <strong>{{ $today }}</strong>. Kelompok yang tertera dengan tanda khusus wajib
            bertanggung jawab penuh atas operasional posko harian.</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ($piketSchedules as $hari => $data)
            @php
                $isToday = strtolower($hari) === strtolower($today);
            @endphp

            <div
                class="bg-white rounded-2xl shadow-sm border transition-all duration-300 flex flex-col justify-between
                {{ $isToday ? 'border-blue-500 ring-4 ring-blue-500/10 shadow-md relative overflow-hidden' : 'border-slate-200/80 hover:border-slate-300' }}">

                @if ($isToday)
                    <div
                        class="absolute top-0 right-0 bg-blue-500 text-white text-[10px] font-bold px-3 py-1 rounded-bl-xl tracking-wider uppercase">
                        Hari Ini
                    </div>
                @endif

                <div class="p-5">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold {{ $isToday ? 'text-blue-600' : 'text-slate-800' }}">
                            {{ $hari }}</h3>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-0.5">
                            {{ $data['group_name'] }}</p>
                    </div>

                    <div class="space-y-2 mb-5">
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Tugas
                            Utama</span>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach ($data['tasks'] as $task)
                                <span
                                    class="px-2.5 py-1 bg-slate-50 border border-slate-150 text-slate-600 text-xs rounded-lg font-medium inline-flex items-center gap-1.5">
                                    <span class="w-1 h-1 rounded-full bg-slate-400"></span>
                                    {{ $task }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-3">
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Petugas
                            Posko</span>
                        <div class="space-y-2.5">
                            @foreach ($data['members'] as $member)
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold shrink-0
                                        {{ $isToday ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-600' }}">
                                        {{ $member['avatar'] }}
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="text-sm font-semibold text-slate-700 truncate leading-snug">
                                            {{ $member['name'] }}</h4>
                                        <p class="text-[11px] text-slate-400 leading-none">{{ $member['role'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="px-5 py-3 bg-slate-50/60 border-t border-slate-100 text-right">
                    <span class="text-[11px] text-slate-400 font-medium">
                        <i class="fa-regular fa-clock mr-1"></i> 05:00 - 22:00 WIB
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</x-app>
