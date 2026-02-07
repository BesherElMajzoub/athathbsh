@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness(config('business')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
    @if (config('site.youtube_url'))
        <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::videoObject(
            'شراء أثاث مستعمل في جدة - ' . config('business.brand_name'),
            'نشتري الأثاث المستعمل في جدة بأفضل الأسعار مع خدمة النقل والفك المجاني.',
            date('Y-m-d'),
            asset('assets/img/video-thumb.jpg'),
            config('site.youtube_url')
        ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
    @endif
@endpush



@section('content')
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-copy">
                <span class="eyebrow">شراء أثاث مستعمل</span>
                <h1>شراء أثاث مستعمل في {{ $business['city'] }}</h1>
                <p class="lead">
                    إذا كنت تبحث عن جهة تشتري الأثاث المستعمل في {{ $business['city'] }} بسرعة وبسعر مناسب،
                    نحن نصل لموقعك للتقييم والشراء مع نقل وتحميل بعد الاتفاق.
                </p>

                <x-cta size="lg" />

                <div class="micro-copy">
                    <span>تقييم مجاني</span>
                    <span>نقل وتحميل</span>
                    <span>دفع فوري</span>
                </div>
            </div>

            <div class="hero-panel">
                <div class="panel-card">
                    <div class="panel-title">لماذا تختارنا؟</div>
                    <ul class="panel-list">
                        <li>خبرة {{ $business['years_experience'] ?? '10' }}+ سنة في شراء المستعمل</li>
                        <li>استجابة سريعة داخل {{ $business['city'] }}</li>
                        <li>تغطية أحياء {{ $business['city'] }} بشكل واسع</li>
                        <li>تسعير واضح حسب الحالة والكمية</li>
                    </ul>
                    <a class="btn btn-ghost btn-sm" href="{{ route('areas.north') }}">شاهد مناطق الخدمة</a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.video-section')

    <section>
        <div class="container">
            <h2>خدماتنا</h2>
            <p class="section-lead">
                نشتري جميع أنواع الأثاث والأجهزة المستعملة في {{ $business['city'] }} مع تقييم مجاني وخدمة نقل ودفع فوري.
            </p>
            <x-service-grid :services="$services" />
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <h2>كيف نشتري منك؟</h2>
            <ol class="steps">
                <li>تواصل اتصال/واتساب وأرسل صور الأغراض + الحي داخل {{ $business['city'] }}.</li>
                <li>نقدّم تقييم مبدئي ونحدد معاينة مجانية إذا لزم.</li>
                <li>اتفاق واضح على السعر حسب الحالة والكمية.</li>
                <li>فك/تحميل/نقل + دفع فوري بعد الاتفاق.</li>
            </ol>

            <div class="callout">
                <div class="callout-title">تبحث عن "أرقام شراء الأثاث المستعمل بجدة"؟</div>
                <div class="callout-text">اضغط اتصال أو واتساب، وراح نرد عليك بسرعة ونرتب المعاينة.</div>
                <x-cta size="sm" />
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>مناطق الخدمة في {{ $business['city'] }}</h2>
            <p class="section-lead">
                نغطي {{ $business['city'] }} (شمال/جنوب/شرق/غرب) ونصل لموقعك للمعاينة والشراء.
            </p>
            <div class="chips">
                <a class="chip" href="{{ route('areas.north') }}">شمال جدة</a>
                <a class="chip" href="{{ route('areas.south') }}">جنوب جدة</a>
                <a class="chip" href="{{ route('areas.east') }}">شرق جدة</a>
                <a class="chip" href="{{ route('areas.west') }}">غرب جدة</a>
            </div>
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <h2>أسئلة سريعة</h2>
            <x-faq :faqs="$quickFaqs" />
            <div class="section-actions">
                <a class="btn btn-ghost btn-sm" href="{{ route('faq') }}">كل الأسئلة الشائعة</a>
            </div>
        </div>
    </section>
@endsection
