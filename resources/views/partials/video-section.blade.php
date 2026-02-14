@php
    $youtubeUrl = 'https://www.youtube.com/watch?v=-P73XwPrGGw';

    // تحويل أي رابط يوتيوب إلى embed
    parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $ytParams);
    $videoId = $ytParams['v'] ?? null;
@endphp

<section class="video-section">
    <div class="container">
        <h2>كيف نعمل في جدة؟</h2>
        <p class="section-lead">
            شاهد كيف نقوم بشراء الأثاث والمعدات المستعملة من موقعك في جدة بطريقة احترافية وسريعة.
        </p>

        <div class="video-card">
            @if ($videoId)
                <div class="video-embed">
                    <lite-youtube videoid="{{ $videoId }}"></lite-youtube>
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
                نصل إلى موقعك للمعاينة المجانية، تقييم عادل، فك ونقل بدون أي تكلفة،
                والدفع فوري بعد التحميل.
            </p>
        </div>

        <div class="video-cta">
            <x-cta size="lg" />
        </div>
    </div>
</section>
