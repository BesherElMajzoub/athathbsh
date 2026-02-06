@extends('layouts.app')

@push('schema')
    @php
        $schemaVars = ['brand' => $business['brand_name'], 'city' => $business['city']];
    @endphp
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness($business), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::service($business, $service, $schemaVars), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
    @if (!empty($service['faqs']))
        <script type="application/ld+json">
            {!! json_encode(\App\Support\Schema::faqPage($service['faqs'], $schemaVars), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
        </script>
    @endif
@endpush

@section('content')
    @php
        $vars = ['brand' => $business['brand_name'], 'city' => $business['city']];
        $h1 = \App\Support\Template::render((string) ($service['h1'] ?? $service['name']), $vars);
        $lead = \App\Support\Template::render((string) ($service['hero']['lead'] ?? ''), $vars);
        $eyebrow = \App\Support\Template::render((string) ($service['hero']['eyebrow'] ?? ''), $vars);
        $waText = \App\Support\Template::render((string) ($service['whatsapp_message'] ?? ''), $vars);
    @endphp

    <section class="page-hero">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">الرئيسية</a>
                <span>/</span>
                <a href="{{ route('services.index') }}">الخدمات</a>
                <span>/</span>
                <span>{{ $service['name'] }}</span>
            </div>

            <span class="eyebrow">{{ $eyebrow }}</span>
            <h1>{{ $h1 }}</h1>
            <p class="lead">{{ $lead }}</p>
            <x-cta size="lg" :whatsappText="$waText" />

            @if (!empty($service['highlights']))
                <div class="highlights">
                    @foreach ($service['highlights'] as $text)
                        <div class="highlight">
                            {{ \App\Support\Template::render((string) $text, $vars) }}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section>
        <div class="container content">
            @foreach (($service['sections'] ?? []) as $section)
                <div class="content-block">
                    <h2>{{ $section['title'] ?? '' }}</h2>

                    @foreach (($section['paragraphs'] ?? []) as $p)
                        <p>{{ \App\Support\Template::render((string) $p, $vars) }}</p>
                    @endforeach

                    @if (!empty($section['bullets']))
                        <ul class="bullets">
                            @foreach ($section['bullets'] as $b)
                                <li>{{ \App\Support\Template::render((string) $b, $vars) }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach

            <div class="callout">
                <div class="callout-title">تواصل سريع</div>
                <div class="callout-text">
                    أرسل صور الأغراض + الحي داخل {{ $business['city'] }}، ونرتب لك تقييم مجاني وخطوات واضحة.
                </div>
                <x-cta size="sm" :whatsappText="$waText" />
            </div>
        </div>
    </section>

    @if (!empty($service['faqs']))
        <section class="alt">
            <div class="container">
                <h2>أسئلة شائعة عن الخدمة</h2>
                <x-faq :faqs="$service['faqs']" :vars="$vars" />
            </div>
        </section>
    @endif

    <section>
        <div class="container">
            <h2>خدمات مرتبطة</h2>
            <x-service-grid :services="$relatedServices" />
            <div class="section-actions">
                <a class="btn btn-ghost btn-sm" href="{{ route('areas.index') }}">شاهد مناطق الخدمة</a>
                <a class="btn btn-ghost btn-sm" href="{{ route('contact.show') }}">تواصل معنا</a>
            </div>
        </div>
    </section>
@endsection
