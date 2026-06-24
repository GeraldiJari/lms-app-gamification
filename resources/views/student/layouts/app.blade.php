<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">

        <div class="p-6 border-b">
            <h1 class="text-xl font-bold">
                LMS Student
            </h1>
        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('student.dashboard') }}"
                class="block px-4 py-3 rounded-lg hover:bg-slate-100">
                Dashboard
            </a>

            <a href="{{ route('student.courses') }}"
                class="block px-4 py-3 rounded-lg hover:bg-slate-100">
                My Courses
            </a>

            <a href="#"
                class="block px-4 py-3 rounded-lg hover:bg-slate-100">
                Assignments
            </a>

            <a href="#"
                class="block px-4 py-3 rounded-lg hover:bg-slate-100">
                Quiz
            </a>

            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-3 rounded-lg hover:bg-slate-100">
                Profile
            </a>

        </nav>

    </aside>

    <!-- Main -->
    <div class="flex-1">

        <!-- Topbar -->
        <header class="bg-white shadow-sm">

            <div class="flex justify-between items-center px-8 py-4">

                <div>
                    <h2 class="font-semibold text-lg">
                        Student Portal
                    </h2>
                </div>

                <div class="flex items-center gap-3">

                    <span>
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST"
                        action="{{ route('logout') }}">
                        @csrf

                        <button
                            class="text-red-500 hover:text-red-700">
                            Logout
                        </button>
                    </form>

                </div>

            </div>

        </header>

        <!-- Content -->
        <main class="p-8">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>