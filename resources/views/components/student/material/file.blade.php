@php
    use Illuminate\Support\Facades\Storage;

    $path = $block['data']['file'] ?? null;
    $title = $block['data']['title'] ?? 'File Materi';

    $url = $path
        ? Storage::disk('public')->url($path)
        : null;

    $extension = $path
        ? strtolower(pathinfo($path, PATHINFO_EXTENSION))
        : null;
@endphp

@if ($path && $url)

    <div class="my-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- File Header --}}
        <div class="flex items-center gap-4 p-5">

            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600"
            >
                @if ($extension === 'pdf')
                    <span class="text-xs font-bold">
                        PDF
                    </span>
                @else
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
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A3.375 3.375 0 0 1 11.25 4.875v-1.5A3.375 3.375 0 0 0 7.875 0H6.75A3.375 3.375 0 0 0 3.375 3.375v17.25A3.375 3.375 0 0 0 6.75 24h9.375a3.375 3.375 0 0 0 3.375-3.375v-6.375Z"
                        />
                    </svg>
                @endif
            </div>

            <div class="min-w-0 flex-1">
                <p class="font-semibold text-slate-800">
                    {{ $title }}
                </p>

                @if ($extension)
                    <p class="mt-1 text-xs uppercase text-slate-500">
                        {{ $extension }} file
                    </p>
                @endif
            </div>

            <a
                href="{{ $url }}"
                download
                class="shrink-0 rounded-l px-4 py-2 text-sm font-semibold text-blue-600 transition hover:text-blue-300"
            >
                Download
            </a>

        </div>

        {{-- PDF Viewer --}}
        @if ($extension === 'pdf')

            <div class="border-t border-slate-200 bg-slate-100">

                <div class="aspect-[4/3] w-full">
                    <iframe
                        src="{{ $url }}"
                        title="{{ $title }}"
                        class="h-full w-full"
                    ></iframe>
                </div>

            </div>

        @endif

    </div>

@endif