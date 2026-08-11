@props([
    'title'=>'Tidak ada data',
    'description'=>'',
    'icon'=>'📭'
])

<div
    class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm hover:shadow-lg transition">

    <div class="text-4xl">

        {{ $icon }}

    </div>

    <h2
        class="mt-4 text-xl font-semibold">

        {{ $title }}

    </h2>

    <p
        class="mt-2 text-slate-500">

        {{ $description }}

    </p>

</div>