@props([
    'items' => []
])

<nav class="mb-6 flex flex-wrap items-center gap-2 text-sm">

    @foreach($items as $item)

        @if(!$loop->first)
            <span class="text-gray-400">/</span>
        @endif

        @if(isset($item['url']))

            <a
                href="{{ $item['url'] }}"
                class="text-slate-500 hover:text-blue-600 transition">

                {{ $item['label'] }}

            </a>

        @else

            <span class="font-medium text-slate-800">

                {{ $item['label'] }}

            </span>

        @endif

    @endforeach

</nav>