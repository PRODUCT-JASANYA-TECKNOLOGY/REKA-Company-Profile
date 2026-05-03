<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <x-seo::meta />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
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
