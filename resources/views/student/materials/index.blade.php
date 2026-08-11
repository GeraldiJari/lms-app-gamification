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
                'label' => 'Materials',
            ],
        ]"
    />

    <x-student.page-header
        title="Materials"
        :description="$session->title"
    />


    <div class="space-y-3">

        @forelse($session->materials as $material)

            <a
                href="{{ route('student.materials.show', [
                    'course' => $course,
                    'session' => $session,
                    'material' => $material,
                ]) }}"
                class="group flex items-center justify-between gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:border-slate-300 hover:shadow-md sm:p-5"
            >

                <div class="flex min-w-0 items-center gap-4">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-lg"
                    >
                        📚
                    </div>

                    <div class="min-w-0">

                        <h2 class="truncate font-semibold text-slate-800">
                            {{ $material->title }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Material pembelajaran
                        </p>

                    </div>

                </div>

                <span
                    class="shrink-0 text-sm font-medium text-blue-600 transition group-hover:translate-x-1"
                >
                    Buka →
                </span>

            </a>

        @empty

            <x-student.empty-state
                title="Belum ada material"
                description="Belum ada material pada pertemuan ini."
            />

        @endforelse

    </div>

</div>

@endsection