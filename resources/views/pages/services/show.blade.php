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
        $serviceImages = [
            'buy-used-furniture' => 'Buying-home-furniture_10_11zon.webp',
            'buy-air-conditioners' => 'Used-air-conditioners_27_11zon.webp',
            'buy-restaurant-equipment' => 'Buying-restaurant-equipment_14_11zon.webp',
            'buy-cafe-equipment' => 'Buying-restaurant-equipment_14_11zon.webp',
            'buy-used-appliances' => 'Buying-used-refrigerators_17_11zon.webp',
            'buy-hotel-furniture' => 'Buying-hotel-furniture_11_11zon.webp',
            'buy-warehouse-clearance' => 'move furntur_21_11zon.webp',
            'buy-used-carpets' => 'Buying-used-bedrooms_15_11zon.webp',
            'buy-palace-furniture' => 'Buying-palace-furniture_12_11zon.webp',
        ];

        $heroImage = $serviceImages[$serviceSlug] ?? ($service['hero']['image'] ?? 'logo.png');

        // نص قصير للـ alt يكون طبيعي
        $heroAlt = $service['hero']['image_alt'] ?? 'خدمة ' . ($service['name'] ?? 'شراء الأثاث') . ' في جدة';

        $hasIntro =
            !empty($service['intro']['h2']) || !empty($service['intro']['p1']) || !empty($service['intro']['p2']);
        $hasFeatures = !empty($service['features']);
        $hasAreas = !empty($service['areas']);
        $hasAbout = !empty($service['about']);
    @endphp

    {{-- HERO --}}
    <section class="hero hero-service" style="padding-bottom: 0;">
        <div class="container mobile-reverse-grid">
            <div class="hero-content">
                <span class="eyebrow">{{ $service['hero']['eyebrow'] ?? 'خدماتنا' }}</span>

                <h1>{{ $service['h1'] }}</h1>

                {{-- أهم 100 كلمة (خليها هنا) --}}
                <p class="lead">
                    {{ $service['hero']['lead'] ?? $service['excerpt'] }}
                </p>

                <div style="display:flex; gap:.75rem; flex-wrap:wrap; align-items:center; margin-top:1rem;">
                    <x-cta size="lg" />
                    @if (!empty($business['phone']))
                        <a class="btn btn-outline" href="tel:{{ $business['phone'] }}" aria-label="اتصال سريع">
                            اتصال سريع
                        </a>
                    @endif
                </div>
            </div>

            <div class="hero-image-container">
                <img src="{{ asset('assets/img/' . $heroImage) }}" alt="{{ $heroAlt }}" loading="lazy" width="640"
                    height="420" class="service-hero-img">
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
                                fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>{{ $highlight }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- INTRO (ليش تبيع لنا؟) --}}
    @if ($hasIntro)
        <section class="alt">
            <div class="container">
                @if (!empty($service['intro']['h2']))
                    <h2>{{ $service['intro']['h2'] }}</h2>
                @else
                    <h2>لماذا تبيع أثاثك لنا؟</h2>
                @endif

                @if (!empty($service['intro']['p1']))
                    <p>{{ $service['intro']['p1'] }}</p>
                @endif
                @if (!empty($service['intro']['p2']))
                    <p>{{ $service['intro']['p2'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- SUBCATEGORIES (ماذا نشتري؟) --}}
    @if (!empty($service['subcategories']))
        <section>
            <div class="container">
                <h2>ماذا نشتري من {{ $service['name'] }}؟</h2>

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

    {{-- FEATURES (مميزات التعامل معنا) --}}
    @if ($hasFeatures)
        <section class="alt">
            <div class="container">
                <h2>{{ $service['features_h3'] ?? 'مميزات التعامل معنا' }}</h2>

                @if (!empty($service['features_intro']))
                    <p class="muted">{{ $service['features_intro'] }}</p>
                @endif

                <div class="services-grid">
                    @foreach ($service['features'] as $feature)
                        <div class="service-card">
                            <div style="display:flex; gap:.75rem; align-items:flex-start;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"
                                    style="margin-top:.2rem;">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <p style="margin:0;">{{ $feature }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ITEMS (أنواع نشتريها) --}}
    @if (!empty($service['items']))
        <section>
            <div class="container">
                <h2>{{ $service['items_h3'] ?? 'أنواع ' . $service['name'] . ' التي نشتريها' }}</h2>
                @if (!empty($service['items_intro']))
                    <p>{{ $service['items_intro'] }}</p>
                @endif

                <div class="chips">
                    @foreach ($service['items'] as $item)
                        <span class="chip">{{ $item }}</span>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- STEPS (كيف نشتري؟) --}}
    <section class="alt">
        <div class="container">
            <h2>{{ $service['steps_h3'] ?? 'خطوات بيع ' . ($service['name'] ?? 'الأثاث') . ' في جدة' }}</h2>
            <ol class="steps">
                @foreach ($service['steps'] ?? [] as $step)
                    <li>{{ $step }}</li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- MID CTA --}}
    @if (!empty($service['cta_mid']))
        <section>
            <div class="container">
                <div class="callout callout-cta">
                    <h2>{{ $service['cta_mid']['title'] ?? 'هل لديك أثاث للبيع؟' }}</h2>
                    <p>{{ $service['cta_mid']['text'] ?? 'تواصل معنا الآن للحصول على تقييم مجاني.' }}</p>
                    <x-cta size="lg" />
                </div>
            </div>
        </section>
    @endif

    {{-- AREAS --}}
    @if ($hasAreas)
        <section class="alt">
            <div class="container">
                <h2>{{ $service['areas']['h2'] ?? 'نخدم جميع أحياء جدة' }}</h2>
                @if (!empty($service['areas']['p1']))
                    <p>{{ $service['areas']['p1'] }}</p>
                @endif
                @if (!empty($service['areas']['p2']))
                    <p>{{ $service['areas']['p2'] }}</p>
                @endif
                @if (!empty($service['areas']['p3']))
                    <p>{{ $service['areas']['p3'] }}</p>
                @endif
                @if (!empty($service['areas']['p4']))
                    <p>{{ $service['areas']['p4'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- ABOUT --}}
    @if ($hasAbout)
        <section>
            <div class="container">
                <h2>{{ $service['about']['h2'] ?? 'من نحن' }}</h2>
                @if (!empty($service['about']['p1']))
                    <p>{{ $service['about']['p1'] }}</p>
                @endif
                @if (!empty($service['about']['p2']))
                    <p>{{ $service['about']['p2'] }}</p>
                @endif
                @if (!empty($service['about']['p3']))
                    <p>{{ $service['about']['p3'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- IMAGES (إن وجدت) --}}
    @if (!empty($service['images']))
        <section class="alt">
            <div class="container">
                <h2>صور من أعمالنا</h2>
                <div class="image-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">
                    @foreach ($service['images'] as $image)
                        <div class="image-item">
                            <img src="{{ asset('assets/img/' . $image['src']) }}" alt="{{ $image['alt'] }}" loading="lazy"
                                width="520" height="360"
                                style="width: 100%; height: auto; border-radius: 12px; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- KEYWORDS (قسم مفيد ومرتب بدون حشو) --}}
    <section>
        <div class="container">
            <h2>كلمات يبحث عنها الناس في جدة</h2>
            <p>
                كثير من العملاء يكتبون مثل: لشراء الأثاث المستعمل، شراء اثاث مستعمل، محلات شراء الاثاث المستعمل،
                يشترون الاثاث المستعمل، يشتري الاثاث المستعمل، ارقام شراء الاثاث المستعمل بجده، رقم شراء اثاث مستعمل،
                وشراء اثاث مستعمل حراج. نحن نغطي هذه الاحتياجات فعلياً بخدمة تقييم سريع ونقل مجاني ودفع فوري، لذلك
                إذا تبحث عن حقين شراء اثاث مستعمل أو رقم يشتري اثاث مستعمل للتواصل السريع—تواصل معنا الآن.
            </p>

            <div class="chips" style="margin-top: .75rem;">
                <span class="chip">لشراء الاثاث المستعمل</span>
                <span class="chip">لشراء الأثاث المستعمل</span>
                <span class="chip">محلات شراء الاثاث المستعمل</span>
                <span class="chip">يشترون اثاث مستعمل</span>
                <span class="chip">ارقام شراء الاثاث المستعمل بجده</span>
                <span class="chip">شراء اثاث مستعمل حراج</span>
                <span class="chip">رقم شراء اثاث مستعمل</span>
                <span class="chip">شركة شراء اثاث مستعمل</span>
                <span class="chip">حقين شراء اثاث مستعمل</span>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    @if (!empty($service['faqs']))
        <section class="alt">
            <div class="container">
                <h2>{{ $service['faqs_title'] ?? 'أسئلة شائعة' }}</h2>
                <x-faq :faqs="$service['faqs']" />
            </div>
        </section>
    @endif

    {{-- FINAL CTA --}}
    <section>
        <div class="container">
            <div class="callout callout-cta">
                <h2>جاهز للبيع؟</h2>
                <p>تواصل معنا الآن للحصول على تقييم مجاني</p>
                <x-cta size="lg" />
            </div>
        </div>
    </section>

    {{-- RELATED --}}
    @if ($relatedServices->isNotEmpty())
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
                    ];
                @endphp

                <div class="related-services">
                    @foreach ($relatedServices as $related)
                        <a href="{{ route($routeMap[$related['slug']] ?? 'services.index') }}" class="related-card">
                            <h3>{{ $related['name'] }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($related['excerpt'], 120) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
