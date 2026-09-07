@php
    $url = $block['data']['url'] ?? null;

    $videoId = null;

    if ($url) {
        if (preg_match(
            '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&?\/]+)/',
            $url,
            $matches
        )) {
            $videoId = $matches[1];
        }
    }
@endphp

@if ($videoId)
    <div class="my-6 overflow-hidden rounded-2xl border border-slate-200 bg-black shadow-sm">
        <div class="aspect-video w-full">
            <iframe
                src="https://www.youtube.com/embed/{{ $videoId }}"
                title="YouTube video"
                class="h-full w-full"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
            ></iframe>
        </div>
    </div>
@elseif ($url)
    <div class="my-6 rounded-xl border border-yellow-200 bg-yellow-50 p-4">
        <p class="text-sm text-yellow-800">
            Video tidak dapat ditampilkan.
        </p>
    </div>
@endif