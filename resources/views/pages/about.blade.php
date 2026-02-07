@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness(config('business')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="hero hero-page">
        <div class="container">
            <h1>من نحن</h1>
            <p class="lead">خبرة {{ $business['years_experience'] ?? '10' }}+ سنة في شراء الأثاث المستعمل في جدة</p>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="about-content">
                <h2>خدماتنا في جدة</h2>
                <p>
                    نحن متخصصون في شراء الأثاث المستعمل في جدة منذ أكثر من {{ $business['years_experience'] ?? '10' }}
                    سنوات.
                    نقدم خدمة شراء الأثاث والمكيفات والأجهزة الكهربائية المستعملة مع تقييم مجاني ونقل وتحميل ودفع فوري.
                </p>

                <h3>لماذا تختارنا؟</h3>
                <ul class="check-list">
                    <li>خبرة {{ $business['years_experience'] ?? '10' }}+ سنة في السوق السعودي</li>
                    <li>تغطية شاملة لجميع مناطق جدة</li>
                    <li>تقييم مجاني ومعاينة في موقعك</li>
                    <li>أسعار عادلة وشفافة</li>
                    <li>فك ونقل وتحميل بعد الاتفاق</li>
                    <li>دفع فوري بعد الاتفاق</li>
                </ul>

                <h3>نشتري في جدة فقط</h3>
                <p>
                    نركز على خدمة عملائنا في جدة بأعلى جودة. نغطي جميع مناطق جدة:
                    <a href="{{ route('areas.north') }}">شمال جدة</a>،
                    <a href="{{ route('areas.south') }}">جنوب جدة</a>،
                    <a href="{{ route('areas.east') }}">شرق جدة</a>،
                    و<a href="{{ route('areas.west') }}">غرب جدة</a>.
                </p>
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
