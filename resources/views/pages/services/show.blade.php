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

    @foreach ($service['sections'] ?? [] as $section)
        <section class="{{ $loop->odd ? '' : 'alt' }}">
            <div class="container">
                <h2>{{ $section['title'] }}</h2>
                @if (!empty($section['paragraphs']))
                    @foreach ($section['paragraphs'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                @endif
                @if (!empty($section['bullets']))
                    <ul class="check-list">
                        @foreach ($section['bullets'] as $bullet)
                            <li>{{ $bullet }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    @endforeach

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
                        'buy-used-kitchens' => 'services.kitchens',
                        'buy-used-appliances' => 'services.appliances',
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
