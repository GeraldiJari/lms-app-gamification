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

            <a
                href="{{ route('student.courses.show', $course) }}"
                class="block bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition duration-300"
            >

                <div class="p-6">

                    <div class="flex justify-between">

                        <h2 class="text-xl font-semibold">

                            {{ $course->name }}

                        </h2>

                        <span
                            class="bg-blue-100 text-blue-700 text-sm px-3 py-1 rounded-full">

                            {{ $course->sessions_count }} Session

                        </span>

                    </div>

                    <p class="text-gray-500 mt-4">

                        {{ Str::limit($course->description,100) }}

                    </p>

                </div>

            </a>

        @empty

            <div
                class="bg-white rounded-xl shadow-sm p-6">

                Belum ada course.

            </div>

        @endforelse

    </div>

</div>

@endsection