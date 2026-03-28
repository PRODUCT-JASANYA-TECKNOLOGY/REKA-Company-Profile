<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'REKA — Solusi Digital Jasanya.id')</title>
    <meta name="description" content="@yield('description', 'Mulai dari website, aplikasi, hingga sistem kompleks — REKA membantu bisnis Anda tumbuh dengan solusi digital yang scalable dan terpercaya.')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest" defer></script>
    @stack('styles')
</head>
<body class="bg-white text-gray-950">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script src="{{ asset('assets/reka.js') }}" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
