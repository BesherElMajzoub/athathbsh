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
    <section class="hero hero-service">
        <div class="container">
            <span class="eyebrow">{{ $service['hero']['eyebrow'] ?? 'خدماتنا' }}</span>
            <h1>{{ $service['h1'] }}</h1>
            <p class="lead">{{ $service['hero']['lead'] ?? $service['excerpt'] }}</p>
            <x-cta size="lg" />
        </div>
    </section>

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

    @if (!empty($service['subcategories']))
        <section class="alt">
            <div class="container">
                <h2>ماذا نشتري؟</h2>
                <div class="services-grid">
                    @foreach ($service['subcategories'] as $key => $sub)
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

    @if (!empty($service['items']))
        <section class="alt">
            <div class="container">
                <h2>أنواع {{ $service['name'] }} التي نشتريها</h2>
                <div class="chips">
                    @foreach ($service['items'] as $item)
                        <span class="chip">{{ $item }}</span>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="container">
            <h2>كيف نشتري {{ $service['name'] }}؟</h2>
            <ol class="steps">
                <li>تواصل معنا عبر الواتساب أو الاتصال وأرسل صور {{ $service['name'] }} + موقعك في {{ $business['city'] }}.
                </li>
                <li>سنقوم بتقييم مبدئي للسعر وتحديد موعد للمعاينة إذا لزم الأمر.</li>
                <li>الاتفاق على السعر النهائي وموعد النقل المناسب لك.</li>
                <li>فريقنا سيقوم بالفك والنقل والدفع الفوري قبل المغادرة.</li>
            </ol>
        </div>
    </section>

    @if (!empty($service['additional_services']))
        <section>
            <div class="container">
                <h2>خدمات إضافية</h2>
                <ul class="check-list"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    @foreach ($service['additional_services'] as $serviceItem)
                        <li>{{ $serviceItem }}</li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    @if (!empty($service['images']))
        <section>
            <div class="container">
                <h2>صور من أعمالنا</h2>
                <div class="image-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                    @foreach ($service['images'] as $image)
                        <div class="image-item">
                            <img src="{{ asset('assets/img/' . $image['src']) }}" alt="{{ $image['alt'] }}" loading="lazy"
                                width="400" height="300"
                                style="width: 100%; height: auto; border-radius: 8px; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- KEYWORDS_PLACEHOLDER_START --}}
    {{-- KEYWORDS_PLACEHOLDER_END --}}

    @if (!empty($service['faqs']))
        <section class="alt">
            <div class="container">
                <h2>أسئلة شائعة</h2>
                <x-faq :faqs="$service['faqs']" />
            </div>
        </section>
    @endif

    <section>
        <div class="container">
            <div class="callout callout-cta">
                <h2>جاهز للبيع؟</h2>
                <p>تواصل معنا الآن للحصول على تقييم مجاني</p>
                <x-cta size="lg" />
            </div>
        </div>
    </section>

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
