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

                <div class="border rounded-lg p-4">

                    <h3 class="font-semibold">
                        {{ $course->name }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        {{ $course->description }}
                    </p>

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