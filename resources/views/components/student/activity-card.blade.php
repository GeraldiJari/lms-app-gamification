@props([
    'title',
    'description'=>null,
    'count'=>0,
    'icon'=>'📚',
    'button'=>'Open',
    'url'=>'#'
])

<a
    href="{{ $url }}"
    class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm hover:shadow-lg transition">

    <div class="text-4xl">

        {{ $icon }}

    </div>

    <h2
        class="mt-4 text-lg font-semibold">

        {{ $title }}

    </h2>

    @if($description)

        <p
            class="mt-2 text-sm text-slate-500">

            {{ $description }}

        </p>

    @endif

    <div
        class="mt-6 flex items-center justify-between">

        <span
            class="text-sm text-slate-500">

            {{ $count }} Item

        </span>

        <span
            class="font-medium text-blue-600 group-hover:translate-x-1 transition">

            {{ $button }} →

        </span>

    </div>

</a>