@props([
    'title',
    'description' => null,
])

<div class="mb-5">
    <h2 class="text-xl font-bold text-slate-800">
        {{ $title }}
    </h2>

    @if($description)
        <p class="mt-1 text-sm text-slate-500">
            {{ $description }}
        </p>
    @endif
</div>