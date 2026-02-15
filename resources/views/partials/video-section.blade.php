@php
    $youtubeUrl = 'https://www.youtube.com/watch?v=FHcyECYrHHE';

    // تحويل أي رابط يوتيوب إلى embed
    parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $ytParams);
    $videoId = $ytParams['v'] ?? null;
@endphp

@once
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lite-youtube-embed@0.3.3/src/lite-yt-embed.css"
            onerror="this.onerror=null;this.href='{{ asset('assets/vendor/lite-youtube/lite-yt-embed.css') }}';">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/lite-youtube-embed@0.3.3/src/lite-yt-embed.js" defer
            onerror="this.onerror=null;this.src='{{ asset('assets/vendor/lite-youtube/lite-yt-embed.js') }}';"></script>
    @endpush
@endonce

<section class="video-section">
    <div class="container">
        <h2>كيف نشتري الاثاث المستعمل بجدة؟</h2>
        <p class="section-lead">
            شاهد كيف نقوم بشراء الأثاث والمعدات المستعملة من موقعك في جدة بطريقة احترافية وسريعة.
        </p>

        <div class="video-card">
            @if ($videoId)
                <div class="video-embed">
                    <lite-youtube videoid="{{ $videoId }}"
                        style="background-image: url('https://i.ytimg.com/vi/{{ $videoId }}/hqdefault.jpg');">
                        <a href="https://www.youtube.com/watch?v={{ $videoId }}" class="lty-playbtn"
                            title="Play Video">
                            <span class="lyt-visually-hidden">Play Video</span>
                        </a>
                    </lite-youtube>

                    {{-- Fallback for when JS is disabled --}}
                    <noscript>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $videoId }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </noscript>

                    {{-- Fallback button if script fails or Youtube blocked --}}
                    <div id="video-fallback-{{ $videoId }}" class="video-fallback-btn"
                        style="display: none; text-align: center; margin-top: 10px;">
                        <a href="https://www.youtube.com/watch?v={{ $videoId }}" target="_blank"
                            rel="nofollow noopener" class="btn btn-outline-primary">
                            فتح الفيديو على يوتيوب
                        </a>
                    </div>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Check if custom element fails to define
        setTimeout(function() {
            if (customElements.get('lite-youtube') === undefined) {
                var fallback = document.getElementById('video-fallback-{{ $videoId }}');
                if (fallback) fallback.style.display = 'block';
            }
        }, 2000);
    });
</script>
