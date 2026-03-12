<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind / CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- NAVBAR --}}
    @include('layouts.navigation')

    {{-- KONTEN --}}
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
