@props([

    'href'=>null,

    'variant'=>'primary'

])

@php

$variants=[

'primary'=>'bg-blue-600 hover:bg-blue-700 text-white',

'secondary'=>'bg-white border hover:bg-slate-50',

'danger'=>'bg-red-600 hover:bg-red-700 text-white',

];

@endphp

@if($href)

<a

href="{{ $href }}"

{{ $attributes->class([

'inline-flex items-center justify-center rounded-xl px-5 py-2 transition',

$variants[$variant]

]) }}

>

{{ $slot }}

</a>

@else

<button

{{ $attributes->class([

'inline-flex items-center justify-center rounded-xl px-5 py-2 transition',

$variants[$variant]

]) }}

>

{{ $slot }}

</button>

@endif