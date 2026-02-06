@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness($business), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="page-hero">
        <div class="container">
            <h1>موقعنا</h1>
            <p class="lead">
                نخدم {{ $business['city'] }} ونصل لموقع العميل للمعاينة والشراء. هذه الخريطة لعرض نطاق الخدمة.
            </p>
            <x-cta size="sm" whatsappText="السلام عليكم، أنا في {{ $business['city'] }} وأحتاج تقييم مجاني." />
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <div class="map-card">
                <div class="map-title">الخريطة</div>
                <iframe
                    class="map"
                    src="{{ $business['map_embed_src'] }}"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="موقع الخدمة - {{ $business['city'] }}"
                ></iframe>
                <div class="map-note">
                    {{ $business['address_ar'] }}
                </div>
            </div>
        </div>
    </section>
@endsection
