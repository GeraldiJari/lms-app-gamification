@php
    $title = $block['data']['title'] ?? 'Buka Link';
    $url = $block['data']['url'] ?? null;
@endphp

@if ($url)
    <div class="my-6">
        <a
            href="{{ $url }}"
            target="_blank"
            rel="noopener noreferrer"
            class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-blue-300 hover:shadow-md"
        >
            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                    class="h-6 w-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M13.5 6H18a2.25 2.25 0 0 1 2.25 2.25v7.5A2.25 2.25 0 0 1 18 18h-4.5m-3-12H6a2.25 2.25 0 0 0-2.25 2.25v7.5A2.25 2.25 0 0 0 6 18h4.5m-3-6h9"
                    />
                </svg>
            </div>

            <div class="min-w-0 flex-1">
                <p class="font-semibold text-slate-800 group-hover:text-blue-600">
                    {{ $title }}
                </p>

                <p class="mt-1 truncate text-sm text-slate-500">
                    {{ $url }}
                </p>
            </div>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="h-5 w-5 shrink-0 text-slate-400 transition group-hover:translate-x-1 group-hover:text-blue-600"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13.5 6H18a2.25 2.25 0 0 1 2.25 2.25v7.5A2.25 2.25 0 0 1 18 18h-4.5m-3-12H6a2.25 2.25 0 0 1-2.25-2.25V8.25A2.25 2.25 0 0 1 6 6h4.5m-3 6h9"
                />
            </svg>
        </a>
    </div>
@endif