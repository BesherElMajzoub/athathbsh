@php
    $business = config('business');
    $site = config('site');
@endphp

<header class="header">
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="logo" aria-label="الصفحة الرئيسية">
            <span class="logo-text">{{ $business['brand_name'] }}</span>
        </a>

        <nav class="nav-desktop" aria-label="القائمة الرئيسية">
            <ul class="nav-list">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">الرئيسية</a>
                </li>
                <li class="nav-dropdown">
                    <a href="{{ route('services.index') }}"
                        class="{{ request()->routeIs('services.*') ? 'active' : '' }}">الخدمات</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('services.furniture') }}">شراء أثاث مستعمل</a></li>
                        <li><a href="{{ route('services.ac') }}">شراء مكيفات مستعملة</a></li>
                        <li><a href="{{ route('services.appliances') }}">شراء أجهزة كهربائية</a></li>
                        <li><a href="{{ route('services.kitchens') }}">شراء مطابخ مستعملة</a></li>
                        <li><a href="{{ route('services.restaurant') }}">شراء معدات مطاعم</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <span>المناطق</span>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('areas.north') }}">شمال الرياض</a></li>
                        <li><a href="{{ route('areas.south') }}">جنوب الرياض</a></li>
                        <li><a href="{{ route('areas.east') }}">شرق الرياض</a></li>
                        <li><a href="{{ route('areas.west') }}">غرب الرياض</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">من
                        نحن</a></li>
                <li><a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">الأسئلة
                        الشائعة</a></li>
                <li><a href="{{ route('contact.show') }}"
                        class="{{ request()->routeIs('contact.*') ? 'active' : '' }}">تواصل معنا</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <a href="{{ route('track.call') }}" class="btn btn-call btn-sm" aria-label="اتصل الآن">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="currentColor" aria-hidden="true">
                    <path
                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                </svg>
                <span>{{ $site['phone_display'] }}</span>
            </a>
        </div>

        <button class="nav-toggle" aria-label="فتح القائمة" aria-expanded="false" aria-controls="mobile-nav">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="nav-mobile" id="mobile-nav" aria-label="القائمة الجوال" hidden>
            <ul class="nav-list">
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><a href="{{ route('services.index') }}">الخدمات</a></li>
                <li><a href="{{ route('services.furniture') }}">شراء أثاث مستعمل</a></li>
                <li><a href="{{ route('services.ac') }}">شراء مكيفات</a></li>
                <li><a href="{{ route('areas.north') }}">شمال الرياض</a></li>
                <li><a href="{{ route('areas.south') }}">جنوب الرياض</a></li>
                <li><a href="{{ route('about') }}">من نحن</a></li>
                <li><a href="{{ route('faq') }}">الأسئلة الشائعة</a></li>
                <li><a href="{{ route('contact.show') }}">تواصل معنا</a></li>
            </ul>
        </nav>
    </div>
</header>
