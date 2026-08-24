@extends('student.layouts.app')

@section('content')

<div class="space-y-6 sm:space-y-8">

    <x-student.breadcrumb
        :items="[
            [
                'label' => 'Dashboard',
                'url' => route('student.dashboard'),
            ],
            [
                'label' => 'My Courses',
                'url' => route('student.courses'),
            ],
            [
                'label' => $course->name,
                'url' => route('student.courses.show', $course),
            ],
            [
                'label' => $session->title,
                'url' => route('student.sessions.show', [
                    'course' => $course,
                    'session' => $session,
                ]),
            ],
            [
                'label' => $material->title,
            ],
        ]"
    />


    <article
        class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-8 lg:p-10"
    >

        <header class="mb-8 border-b border-slate-100 pb-6">

            <div class="mb-3">
                <span
                    class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700"
                >
                    Material
                </span>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                {{ $material->title }}
            </h1>

        </header>


        {{-- Material Content --}}
        {{-- Material Content --}}
        <div class="space-y-8">

            @foreach ($material->content ?? [] as $block)

                @if (($block['type'] ?? null) === 'text')

                    <div class="prose max-w-none prose-slate">
                        {!! $block['data']['content'] ?? '' !!}
                    </div>

                @elseif (($block['type'] ?? null) === 'video')

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">
                            Video:
                            {{ $block['data']['url'] ?? '-' }}
                        </p>
                    </div>

                @endif

            @endforeach

        </div>


        {{-- Completion --}}
        <div class="mt-10 border-t border-slate-100 pt-6">

            <x-student.button>
                Tandai Selesai
            </x-student.button>

        </div>

    </article>

</div>

@endsection