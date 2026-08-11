@props([
    'session',
    'course',
    // 'material',
    'number' => null,
])

<details
    class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md"
>

    {{-- Session Header --}}
    <summary
        class="flex cursor-pointer list-none items-center justify-between gap-4 p-5"
    >

        <div class="flex min-w-0 items-center gap-4">

            {{-- Session Number --}}
            <div
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-slate-100 font-semibold text-slate-700"
            >
                {{ $number }}
            </div>

            {{-- Session Information --}}
            <div class="min-w-0">

                <h3 class="truncate font-semibold text-slate-800">
                    {{ $session->title }}
                </h3>

                @if($session->description)

                    <p class="mt-1 line-clamp-2 text-sm text-slate-500">
                        {{ $session->description }}
                    </p>

                @endif

                <div class="mt-2 flex flex-wrap gap-3 text-xs text-slate-500">

                    <span>
                        📚 {{ $session->materials->count() }} Material
                    </span>

                    <span>
                        📝 {{ $session->assignments->count() }} Assignment
                    </span>

                    <span>
                        🎯 {{ $session->quizzes->count() }} Quiz
                    </span>

                </div>

            </div>

        </div>


        {{-- Right Side --}}
        <div class="flex shrink-0 items-center gap-3">

            <span
                class="hidden rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600 sm:inline-flex"
            >
                Pertemuan {{ $number }}
            </span>

            {{-- Arrow --}}
            <svg
                class="h-5 w-5 text-slate-400 transition-transform duration-300 group-open:rotate-180"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m19 9-7 7-7-7"
                />
            </svg>

        </div>

    </summary>


    {{-- Activities --}}
    <div
        class="border-t border-slate-100 bg-slate-50/50 px-5 pb-5 pt-4"
    >

        <div class="space-y-2">

            {{-- Materials --}}
            @forelse($session->materials as $material)

                <a
                    href="{{ route('student.materials.show', [
                        'course' => $course,
                        'session' => $session,
                        'material' => $material,
                    ]) }}"
                    class="flex items-center justify-between rounded-xl border border-transparent bg-white p-4 transition hover:border-slate-200 hover:shadow-sm"
                >

                    <div class="flex min-w-0 items-center gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50"
                        >
                            📚
                        </div>

                        <div class="min-w-0">

                            <p class="truncate font-medium text-slate-800">
                                {{ $material->title }}
                            </p>

                            <p class="text-xs text-slate-500">
                                Material
                            </p>

                        </div>

                    </div>

                    <span class="ml-4 shrink-0 text-sm text-slate-400">
                        →
                    </span>

                </a>

            @empty

            @endforelse


            {{-- Assignments --}}
            @forelse($session->assignments as $assignment)

                <a
                    href="#"
                    class="flex items-center justify-between rounded-xl border border-transparent bg-white p-4 transition hover:border-slate-200 hover:shadow-sm"
                >

                    <div class="flex min-w-0 items-center gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50"
                        >
                            📝
                        </div>

                        <div class="min-w-0">

                            <p class="truncate font-medium text-slate-800">
                                {{ $assignment->title }}
                            </p>

                            <p class="text-xs text-slate-500">
                                Assignment
                            </p>

                        </div>

                    </div>

                    <span class="ml-4 shrink-0 text-sm text-slate-400">
                        →
                    </span>

                </a>

            @empty

            @endforelse


            {{-- Quizzes --}}
            @forelse($session->quizzes as $quiz)

                <a
                    href="#"
                    class="flex items-center justify-between rounded-xl border border-transparent bg-white p-4 transition hover:border-slate-200 hover:shadow-sm"
                >

                    <div class="flex min-w-0 items-center gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-violet-50"
                        >
                            🎯
                        </div>

                        <div class="min-w-0">

                            <p class="truncate font-medium text-slate-800">
                                {{ $quiz->title }}
                            </p>

                            <p class="text-xs text-slate-500">
                                Quiz
                            </p>

                        </div>

                    </div>

                    <span class="ml-4 shrink-0 text-sm text-slate-400">
                        →
                    </span>

                </a>

            @empty

            @endforelse


            {{-- No activities --}}
            @if(
                $session->materials->isEmpty() &&
                $session->assignments->isEmpty() &&
                $session->quizzes->isEmpty()
            )

                <div class="rounded-xl border border-dashed border-slate-300 p-6 text-center">

                    <div class="text-3xl">
                        📭
                    </div>

                    <p class="mt-2 text-sm font-medium text-slate-700">
                        Belum ada aktivitas
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Belum ada material, assignment, atau quiz pada pertemuan ini.
                    </p>

                </div>

            @endif


            {{-- Open Session --}}
            <div class="pt-3">

                <x-student.button
                    :href="route('student.sessions.show', [
                        'course' => $course,
                        'session' => $session,
                        // 'material' => $material,
                    ])"
                    variant="secondary"
                    class="w-full"
                >
                    Buka Pertemuan
                </x-student.button>

            </div>

        </div>

    </div>

</details>