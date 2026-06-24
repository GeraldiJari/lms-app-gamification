@extends('student.layouts.app')

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold">
            My Courses
        </h1>

        <p class="text-gray-500">
            Daftar course yang kamu ikuti
        </p>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($courses as $course)

            <div
                class="bg-white rounded-xl shadow-sm p-6">

                <h2 class="font-bold text-lg">
                    {{ $course->name }}
                </h2>

                <p class="text-gray-500 mt-2">
                    {{ Str::limit(
                        $course->description,
                        80
                    ) }}
                </p>

                <div class="mt-4 text-sm text-gray-600">

                    {{ $course->sessions_count }}
                    Session

                </div>

            </div>

        @empty

            <div
                class="bg-white rounded-xl shadow-sm p-6">

                Belum ada course.

            </div>

        @endforelse

    </div>

</div>

@endsection