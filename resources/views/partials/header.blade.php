<div class="utility-bar">
    <div class="container utility-inner">
        <div class="utility-left">
            <a class="utility-link" href="{{ $business['tel_uri'] }}">اتصال: {{ $business['phone'] }}</a>
            <span class="utility-sep">•</span>
            <span class="utility-muted">{{ $business['opening_hours_ar'] }}</span>
        </div>
        <div class="utility-right">
            <a class="btn btn-ghost btn-sm" href="{{ \App\Support\Business::whatsappLink('السلام عليكم، أحتاج تقييم مجاني.') }}">واتساب</a>
        </div>
    </div>
</div>

<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="{{ route('home') }}" aria-label="{{ $business['brand_name'] }}">
            <span class="logo-mark" aria-hidden="true"></span>
            <span class="brand-name">{{ $business['brand_name'] }}</span>
        </a>

        <nav class="nav" aria-label="التنقل الرئيسي">
            <a href="{{ route('home') }}">الرئيسية</a>
            <a href="{{ route('services.index') }}">الخدمات</a>
            <a href="{{ route('areas.index') }}">مناطق الخدمة</a>
            <a href="{{ route('faq') }}">الأسئلة الشائعة</a>
            <a href="{{ route('about') }}">من نحن</a>
            <a href="{{ route('contact.show') }}">تواصل معنا</a>
        </nav>

        <div class="header-cta">
            <a class="btn btn-primary btn-sm" href="{{ $business['tel_uri'] }}">اتصل الآن</a>
            <a class="btn btn-outline btn-sm" href="{{ \App\Support\Business::whatsappLink('السلام عليكم، أحتاج تقييم مجاني.') }}">واتساب</a>
        </div>

        <button
            class="menu-toggle"
            type="button"
            data-menu-toggle
            aria-expanded="false"
            aria-controls="mobileDrawer"
            aria-label="فتح القائمة"
        >
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </button>
    </div>

    <div id="mobileDrawer" class="mobile-drawer" hidden>
        <nav class="mobile-nav" aria-label="القائمة">
            <a href="{{ route('home') }}">الرئيسية</a>
            <a href="{{ route('services.index') }}">الخدمات</a>
            <a href="{{ route('areas.index') }}">مناطق الخدمة</a>
            <a href="{{ route('faq') }}">الأسئلة الشائعة</a>
            <a href="{{ route('about') }}">من نحن</a>
            <a href="{{ route('contact.show') }}">تواصل معنا</a>
        </nav>
        <div class="mobile-cta">
            <a class="btn btn-primary btn-lg" href="{{ $business['tel_uri'] }}">اتصل الآن</a>
            <a class="btn btn-outline btn-lg" href="{{ \App\Support\Business::whatsappLink('السلام عليكم، أحتاج تقييم مجاني.') }}">واتساب</a>
        </div>
    </div>
</header>

