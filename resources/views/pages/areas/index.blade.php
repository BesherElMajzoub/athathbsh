@extends('layouts.app')

@section('content')
    <section class="page-hero">
        <div class="container">
            <h1>مناطق الخدمة في {{ $business['city'] }}</h1>
            <p class="lead">
                نغطي أحياء {{ $business['city'] }} بشكل واسع ونصل لموقعك للمعاينة والشراء. اختر الحي لمعرفة التفاصيل.
            </p>
            <x-cta size="sm" whatsappText="السلام عليكم، أنا في {{ $business['city'] }} وأحتاج تقييم مجاني. هذا الحي:" />
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <div class="map-card">
                <div class="map-title">خريطة التغطية</div>
                <iframe
                    class="map"
                    src="{{ $business['map_embed_src'] }}"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="خريطة {{ $business['city'] }}"
                ></iframe>
                <div class="map-note">
                    هذه الخريطة لإظهار نطاق الخدمة. نصل لموقع العميل داخل {{ $business['city'] }} للمعاينة والشراء.
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>الأحياء والمناطق</h2>

            @foreach ($areaGroups as $groupName => $slugs)
                <div class="area-group">
                    <h3>{{ $groupName }}</h3>
                    <div class="chips">
                        @foreach ($slugs as $slug)
                            @php($area = $areas[$slug] ?? null)
                            @if ($area)
                                <a class="chip" href="{{ route('areas.show', ['areaSlug' => $slug]) }}">{{ $area['name'] }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <h2>الخدمات المتاحة</h2>
            <x-service-grid :services="config('services', [])" />
        </div>
    </section>
@endsection

