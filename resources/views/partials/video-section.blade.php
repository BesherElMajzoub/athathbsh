@php
    $youtubeUrl = config('site.youtube_url');
@endphp

<section class="video-section">
    <div class="container">
        <h2>كيف نعمل في جدة؟</h2>
        <p class="section-lead">
            شاهد كيف نقوم بشراء الأثاث والمعدات المستعملة من موقعك في جدة بطريقة احترافية وسريعة.
        </p>

        <div class="video-card">
            @if ($youtubeUrl)
                <div class="video-embed">
                    <iframe width="100%" height="500" src="{{ str_replace('watch?v=', 'embed/', $youtubeUrl) }}"
                        title="فيديو شراء أثاث مستعمل جدة" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy">
                    </iframe>
                </div>
            @else
                <div class="video-placeholder">
                    <div class="video-thumbnail">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                        <p class="video-placeholder-text">سيتم إضافة الفيديو قريباً</p>
                    </div>
                </div>
            @endif
        </div>

        <div class="video-description">
            <p>
                نحن متخصصون في شراء الأثاث والمعدات المستعملة في جدة منذ أكثر من
                {{ config('business.years_experience', '10') }} سنوات.
                عندما تتصل بنا على {{ config('site.phone_display') }}، نصل إلى موقعك في جدة لمعاينة الأثاث أو المعدات
                بشكل مجاني.
                نقوم بتقييم عادل وشفاف، ثم نتفق على السعر. بعد الاتفاق، نقوم بفك وتحميل ونقل جميع القطع بدون أي تكلفة
                إضافية.
                الدفع فوري ونقداً بعد الانتهاء من التحميل. خدمتنا تشمل جميع أنواع الأثاث المنزلي والمكتبي، المكيفات،
                معدات المطاعم والكافيهات، والأجهزة الكهربائية في كافة أنحاء جدة.
            </p>
        </div>

        <div class="video-cta">
            <x-cta size="lg" />
        </div>
    </div>
</section>

{{-- TODO: Add YouTube URL to .env as SITE_YOUTUBE_URL=https://youtube.com/watch?v=XXXXX --}}
