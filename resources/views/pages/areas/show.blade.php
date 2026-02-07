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
            <p class="lead">{{ $area['description'] }}</p>
            <x-cta size="lg" />
        </div>
    </section>

    @if (!empty($area['districts']))
        <section class="alt">
            <div class="container">
                <h2>أحياء {{ $area['name'] }} التي نخدمها</h2>
                <div class="chips">
                    @foreach ($area['districts'] as $neighborhood)
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
                <a href="{{ route('services.ac') }}" class="service-mini-card">شراء مكيفات</a>
                <a href="{{ route('services.restaurant') }}" class="service-mini-card">شراء معدات مطاعم</a>
                <a href="{{ route('services.cafe') }}" class="service-mini-card">شراء معدات كافيهات</a>
                <a href="{{ route('services.appliances') }}" class="service-mini-card">شراء أجهزة كهربائية</a>
                <a href="{{ route('services.hotel') }}" class="service-mini-card">شراء أثاث فنادق</a>
                <a href="{{ route('services.warehouse') }}" class="service-mini-card">تفريغ مستودعات</a>
            </div>
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <div class="callout callout-cta">
                <h2>في {{ $area['name'] }}؟</h2>
                <p>تواصل معنا الآن للحصول على تقييم مجاني</p>
                <div class="cta-buttons" style="justify-content: center;">
                    <x-cta size="lg" />
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>مناطق أخرى في جدة</h2>
            <div class="chips">
                @if ($areaSlug !== 'north')
                    <a class="chip" href="{{ route('areas.north') }}">شمال جدة</a>
                @endif
                @if ($areaSlug !== 'south')
                    <a class="chip" href="{{ route('areas.south') }}">جنوب جدة</a>
                @endif
                @if ($areaSlug !== 'east')
                    <a class="chip" href="{{ route('areas.east') }}">شرق جدة</a>
                @endif
                @if ($areaSlug !== 'west')
                    <a class="chip" href="{{ route('areas.west') }}">غرب جدة</a>
                @endif
            </div>
        </div>
    </section>
@endsection
