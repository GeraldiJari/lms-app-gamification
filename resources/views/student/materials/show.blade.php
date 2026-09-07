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
        <div class="space-y-8">

            @foreach ($material->content ?? [] as $block)

                @switch($block['type'] ?? null)

                    @case('text')
                        <x-student.material.text :block="$block" />
                        @break

                    @case('image')
                        <x-student.material.image :block="$block" />
                        @break

                    @case('video')
                        <x-student.material.video :block="$block" />
                        @break

                    @case('link')
                        <x-student.material.link :block="$block" />
                        @break

                    @case('file')
                        <x-student.material.file :block="$block" />
                        @break

                @endswitch

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