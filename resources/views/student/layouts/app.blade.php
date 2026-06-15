<!DOCTYPE html>
<html>

<head>

<title>
Learning
</title>


@vite(['resources/css/app.css','resources/js/app.js'])


</head>


<body class="bg-gray-100">


<div class="min-h-screen">


<nav class="bg-white shadow px-6 py-4">

    <div class="flex justify-between">

        <h1 class="font-bold text-xl">
            LMS
        </h1>


        <div>

            {{ auth()->user()->name }}

        </div>

    </div>

</nav>



@yield('content')


</div>


</body>

</html>