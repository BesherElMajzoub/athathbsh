@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness(config('business')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="hero hero-page">
        <div class="container">
            <h1>{{ $area['name'] }}</h1>
            <p class="lead">{{ $area['intro'] }}</p>
            <x-cta size="lg" />
        </div>
    </section>

    @if (!empty($area['highlights']))
        <section>
            <div class="container">
                <div class="highlights">
                    @foreach ($area['highlights'] as $highlight)
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

    @if (!empty($area['neighborhoods']))
        <section class="alt">
            <div class="container">
                <h2>أحياء {{ $area['name'] }} التي نخدمها</h2>
                <div class="chips">
                    @foreach ($area['neighborhoods'] as $neighborhood)
                        <span class="chip">{{ $neighborhood }}</span>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="container">
            <h2>خدماتنا في {{ $area['name'] }}</h2>
            <div class="services-mini">
                <a href="{{ route('services.furniture') }}" class="service-mini-card">شراء أثاث مستعمل</a>
                <a href="{{ route('services.ac') }}" class="service-mini-card">شراء مكيفات مستعملة</a>
                <a href="{{ route('services.appliances') }}" class="service-mini-card">شراء أجهزة كهربائية</a>
                <a href="{{ route('services.kitchens') }}" class="service-mini-card">شراء مطابخ مستعملة</a>
            </div>
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <div class="callout callout-cta">
                <h2>في {{ $area['name'] }}؟</h2>
                <p>تواصل معنا الآن للحصول على تقييم مجاني</p>
                <x-cta size="lg" />
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>مناطق أخرى في الرياض</h2>
            <div class="chips">
                @if ($areaSlug !== 'north')
                    <a class="chip" href="{{ route('areas.north') }}">شمال الرياض</a>
                @endif
                @if ($areaSlug !== 'south')
                    <a class="chip" href="{{ route('areas.south') }}">جنوب الرياض</a>
                @endif
                @if ($areaSlug !== 'east')
                    <a class="chip" href="{{ route('areas.east') }}">شرق الرياض</a>
                @endif
                @if ($areaSlug !== 'west')
                    <a class="chip" href="{{ route('areas.west') }}">غرب الرياض</a>
                @endif
            </div>
        </div>
    </section>
@endsection
