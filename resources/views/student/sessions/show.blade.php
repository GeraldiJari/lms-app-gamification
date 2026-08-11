@extends('student.layouts.app')

@section('content')

<div class="space-y-8">

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
            ],
        ]"
    />

    <x-student.page-header
        :title="$session->title"
        :description="$session->description"
    />

    <x-student.section-title
        title="Learning Activities"
        description="Pelajari materi dan selesaikan aktivitas pada pertemuan ini."
    />

    <div class="grid gap-6 md:grid-cols-3">

        {{-- Material --}}
        @if($session->materials->count())

            <x-student.activity-card
                title="Material"
                icon="📚"
                :count="$session->materials->count()"
                button="Lihat Materi"
                url="#"
            />

        @else

            <x-student.empty-state
                title="Belum ada materi"
                description="Belum ada materi untuk pertemuan ini."
            />

        @endif


        {{-- Assignment --}}
        @if($session->assignments->count())

            <x-student.activity-card
                title="Assignment"
                icon="📝"
                :count="$session->assignments->count()"
                button="Lihat Tugas"
                url="#"
            />

        @else

            <x-student.empty-state
                title="Belum ada tugas"
                description="Belum ada tugas untuk pertemuan ini."
            />

        @endif


        {{-- Quiz --}}
        @if($session->quizzes->count())

            <x-student.activity-card
                title="Quiz"
                icon="🎯"
                :count="$session->quizzes->count()"
                button="Lihat Quiz"
                url="#"
            />

        @else

            <x-student.empty-state
                title="Belum ada quiz"
                description="Belum ada quiz untuk pertemuan ini."
            />

        @endif

    </div>

</div>

@endsection