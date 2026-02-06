@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness($business), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="page-hero">
        <div class="container">
            <h1>من نحن</h1>
            <p class="lead">
                نحن {{ $business['brand_name'] }} — نشتري المستعمل في {{ $business['city'] }} بخدمة سريعة، تقييم واضح،
                ونقل وتحميل بعد الاتفاق.
            </p>
            <x-cta size="sm" whatsappText="السلام عليكم، أحتاج تقييم مجاني في {{ $business['city'] }}." />
        </div>
    </section>

    <section>
        <div class="container content">
            <div class="content-block">
                <h2>كيف نعمل؟</h2>
                <p>
                    نبدأ بتواصل بسيط (اتصال أو واتساب) مع صور وموقعك داخل {{ $business['city'] }}. نقيّم بشكل مبدئي،
                    ثم نحدد معاينة مجانية إذا لزم، وبعد الاتفاق نرتب النقل والدفع بشكل مباشر.
                </p>
            </div>

            <div class="content-block">
                <h2>وش يهمنا في التعامل؟</h2>
                <ul class="bullets">
                    <li>وضوح في التقييم والتسعير</li>
                    <li>التزام بالمواعيد قدر الإمكان</li>
                    <li>تنفيذ مرتب بدون إزعاج للعميل</li>
                    <li>سرعة في الرد والتنسيق</li>
                </ul>
            </div>

            <div class="callout">
                <div class="callout-title">جاهز تبدأ؟</div>
                <div class="callout-text">أرسل صور الأثاث/العفش والموقع، ونرتب لك تقييم مجاني.</div>
                <x-cta size="sm" whatsappText="السلام عليكم، هذه صور الأغراض + الحي داخل {{ $business['city'] }}." />
            </div>
        </div>
    </section>
@endsection
