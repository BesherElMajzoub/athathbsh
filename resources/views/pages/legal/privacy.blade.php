@extends('layouts.app')

@section('content')
    <section class="page-hero">
        <div class="container">
            <h1>سياسة الخصوصية</h1>
            <p class="lead">نحترم خصوصيتك ونستخدم بياناتك فقط للرد على طلبك والتنسيق معك.</p>
        </div>
    </section>

    <section>
        <div class="container content">
            <div class="content-block">
                <h2>ما البيانات التي نجمعها؟</h2>
                <p>قد نجمع بيانات مثل الاسم (اختياري) ورقم الجوال ومحتوى الرسالة عند تعبئة نموذج التواصل.</p>
            </div>

            <div class="content-block">
                <h2>كيف نستخدم البيانات؟</h2>
                <p>نستخدم البيانات للاتصال بك أو الرد عبر واتساب وتقديم تقييم مبدئي أو تحديد موعد معاينة داخل {{ $business['city'] }}.</p>
            </div>

            <div class="content-block">
                <h2>مشاركة البيانات</h2>
                <p>لا نبيع بياناتك ولا نشاركها مع أطراف خارجية إلا إذا كان ذلك مطلوبًا للامتثال للأنظمة.</p>
            </div>

            <div class="content-block">
                <h2>التواصل</h2>
                <p>إذا عندك أي استفسار عن الخصوصية، تواصل معنا عبر صفحة <a class="link" href="{{ route('contact.show') }}">تواصل معنا</a>.</p>
            </div>
        </div>
    </section>
@endsection

