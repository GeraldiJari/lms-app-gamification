@props([
    'type' => 'success',
    'message' => '',
])

@php
    $colors = [
        'success' => 'bg-green-500',
        'error' => 'bg-red-500',
        'warning' => 'bg-yellow-500',
        'info' => 'bg-blue-500',
    ];

    $titles = [
        'success' => 'Berhasil',
        'error' => 'Error',
        'warning' => 'Peringatan',
        'info' => 'Informasi',
    ];

    $color = $colors[$type] ?? 'bg-gray-500';
    $title = $titles[$type] ?? 'Info';
@endphp

@if($message)

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 5000)"
    x-show="show"
    x-transition
    class="fixed top-5 right-5 z-50 w-96"
>

    <div class="{{ $color }} rounded-xl shadow-xl text-white p-5">

        <div class="flex justify-between">

            <div>

                <h3 class="font-semibold">

                    {{ $title }}

                </h3>

                <p class="text-sm mt-1">

                    {{ $message }}

                </p>

            </div>

            <button
                @click="show=false"
                class="text-xl"
            >

                &times;

            </button>

        </div>

    </div>

</div>

@endif

{{-- 

<x-toast
    type="success"
    :message="session('success')"
/>

<x-toast
    type="error"
    :message="session('error')"
/>

<x-toast
    type="warning"
    :message="session('warning')"
/>

<x-toast
    type="info"
    :message="session('info')"
/> 

--}}