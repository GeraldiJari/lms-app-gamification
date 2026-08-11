@props([
    'status' => 'default'
])

@php

$styles = [

    'completed' => 'bg-green-100 text-green-700',

    'progress' => 'bg-blue-100 text-blue-700',

    'locked' => 'bg-gray-100 text-gray-600',

    'pending' => 'bg-yellow-100 text-yellow-700',

    'submitted' => 'bg-indigo-100 text-indigo-700',

    'late' => 'bg-red-100 text-red-700',

    'default' => 'bg-slate-100 text-slate-700',

];

@endphp

<span
    class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $styles[$status] ?? $styles['default'] }}">

    {{ ucwords(str_replace('_',' ',$status)) }}

</span>