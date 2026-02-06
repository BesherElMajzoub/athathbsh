@extends('layouts.app')

@section('content')
    <section class="page-hero">
        <div class="container">
            <h1>الشروط والأحكام</h1>
            <p class="lead">تنطبق هذه الشروط على استخدامك لخدمات {{ $business['brand_name'] }}.</p>
        </div>
    </section>

    <section>
        <div class="container content">
            <div class="content-block">
                <h2>طبيعة الخدمة</h2>
                <p>نقدم خدمة شراء المستعمل داخل {{ $business['city'] }}. الأسعار تقديرية وتخضع لحالة الأغراض والكمية والمعاينة.</p>
            </div>

            <div class="content-block">
                <h2>الالتزام بالمواعيد</h2>
                <p>نحرص على الالتزام بالمواعيد المتفق عليها قدر الإمكان، وقد تتغير المواعيد بسبب ضغط العمل أو ظروف الطريق.</p>
            </div>

            <div class="content-block">
                <h2>ملكية الأغراض</h2>
                <p>يقر العميل بأن الأغراض المعروضة للبيع مملوكة له أو لديه صلاحية التصرف بها.</p>
            </div>

            <div class="content-block">
                <h2>التواصل</h2>
                <p>للاستفسارات تواصل معنا عبر صفحة <a class="link" href="{{ route('contact.show') }}">تواصل معنا</a>.</p>
            </div>
        </div>
    </section>
@endsection

