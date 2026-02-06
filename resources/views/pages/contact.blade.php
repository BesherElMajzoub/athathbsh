@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">
        {!! json_encode(\App\Support\Schema::localBusiness($business), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="page-hero">
        <div class="container">
            <h1>تواصل معنا</h1>
            <p class="lead">
                اتصل الآن أو راسل واتساب لشراء الأثاث المستعمل في {{ $business['city'] }}. نرد عليك بأسرع وقت ممكن.
            </p>
            <div class="contact-quick">
                <a class="btn btn-primary btn-lg" href="{{ $business['tel_uri'] }}">اتصال: {{ $business['phone'] }}</a>
                <a class="btn btn-outline btn-lg" href="{{ \App\Support\Business::whatsappLink('السلام عليكم، أحتاج تقييم مجاني في '.$business['city'].'.') }}">واتساب</a>
            </div>
            <div class="contact-hours">ساعات العمل: {{ $business['opening_hours_ar'] }}</div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>نموذج التواصل</h2>
            <p class="section-lead">اكتب بيانات بسيطة، ونرجع لك بسرعة للتقييم والاتفاق.</p>

            @if (session('contact_success'))
                <div class="notice notice-success">
                    تم استلام رسالتك. بنرجع لك بأسرع وقت ممكن.
                </div>
            @endif

            @if ($errors->any())
                <div class="notice notice-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form class="form" method="post" action="{{ route('contact.store') }}">
                @csrf

                <div class="hp" aria-hidden="true">
                    <label>
                        <span>اترك هذا الحقل فارغًا</span>
                        <input name="website" type="text" tabindex="-1" autocomplete="off" value="">
                    </label>
                </div>

                <div class="form-grid">
                    <label class="field">
                        <span class="label">الاسم (اختياري)</span>
                        <input name="name" type="text" autocomplete="name" value="{{ old('name') }}">
                    </label>

                    <label class="field">
                        <span class="label">رقم الجوال</span>
                        <input name="phone" type="tel" autocomplete="tel" inputmode="tel" placeholder="05XXXXXXXX" value="{{ old('phone') }}" required>
                    </label>

                    <label class="field">
                        <span class="label">الخدمة (اختياري)</span>
                        <select name="service_slug">
                            <option value="">اختر الخدمة</option>
                            @foreach ($services as $slug => $service)
                                <option value="{{ $slug }}" @selected(old('service_slug') === $slug)>{{ $service['name'] }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="field">
                        <span class="label">الحي (اختياري)</span>
                        <select name="area_slug">
                            <option value="">اختر الحي</option>
                            @foreach ($areas as $slug => $area)
                                <option value="{{ $slug }}" @selected(old('area_slug') === $slug)>{{ $area['name'] }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="field field-wide">
                        <span class="label">الرسالة (اختياري)</span>
                        <textarea name="message" rows="4" placeholder="مثال: عندي كنب + طاولة + غرفة نوم، وأحتاج تقييم اليوم">{{ old('message') }}</textarea>
                    </label>
                </div>

                <button class="btn btn-primary btn-lg" type="submit">إرسال</button>
                <div class="form-note">
                    بالضغط على “إرسال” أنت توافق على <a class="link" href="{{ route('legal.privacy') }}">سياسة الخصوصية</a>.
                </div>
            </form>
        </div>
    </section>
@endsection
