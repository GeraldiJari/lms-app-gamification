@extends('student.layouts.app')

@section('content')

<div class="space-y-6">

    <div class="bg-white rounded-xl shadow-sm p-6">

        <h1 class="text-3xl font-bold">
            Halo, {{ auth()->user()->name }} 👋
        </h1>

        <p class="text-gray-500 mt-2">
            Selamat datang kembali di LMS.
        </p>

    </div>

    {{-- Statistics Card --}}
    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-gray-500">
                Course
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $courses->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-gray-500">
                Assignment
            </p>

            <h2 class="text-3xl font-bold mt-2">
                0
            </h2>

        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-gray-500">
                Quiz
            </p>

            <h2 class="text-3xl font-bold mt-2">
                0
            </h2>

        </div>

    </div>

    {{--  Preview Courses --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold mb-5">
            My Courses
        </h2>

        <div class="space-y-3">

            @forelse($courses as $course)

                <div class="flex justify-between items-center">

                    <h2 class="text-xl font-semibold">
                        {{ $course->name }}
                    </h2>

                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                        {{ $course->sessions_count }} Session
                    </span>

                </div>

                <p class="text-gray-500 mt-4">
                    {{ Str::limit($course->description,100) }}
                </p>

                <div class="mt-6">

                    <a
                        href="{{ route('student.courses.show',$course) }}"
                        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl">

                        Buka Course →

                    </a>

                </div>

            @empty

                <p class="text-gray-500">

                    Belum ada course.

                </p>

            @endforelse

        </div>

    </div>
    

</div>

@endsection