<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ config('app.name', 'LMS Student') }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <div class="min-h-screen">

        {{-- Sidebar --}}
        @include('student.layouts.sidebar')


        {{-- Main Area --}}
        <div class="lg:pl-64">

            {{-- Header --}}
            @include('student.layouts.header')


            {{-- Page Content --}}
            <main class="min-w-0">

                <div class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

                    @yield('content')

                </div>

            </main>

        </div>

    </div>


    {{-- Toast --}}
    <x-toast
        type="error"
        :message="session('error')"
    />

</body>

</html>
