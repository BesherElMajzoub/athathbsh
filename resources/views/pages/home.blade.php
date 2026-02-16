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
                <span class="eyebrow">شراء اثاث مستعمل في جدة</span>
                <h1>شراء أثاث مستعمل {{ $business['city'] }}</h1>
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
                        <li>خبرة {{ $business['years_experience'] ?? '10' }}+ سنة في شراء الاثاث المستعمل بجدة</li>
                        <li>استجابة سريعة لشراء الاثاث المستعمل داخل جدة </li>
                        <li> تغطية أحياء جدة بشكل واسع </li>
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
                نشتري جميع انواع الاثاث المستعمل والاجهزة في جدة </p>
            <div class="services-visual-grid">
                {{-- Service 1: Furniture --}}
                <a href="{{ route('services.furniture') }}" class="service-visual-card">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('assets/img/Buying-home-furniture_10_11zon.webp') }}"
                            alt="شراء أثاث مستعمل في جدة" width="400" height="300" loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3>شراء اثاث مستعمل جدة</h3>
                        <p>شتري جميع غرف النوم والمطابخ ومعدات المطاعم ونشتري الاثاث المستعمل بجدة بجميع انواعه بافضل
                            الاسعار</p>
                    </div>
                </a>

                {{-- Service 2: Air Conditioners --}}
                <a href="{{ route('services.ac') }}" class="service-visual-card">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('assets/img/Used-air-conditioners_27_11zon.webp') }}"
                            alt="شراء مكيفات مستعملة في جدة" width="400" height="300" loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3>شراء مكيفات مستعملة جدة</h3>
                        <p>نشتري التكييفات المستعملة الشباك والسبليت والمركزي بجميع حالاته</p>
                    </div>
                </a>

                {{-- Service 3: Appliances --}}
                <a href="{{ route('services.appliances') }}" class="service-visual-card">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('assets/img/Buying-used-refrigerators_17_11zon.webp') }}"
                            alt="شراء أجهزة كهربائية مستعملة بجدة" width="400" height="300" loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3>شراء الاجهزة الكهربائية المستعملة بجدة</h3>
                        <p>شراء ثلاجات، غسالات، وأفران مستعملة ونقل فوري.</p>
                    </div>
                </a>

                {{-- Service 4: Restaurant Equipment --}}
                <a href="{{ route('services.restaurant') }}" class="service-visual-card">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('assets/img/Buying-restaurant-equipment_14_11zon.webp') }}"
                            alt="شراء معدات مطاعم مستعملة جدة" width="400" height="300" loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3>شراء معدات مطاعم بجدة</h3>
                        <p>نشتري معدات المطاعم المستعملة والكافيهات وأدوات المطبخ المستعملة كاملة.</p>
                    </div>
                </a>

                {{-- Service 5: Palace Furniture --}}
                <a href="{{ route('services.palace') }}" class="service-visual-card">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('assets/img/Buying-palace-furniture_12_11zon.webp') }}"
                            alt="شراء أثاث قصور وفلل بجدة" width="400" height="300" loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3> شراء اثاث قصور مستعملة بجدة</h3>
                        <p>خدمة خاصة لشراء أثاث الفلل والقصور والفنادق في جدة.</p>
                    </div>
                </a>

                {{-- Service 6: Hotel Furniture --}}
                <a href="{{ route('services.hotel') }}" class="service-visual-card">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('assets/img/Buying-hotel-furniture_11_11zon.webp') }}"
                            alt="شراء أثاث فنادق وشقق مفروشة بجدة" width="400" height="300" loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3>شراءأثاث فنادق في جدة فورا </h3>
                        <p>نشتري أثاث الفنادق والشقق المفروشة وتصفية المستودعات المستعملة فورا </p>
                    </div>
                </a>

                {{-- Service 7: Scrap --}}
                <a href="{{ route('services.scrap') }}" class="service-visual-card">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('assets/img/move furntur_21_11zon.webp') }}" alt="شراء سكراب وخردة بجدة"
                            width="400" height="300" loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3> شراء سكراب في جدة</h3>
                        <p>نشتري الحديد والنحاس والألمنيوم والكيابل بأعلى سعر شراء سكراب مستعمل فورا</p>
                    </div>
                </a>

                {{-- Service 8: Afsh (Used Furniture) --}}
                <a href="{{ route('services.afsh') }}" class="service-visual-card">
                    <div class="service-img-wrapper">
                        <img src="{{ asset('assets/img/old furn_22_11zon.webp') }}" alt="شراء عفش مستعمل بجدة"
                            width="400" height="300" loading="lazy">
                    </div>
                    <div class="service-content">
                        <h3>شراء عفش مستعمل في جدة</h3>
                        <p>نشتري العفش المستعمل بجميع أنواعه: غرف نوم، .</p>
                    </div>
                </a>
            </div>
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
