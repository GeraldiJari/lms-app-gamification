@php
    $path = $block['data']['image'] ?? null;
@endphp

@if ($path)
    <figure class="my-6 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">
        <img
            src="{{ Storage::disk('public')->url($path) }}"
            alt="Material image"
            class="mx-auto h-auto max-w-full object-contain"
            loading="lazy"
        >
    </figure>
@endif