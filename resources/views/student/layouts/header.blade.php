<header
    class="sticky top-0 z-30 h-16 border-b border-slate-200 bg-white/95 backdrop-blur"
>

    <div class="flex h-full items-center justify-between px-4 sm:px-6 lg:px-8">

        {{-- Mobile Menu --}}
        <button
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 lg:hidden"
        >
            <span class="text-xl">
                ☰
            </span>
        </button>


        {{-- Header Context --}}
        <div class="hidden lg:block">

            <p class="text-sm font-medium text-slate-500">
                Learning Management System
            </p>

        </div>


        {{-- User --}}
        <div class="flex items-center gap-3">

            <div class="hidden text-right sm:block">

                <p class="text-sm font-semibold text-slate-800">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-slate-500">
                    Student
                </p>

            </div>


            <div
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-100 text-sm font-semibold text-slate-700"
            >
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>


            {{-- Logout --}}
            <form
                method="POST"
                action="{{ route('logout') }}"
                class="hidden sm:block"
            >

                @csrf

                <button
                    type="submit"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-red-500 transition hover:bg-red-50 hover:text-red-700"
                >
                    Logout
                </button>

            </form>

        </div>

    </div>

</header>
