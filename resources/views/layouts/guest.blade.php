<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center" style="background: linear-gradient(135deg, #1a1a2e 0%, #dc3545 100%);">
        <div class="text-center mb-4">
            <a href="{{ route('movies.index') }}" class="text-white fw-bold text-decoration-none" style="font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                CineParaTodos
            </a>
            <p class="text-white-50 mt-2">Tu portal de cine</p>
        </div>
        <div class="card bg-dark text-white border-0 shadow-lg" style="width: 100%; max-width: 450px;">
            <div class="card-body p-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>