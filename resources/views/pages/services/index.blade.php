@extends('layouts.app')

@section('content')
    <section class="page-hero">
        <div class="container">
            <h1>خدمات شراء المستعمل في {{ $business['city'] }}</h1>
            <p class="lead">
                اختر الخدمة المناسبة، ثم تواصل معنا عبر الاتصال أو واتساب للحصول على تقييم مجاني وخطوات واضحة.
            </p>
            <x-cta size="sm" whatsappText="السلام عليكم، أحتاج تقييم مجاني. هذه الخدمة التي أريدها:" />
        </div>
    </section>

    <section>
        <div class="container">
            <x-service-grid :services="$services" />
        </div>
    </section>
@endsection

