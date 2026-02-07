@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness(config('business')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="hero hero-page">
        <div class="container">
            <h1>مناطق الخدمة في جدة</h1>
            <p class="lead">نغطي جميع أحياء جدة: شمال وجنوب وشرق وغرب. نصل لموقعك للمعاينة والشراء.</p>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="areas-grid">
                @foreach ($areas as $slug => $area)
                    <a href="{{ route('areas.' . $slug) }}" class="area-card">
                        <h2>{{ $area['name'] }}</h2>
                        <p>{{ \Illuminate\Support\Str::limit($area['description'], 120) }}</p>
                        <span class="card-link">اعرف المزيد ←</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <div class="callout callout-cta">
                <h2>تواصل معنا الآن</h2>
                <p>أينما كنت في جدة، نصل إليك للمعاينة والشراء</p>
                <x-cta size="lg" />
            </div>
        </div>
    </section>
@endsection
