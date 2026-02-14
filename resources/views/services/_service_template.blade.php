@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness(config('business')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>

    @if (!empty($service['faqs']))
        <script type="application/ld+json">
            {!! json_encode(\App\Support\Schema::faqPage($service['faqs']), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
        </script>
    @endif
@endpush

@section('content')
    @php
        $business = config('business');
    @endphp

    {{-- HERO --}}
    <section class="hero hero-service" style="padding-bottom: 0;">
        <div class="container mobile-reverse-grid">
            <div class="hero-content">
                <span class="eyebrow">{{ $service['hero']['eyebrow'] ?? 'خدماتنا' }}</span>
                <h1>{{ $service['h1'] }}</h1>
                <p class="lead">{{ $service['hero']['lead'] }}</p>
                <x-cta size="lg" />
            </div>

            <div class="hero-image-container">
                @if (isset($service['hero']['image']))
                    <img src="{{ asset('assets/img/' . $service['hero']['image']) }}"
                        alt="{{ $service['hero']['image_alt'] ?? $service['h1'] }}" loading="lazy" width="600"
                        height="400" class="service-hero-img">
                @endif
            </div>
        </div>
    </section>

    {{-- HIGHLIGHTS --}}
    @if (!empty($service['highlights']))
        <section>
            <div class="container">
                <div class="highlights">
                    @foreach ($service['highlights'] as $highlight)
                        <div class="highlight-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>{{ $highlight }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- INTRO --}}
    @if (isset($service['intro']))
        <section>
            <div class="container">
                <div class="content-wrapper" style="max-width: 900px; margin: 0 auto;">
                    <h2>{{ $service['intro']['h2'] }}</h2>
                    <p>{{ $service['intro']['p1'] }}</p>
                    <p>{{ $service['intro']['p2'] }}</p>
                </div>
            </div>
        </section>
    @endif

    {{-- SUBCATEGORIES --}}
    @if (!empty($service['subcategories']))
        <section class="alt">
            <div class="container">
                <h2>{{ $service['subcategories_title'] ?? 'خدماتنا في ' . $service['name'] }}</h2>
                <p class="section-lead" style="max-width: 900px;">
                    {{ $service['subcategories_intro'] ?? 'نحن نشتري ' . $service['name'] . ' بجميع أشكاله وأنواعه. تشمل خدماتنا:' }}
                </p>

                <div class="services-grid">
                    @foreach ($service['subcategories'] as $sub)
                        <div class="service-card">
                            <h3>{{ $sub['name'] }}</h3>
                            @if (!empty($sub['items']))
                                <ul class="check-list">
                                    @foreach ($sub['items'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- FEATURES --}}
    @if (isset($service['features']))
        <section>
            <div class="container">
                <div class="content-wrapper" style="max-width: 900px; margin: 0 auto;">
                    <h3>{{ $service['features_h3'] }}</h3>
                    <p>{{ $service['features_intro'] }}</p>

                    <ul class="check-list">
                        @foreach ($service['features'] as $f)
                            <li>{{ $f }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    {{-- CHIPS --}}
    @if (isset($service['items']))
        <section class="alt">
            <div class="container">
                <div class="content-wrapper" style="max-width: 900px; margin: 0 auto;">
                    <h3>{{ $service['items_h3'] }}</h3>
                    <p>{{ $service['items_intro'] }}</p>
                </div>

                <div class="chips">
                    @foreach ($service['items'] as $item)
                        <span class="chip">{{ $item }}</span>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- STEPS --}}
    @if (isset($service['steps']))
        <section>
            <div class="container">
                <h2>{{ $service['steps_h3'] }}</h2>
                <ol class="steps">
                    @foreach ($service['steps'] as $step)
                        <li>{{ $step }}</li>
                    @endforeach
                </ol>
            </div>
        </section>
    @endif

    {{-- SERVICE AREAS --}}
    @if (isset($service['areas']))
        <section class="alt">
            <div class="container">
                <h2>{{ $service['areas']['h2'] }}</h2>
                <div class="content-wrapper" style="max-width: 900px; margin: 0 auto;">
                    @foreach (['p1', 'p2', 'p3', 'p4'] as $p)
                        @if (isset($service['areas'][$p]))
                            <p>{{ $service['areas'][$p] }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ABOUT --}}
    @if (isset($service['about']))
        <section>
            <div class="container">
                <h2>{{ $service['about']['h2'] }}</h2>
                <div class="content-wrapper" style="max-width: 900px; margin: 0 auto;">
                    @foreach (['p1', 'p2', 'p3'] as $p)
                        @if (isset($service['about'][$p]))
                            <p>{{ $service['about'][$p] }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA MID --}}
    @if (isset($service['cta_mid']))
        <section class="alt">
            <div class="container">
                <div class="callout callout-cta">
                    <h2>{{ $service['cta_mid']['title'] }}</h2>
                    <p>{{ $service['cta_mid']['text'] }}</p>
                    <x-cta size="lg" />
                </div>
            </div>
        </section>
    @endif

    {{-- FAQ --}}
    @if (!empty($service['faqs']))
        <section>
            <div class="container">
                <h2>{{ $service['faqs_title'] ?? 'الأسئلة الشائعة' }}</h2>
                <x-faq :faqs="$service['faqs']" />
            </div>
        </section>
    @endif

    {{-- FINAL CTA --}}
    <section class="alt">
        <div class="container text-center">
            <h2>تواصل معنا الآن لبيع اثاثك المستعمل</h2>
            <p class="lead">نحن في انتظار اتصالك لتقديم أفضل عرض سعر. {{ $service['name'] ?? 'شراء اثاث مستعمل' }} بجدة
                بكل سهولة.</p>

            <div class="cta-buttons" style="justify-content: center; margin-top: 1.5rem;">
                <a href="{{ route('track.call') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-phone">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                    اتصل الآن: {{ config('site.phone_display') ?? '0551568578' }}
                </a>

                <a href="{{ route('track.whatsapp') }}" class="btn btn-whatsapp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-message-circle">
                        <path
                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                        </path>
                    </svg>
                    واتساب
                </a>
            </div>
        </div>
    </section>

    {{-- RELATED SERVICES --}}
    @if (isset($relatedServices) && $relatedServices->isNotEmpty())
        <section class="alt">
            <div class="container">
                <h2>خدمات ذات صلة</h2>
                @php
                    $routeMap = [
                        'buy-used-furniture' => 'services.furniture',
                        'buy-air-conditioners' => 'services.ac',
                        'buy-restaurant-equipment' => 'services.restaurant',
                        'buy-cafe-equipment' => 'services.cafe',
                        'buy-used-appliances' => 'services.appliances',
                        'buy-hotel-furniture' => 'services.hotel',
                        'buy-warehouse-clearance' => 'services.warehouse',
                        'buy-used-carpets' => 'services.carpets',
                        'buy-palace-furniture' => 'services.palace',
                        'buy-scrap-jeddah' => 'services.scrap',
                        'buy-afsh-jeddah' => 'services.afsh',
                    ];
                @endphp
                <div class="related-services">
                    @foreach ($relatedServices as $related)
                        <a href="{{ route($routeMap[$related['slug']] ?? 'services.index') }}" class="related-card">
                            <h3>{{ $related['name'] }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($related['excerpt'], 100) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
