@props([
    'title',
    'description' => null
])

<div class="mb-8">

    <h1
        class="text-3xl font-bold text-slate-800">

        {{ $title }}

    </h1>

    @if($description)

        <p class="mt-2 text-slate-500">

            {{ $description }}

        </p>

    @endif

</div>