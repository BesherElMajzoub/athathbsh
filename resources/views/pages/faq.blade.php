@extends('layouts.app')

@push('schema')
    @php
        $schemaVars = ['brand' => $business['brand_name'], 'city' => $business['city']];
    @endphp
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness($business), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::faqPage($faqs, $schemaVars), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="page-hero">
        <div class="container">
            <h1>الأسئلة الشائعة</h1>
            <p class="lead">
                إجابات مختصرة وواضحة عن الشراء، التقييم، النقل، ونطاق الخدمة داخل {{ $business['city'] }}.
            </p>
            <x-cta size="sm" whatsappText="السلام عليكم، عندي استفسار بخصوص شراء المستعمل في {{ $business['city'] }}." />
        </div>
    </section>

    <section>
        <div class="container">
            <x-faq :faqs="$faqs" />
        </div>
    </section>
@endsection
