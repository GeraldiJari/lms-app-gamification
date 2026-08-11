@extends('student.layouts.app')

@section('content')
<div class="space-y-6 sm:space-y-8">
{{-- <div class="space-y-8"> --}}

    {{-- Breadcrumb --}}
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
            ],
        ]"
    />


    {{-- Course Header --}}
    <x-student.page-header
        :title="$course->name"
        :description="$course->description"
    />


    {{-- Learning Journey --}}
    <div>

        <x-student.section-title
            title="Learning Journey"
            description="Ikuti setiap pertemuan untuk menyelesaikan course."
        />


        <div class="space-y-4">

            @forelse($course->sessions as $session)

                <x-student.session-item
                    :session="$session"
                    :course="$course"
                    :number="$loop->iteration"
                />

            @empty

                <x-student.empty-state
                    title="Belum ada pertemuan"
                    description="Course ini belum memiliki pertemuan."
                />

            @endforelse

        </div>

    </div>

</div>

@endsection