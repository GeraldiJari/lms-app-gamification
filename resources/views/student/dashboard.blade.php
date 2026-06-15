@extends('student.layouts.app')


@section('content')

<div class="p-6">

    <h1 class="text-3xl font-bold">
        Halo, {{ auth()->user()->name }} 👋
    </h1>


    <p class="text-gray-500 mt-2">
        Selamat datang di Learning Dashboard
    </p>


    <div class="grid md:grid-cols-3 gap-5 mt-8">


        @forelse($courses as $course)

        <div class="bg-white rounded-xl shadow p-5">


            <h2 class="text-xl font-bold">
                {{ $course->name }}
            </h2>


            <p class="text-sm text-gray-500 mt-2">

                {{ $course->teacher->name ?? 'Guru' }}

            </p>


            <a href="#"
               class="inline-block mt-5 px-4 py-2 bg-blue-600 text-white rounded-lg">

                Buka Course

            </a>


        </div>


        @empty


        <p>
            Belum ada course.
        </p>


        @endforelse


    </div>

</div>


@endsection