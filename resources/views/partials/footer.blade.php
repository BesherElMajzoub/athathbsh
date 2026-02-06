<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <div class="footer-title">{{ $business['brand_name'] }}</div>
            <p class="footer-text">
                نشتري الأثاث المستعمل في {{ $business['city'] }} بتقييم مجاني ونقل وتحميل ودفع فوري بعد الاتفاق.
            </p>
            <div class="footer-actions">
                <a class="btn btn-primary btn-sm" href="{{ $business['tel_uri'] }}">اتصل</a>
                <a class="btn btn-outline btn-sm" href="{{ \App\Support\Business::whatsappLink('السلام عليكم، أحتاج تقييم مجاني.') }}">واتساب</a>
            </div>
        </div>

        <div class="footer-links">
            <div class="footer-heading">روابط</div>
            <a href="{{ route('services.index') }}">الخدمات</a>
            <a href="{{ route('areas.index') }}">مناطق الخدمة</a>
            <a href="{{ route('faq') }}">الأسئلة الشائعة</a>
            <a href="{{ route('about') }}">من نحن</a>
            <a href="{{ route('contact.show') }}">تواصل معنا</a>
        </div>

        <div class="footer-links">
            <div class="footer-heading">خدمات سريعة</div>
            @foreach (array_slice(config('services', []), 0, 6, true) as $slug => $service)
                <a href="{{ route('services.show', ['serviceSlug' => $slug]) }}">{{ $service['name'] }}</a>
            @endforeach
        </div>

        <div class="footer-links">
            <div class="footer-heading">قانوني</div>
            <a href="{{ route('legal.privacy') }}">سياسة الخصوصية</a>
            <a href="{{ route('legal.terms') }}">الشروط والأحكام</a>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>© {{ date('Y') }} {{ $business['brand_name'] }} — {{ $business['city'] }}</span>
        <span class="footer-sep">•</span>
        <a href="{{ route('sitemap') }}">Sitemap</a>
    </div>
</footer>

