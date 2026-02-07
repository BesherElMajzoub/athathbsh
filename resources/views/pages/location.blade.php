@extends('layouts.app')

@section('content')
    <section class="hero-page">
        <div class="container">
            <h1>موقعنا في جدة</h1>
            <p class="lead">نغطي جميع أحياء جدة ونصلك أينما كنت لتقييم وشراء الأثاث المستعمل.</p>
        </div>
    </section>

    <section class="location-section">
        <div class="container">
            <div class="location-grid">
                <div class="map-container">
                    <iframe src="{{ config('business.map_embed_src') }}" width="100%" height="450" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="location-details">
                    <div class="card location-card">
                        <h2>تغطية شاملة لجميع أحياء جدة</h2>
                        <p>
                            نحن نتواجد بالقرب منك في جميع مناطق جدة: الشمال، الجنوب، الشرق، والغرب.
                            فريقنا الجوال جاهز للوصول إليك في أسرع وقت للمعاينة والتقييم المجاني.
                        </p>

                        <ul class="check-list">
                            <li>شمال جدة (أبحر، البساتين، المرجان...)</li>
                            <li>وسط جدة (الروضة، السلامة، الحمراء...)</li>
                            <li>جنوب جدة (الجامعة، الثغر، الفيحاء...)</li>
                            <li>شرق جدة (الصفا، المروة، السامر...)</li>
                        </ul>

                        <div class="cta-buttons" style="margin-top: 2rem;">
                            <a href="{{ config('business.map_url') }}" target="_blank" class="btn btn-primary">
                                فتح في خرائط جوجل
                            </a>
                            <x-cta size="md" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
