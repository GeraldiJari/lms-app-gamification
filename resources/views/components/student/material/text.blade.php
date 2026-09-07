@php
    $content = $block['data']['content'] ?? null;
@endphp

@if ($content)
    <div class="prose max-w-none prose-slate">
        {!! $content !!}
    </div>
@endif