@props([
    'title',
    'value',
    'icon',
    'theme' => 'blue', // Pilihan default warna: blue, emerald, purple, amber
    'action' => null,
])

@php
    // Mapping warna dinamis berbasis class Tailwind
    $themes = [
        'blue' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-600'],
        'emerald' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
        'purple' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600'],
        'amber' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-600'],
    ];
    $activeTheme = $themes[$theme] ?? $themes['blue'];
@endphp

<div @if ($action) onclick="{!! $action !!}" @endif
    class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center justify-between {{ $action ? 'cursor-pointer hover:shadow-md hover:-translate-y-0.5' : '' }} transition-all duration-200">
    <div class="space-y-1">
        <p class="text-xs text-slate-400 font-semibold tracking-wide uppercase">{{ $title }}</p>
        <p class="text-2xl font-bold text-slate-900">{{ $value }}</p>
    </div>
    <div
        class="w-12 h-12 rounded-xl {{ $activeTheme['bg'] }} {{ $activeTheme['text'] }} flex items-center justify-center text-lg">
        <i class="{{ $icon }}"></i>
    </div>
</div>
