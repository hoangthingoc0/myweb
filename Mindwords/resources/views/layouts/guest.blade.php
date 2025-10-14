<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Học tiếng Anh</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


    {{-- Font chữ --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Vite: Load CSS và JS --}}
    {{--@vite(['resources/css/app.css', 'resources/css/auth.css', 'resources/js/app.js', 'resources/js/auth.js'])--}}
    
    {{-- Custom styles từ trang con (nếu cần) --}}
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

</head>
<body class="font-sans text-gray-900 antialiased">
    {{-- Background xanh navy gradient --}}
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 relative overflow-hidden">
        
        {{-- Vòng tròn trang trí với hiệu ứng animation --}}
        <div class="decorative-circle"></div>
        <div class="decorative-circle"></div>
        
        {{-- Logo --}}
        <div class="mb-6 relative z-10 animate-fade-in logo-container">
            <a href="/" class="flex items-center gap-2">
                {{-- Icon sách cho web học tiếng Anh --}}
                <div class="bg-white p-3 rounded-2xl shadow-lg">
                    <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <span class="text-white text-2xl font-bold">EnglishApp</span>
            </a>
        </div>

        {{-- Container chứa nội dung form (login/register) --}}
        <div class="w-full sm:max-w-md px-6 py-8 bg-gradient-to-br from-blue-50 to-white shadow-2xl overflow-hidden sm:rounded-3xl relative z-10 animate-slide-up">
            {{-- Nội dung từ trang con (login.blade.php, register.blade.php...) sẽ hiển thị ở đây --}}
            {{ $slot }}
        </div>

        {{-- Footer --}}
        <div class="mt-6 text-center text-white text-sm opacity-75 animate-fade-in auth-footer">
            <p>© 2024 EnglishApp. All rights reserved.</p>
        </div>
    </div>
    
    {{-- Custom scripts từ trang con (nếu cần thêm JS riêng) --}}
    @stack('scripts')
</body>
</html>