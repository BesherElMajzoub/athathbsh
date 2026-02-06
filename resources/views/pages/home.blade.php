@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness($business), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    @php
        $years = trim((string) ($business['years_experience'] ?? ''));
        $trustLine = $years !== '' ? "خبرة {$years}+ سنة" : 'خبرة في شراء المستعمل';
    @endphp

    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-copy">
                <span class="eyebrow">شراء أثاث مستعمل</span>
                <h1>شراء أثاث مستعمل في {{ $business['city'] }}</h1>
                <p class="lead">
                    إذا كنت تبحث عن جهة تشتري الأثاث المستعمل في {{ $business['city'] }} بسرعة وبسعر مناسب،
                    نحن نصل لموقعك للتقييم والشراء مع نقل وتحميل بعد الاتفاق.
                </p>

                <x-cta
                    size="lg"
                    whatsappText="السلام عليكم، عندي أثاث مستعمل للبيع في {{ $business['city'] }} وأحتاج تقييم مجاني."
                />

                <div class="micro-copy">
                    <span>تقييم مجاني</span>
                    <span>نقل وتحميل</span>
                    <span>دفع فوري</span>
                </div>
            </div>

            <div class="hero-panel">
                <div class="panel-card">
                    <div class="panel-title">لماذا {{ $business['brand_name'] }}؟</div>
                    <ul class="panel-list">
                        <li>{{ $trustLine }}</li>
                        <li>استجابة سريعة داخل {{ $business['city'] }}</li>
                        <li>تغطية أحياء {{ $business['city'] }} بشكل واسع</li>
                        <li>تسعير واضح حسب الحالة والكمية</li>
                    </ul>
                    <a class="btn btn-ghost btn-sm" href="{{ route('areas.index') }}">شاهد مناطق الخدمة</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>خدماتنا</h2>
            <p class="section-lead">
                صفحات خدمات مستقلة ومحسّنة للبحث، مع أسئلة شائعة وروابط داخلية تساعدك على الوصول للخدمة المناسبة بسرعة.
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
                <div class="callout-title">تبحث عن “أرقام شراء الأثاث المستعمل بجدة”؟</div>
                <div class="callout-text">اضغط اتصال أو واتساب، وراح نرد عليك بسرعة ونرتب المعاينة.</div>
                <x-cta size="sm" whatsappText="السلام عليكم، أحتاج تقييم مجاني للأثاث المستعمل في {{ $business['city'] }}." />
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>مناطق الخدمة في {{ $business['city'] }}</h2>
            <p class="section-lead">
                نغطي {{ $business['city'] }} (شمال/جنوب/شرق/وسط) ونصل لموقعك للمعاينة والشراء.
            </p>
            <div class="chips">
                @foreach (array_slice($areas, 0, 10, true) as $slug => $area)
                    <a class="chip" href="{{ route('areas.show', ['areaSlug' => $slug]) }}">{{ $area['name'] }}</a>
                @endforeach
                <a class="chip chip-primary" href="{{ route('areas.index') }}">كل الأحياء</a>
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
