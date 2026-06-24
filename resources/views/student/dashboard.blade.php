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

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-gray-500">
                Course
            </p>

            <h2 class="text-3xl font-bold mt-2">
                0
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

</div>

@endsection