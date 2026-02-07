@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness(config('business')), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::faqPage($faqs), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="hero hero-page">
        <div class="container">
            <h1>الأسئلة الشائعة</h1>
            <p class="lead">إجابات على أكثر الأسئلة شيوعًا حول خدمات شراء الأثاث المستعمل في الرياض</p>
        </div>
    </section>

    <section>
        <div class="container">
            <x-faq :faqs="$faqs" />
        </div>
    </section>

    <section class="alt">
        <div class="container">
            <div class="callout callout-cta">
                <h2>لم تجد إجابتك؟</h2>
                <p>تواصل معنا مباشرة وسنجيب على جميع استفساراتك</p>
                <x-cta size="lg" />
            </div>
        </div>
    </section>
@endsection
