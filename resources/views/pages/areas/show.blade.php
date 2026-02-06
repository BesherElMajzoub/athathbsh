@extends('layouts.app')

@section('content')
    @php
        $vars = ['brand' => $business['brand_name'], 'city' => $business['city'], 'area' => $area['name']];
        $waText = "السلام عليكم، أنا في {$area['name']} وأحتاج تقييم مجاني لشراء الأثاث المستعمل.";
    @endphp

    <section class="page-hero">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">الرئيسية</a>
                <span>/</span>
                <a href="{{ route('areas.index') }}">مناطق الخدمة</a>
                <span>/</span>
                <span>{{ $area['name'] }}</span>
            </div>

            <h1>شراء أثاث مستعمل في {{ $area['name'] }}</h1>
            <p class="lead">{{ \App\Support\Template::render((string) ($area['intro'] ?? ''), $vars) }}</p>
            <x-cta size="lg" :whatsappText="$waText" />

            @if (!empty($area['highlights']))
                <div class="highlights">
                    @foreach ($area['highlights'] as $text)
                        <div class="highlight">{{ $text }}</div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section>
        <div class="container">
            <h2>الخدمات المتاحة في {{ $area['name'] }}</h2>
            <p class="section-lead">
                اختر الخدمة التي تناسبك، ثم تواصل معنا لتقييم مجاني وخطوات واضحة.
            </p>
            <x-service-grid :services="$services" />
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <h2>خطوات الشراء في {{ $area['name'] }}</h2>
            <ol class="steps">
                <li>أرسل صور الأغراض + الموقع داخل {{ $business['city'] }}.</li>
                <li>نحدد معاينة مجانية إذا احتجنا تأكيد الحالة.</li>
                <li>اتفاق على السعر بشكل واضح.</li>
                <li>نقل وتحميل + دفع فوري بعد الاتفاق.</li>
            </ol>
            <div class="section-actions">
                <a class="btn btn-ghost btn-sm" href="{{ route('contact.show') }}">تواصل معنا</a>
            </div>
        </div>
    </section>
@endsection

