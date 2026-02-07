@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness(config('business')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="hero hero-page">
        <div class="container">
            <h1>خدماتنا</h1>
            <p class="lead">نشتري جميع أنواع الأثاث والأجهزة المستعملة في الرياض مع تقييم مجاني ودفع فوري</p>
        </div>
    </section>

    <section>
        <div class="container">
            @php
                $routeMap = [
                    'buy-used-furniture' => 'services.furniture',
                    'buy-air-conditioners' => 'services.ac',
                    'buy-restaurant-equipment' => 'services.restaurant',
                    'buy-used-kitchens' => 'services.kitchens',
                    'buy-used-appliances' => 'services.appliances',
                ];
            @endphp
            <div class="services-grid">
                @foreach ($services as $slug => $service)
                    @if (is_array($service) && isset($service['name']))
                        <a href="{{ route($routeMap[$slug] ?? 'services.index') }}" class="service-card">
                            <h2>{{ $service['name'] }}</h2>
                            <p>{{ $service['excerpt'] ?? '' }}</p>
                            <span class="card-link">اعرف المزيد ←</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <div class="callout callout-cta">
                <h2>تواصل معنا الآن</h2>
                <p>احصل على تقييم مجاني للأثاث المستعمل</p>
                <x-cta size="lg" />
            </div>
        </div>
    </section>
@endsection
