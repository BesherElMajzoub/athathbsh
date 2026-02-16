<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=yes">
    <meta name="theme-color" content="#0b6e4f">

    @php
        $defaultTitle = 'شراء اثاث مستعمل بجدة بأعلى سعر | نشتري العفش والمطابخ والمكيفات والسكراب';
        $defaultDesc =
            'شراء اثاث مستعمل بجدة وشراء العفش المستعمل وشراء المطابخ المستعملة وشراء سكراب بأعلى الأسعار. نجيك لموقعك فوراً، معاينة دقيقة، استلام سريع ودفع نقدي مباشر.';
        $title = $defaultTitle; //$seo['title'] ??
        $desc = $defaultDesc; //$seo['description'] ??
        $image = $seo['image'] ?? asset('assets/img/og-image.jpg');
        $url = $seo['canonical'] ?? url()->current();
    @endphp

    {{-- Primary Meta Tags --}}
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $desc }}">
    <link rel="canonical" href="{{ $url }}">

    <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    <meta name="googlebot" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    <meta name="keywords"
        content="شراء اثاث مستعمل بجدة, شراء عفش مستعمل جدة, شراء مطابخ مستعملة جدة, شراء مكيفات مستعملة جدة, شراء سكراب جدة, شراء معدات مطاعم مستعملة جدة">

    {{-- Open Graph / WhatsApp / Facebook --}}
    <meta property="og:locale" content="ar_SA">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="شراء اثاث مستعمل بجدة">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $desc }}">
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="شراء اثاث مستعمل بجدة">


    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $desc }}">
    <meta name="twitter:image" content="{{ $image }}">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6N0HW0Q21M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-6N0HW0Q21M');
    </script>

    {{-- Styles --}}
    <link rel="preload" href="{{ asset('assets/fonts/tajawal-v12-arabic_latin-regular.woff2') }}" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/fonts/tajawal-v12-arabic_latin-500.woff2') }}" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/fonts/tajawal-v12-arabic_latin-700.woff2') }}" as="font"
        type="font/woff2" crossorigin>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/logo.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo.svg') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.svg') }}">

    {{-- LocalBusiness Schema (جدة) --}}
    <script type="application/ld+json">
    {!! json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'LocalBusiness',
      'name' => 'شراء اثاث مستعمل بجدة',
      'url' => url('/'),
      'image' => asset('assets/img/og-image.jpg'),
      'telephone' => '+966544707442',
      'address' => [
          '@type' => 'PostalAddress',
          'addressLocality' => 'Jeddah',
          'addressCountry' => 'SA'
      ],
      'areaServed' => [
          '@type' => 'City',
          'name' => 'Jeddah'
      ]
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>

    {{-- Additional Schema --}}
    @stack('schema')
    @stack('styles')
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
    @stack('scripts')
</body>

</html>
