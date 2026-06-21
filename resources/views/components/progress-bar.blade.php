@props(['title', 'percentage', 'theme' => 'blue'])

@php
    $colorMap = [
        'blue' => 'bg-blue-600',
        'amber' => 'bg-amber-500',
        'emerald' => 'bg-emerald-500',
    ];
    $barColor = $colorMap[$theme] ?? 'bg-blue-600';
@endphp

<div>
    <div class="flex justify-between text-sm font-medium mb-1">
        <span class="text-slate-700">{{ $title }}</span>
        <span class="font-semibold text-slate-900">{{ $percentage }}%</span>
    </div>
    <div class="w-full bg-slate-100 rounded-full h-2">
        <div class="{{ $barColor }} h-2 rounded-full transition-all duration-500" style="width: {{ $percentage }}%">
        </div>
    </div>
</div>
