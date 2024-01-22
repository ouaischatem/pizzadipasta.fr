<!-- Page par défaut de l'application -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset("pizzadipasta.png") }}" rel="icon" type="image/x-icon">
    <title>Pizza Di Pasta</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<div>
    @component('components.navbar')
    @endcomponent

    <main>
        @yield('content')
    </main>

    @component('components.footer')
    @endcomponent
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>
</html>
