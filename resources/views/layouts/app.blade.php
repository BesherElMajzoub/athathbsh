<!doctype html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=yes">
        <meta name="theme-color" content="#0b6e4f">

        <title>{{ $seo['title'] ?? $business['brand_name'] }}</title>
        <meta name="description" content="{{ $seo['description'] ?? '' }}">
        <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

        <meta property="og:locale" content="ar_SA">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $seo['title'] ?? $business['brand_name'] }}">
        <meta property="og:description" content="{{ $seo['description'] ?? '' }}">
        <meta property="og:url" content="{{ url()->current() }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('schema')
    </head>
    <body>
        <a class="skip-link" href="#main">تخطي إلى المحتوى</a>

        @include('partials.header')

        <main id="main" class="main">
            @yield('content')
        </main>

        @include('partials.footer')

        <x-sticky-mobile-cta />
    </body>
</html>

