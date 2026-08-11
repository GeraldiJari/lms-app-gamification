<aside
    class="fixed inset-y-0 left-0 z-40 hidden w-64 border-r border-slate-200 bg-white lg:flex lg:flex-col"
>

    {{-- Logo / Brand --}}
    <div class="flex h-16 shrink-0 items-center border-b border-slate-200 px-6">

        <div>
            <h1 class="text-lg font-bold text-slate-800">
                LMS Student
            </h1>

            <p class="text-xs text-slate-500">
                Learning Portal
            </p>
        </div>

    </div>


    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto p-4">

        <div class="space-y-1">

            {{-- Dashboard --}}
            <a
                href="{{ route('student.dashboard') }}"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100"
            >

                <span class="text-lg">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- My Courses --}}
            <a
                href="{{ route('student.courses') }}"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100"
            >

                <span class="text-lg">
                    📚
                </span>

                <span>
                    My Courses
                </span>

            </a>


            {{-- Assignments --}}
            <a
                href="#"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100"
            >

                <span class="text-lg">
                    📝
                </span>

                <span>
                    Assignments
                </span>

            </a>


            {{-- Quiz --}}
            <a
                href="#"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100"
            >

                <span class="text-lg">
                    🎯
                </span>

                <span>
                    Quiz
                </span>

            </a>

        </div>


        {{-- Account --}}
        <div class="mt-8 border-t border-slate-200 pt-6">

            <p class="mb-2 px-4 text-xs font-semibold uppercase tracking-wider text-slate-400">
                Account
            </p>


            <a
                href="{{ route('profile.edit') }}"
                class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100"
            >

                <span class="text-lg">
                    👤
                </span>

                <span>
                    Profile
                </span>

            </a>

        </div>

    </nav>


    {{-- User info --}}
    <div class="shrink-0 border-t border-slate-200 p-4">

        <div class="flex items-center gap-3">

            <div
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-100 text-sm font-semibold text-slate-700"
            >
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="min-w-0">

                <p class="truncate text-sm font-semibold text-slate-800">
                    {{ auth()->user()->name }}
                </p>

                <p class="truncate text-xs text-slate-500">
                    Student
                </p>

            </div>

        </div>

    </div>

</aside>
