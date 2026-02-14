<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=yes">
    <meta name="theme-color" content="#0b6e4f">

    {{-- Primary Meta Tags --}}
    <title>{{ $seo['title'] ?? config('site.site_name_ar') }}</title>
    <meta name="description" content="{{ $seo['description'] ?? '' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'شراء أثاث مستعمل, جدة, شراء مكيفات, شراء اجهزة كهربائية' }}">
    <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:locale" content="ar_SA">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('site.site_name_ar') }}">
    <meta property="og:title" content="{{ $seo['title'] ?? config('site.site_name_ar') }}">
    <meta property="og:description" content="{{ $seo['description'] ?? '' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @if (isset($seo['image']))
        <meta property="og:image" content="{{ $seo['image'] }}">
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? config('site.site_name_ar') }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? '' }}">
    @if (isset($seo['image']))
        <meta name="twitter:image" content="{{ $seo['image'] }}">
    @endif

    {{-- Preconnect for performance --}}




    {{-- Styles --}}
    <link rel="preload" as="style" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/logo.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo.svg') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.svg') }}">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'url' => url('/'),
            'logo' => asset('assets/img/logo.svg')
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>

    {{-- Schema.org Markup --}}
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

    {{-- Site JS --}}
    <script src="{{ asset('assets/js/site.js') }}" defer></script>
</body>

</html>
