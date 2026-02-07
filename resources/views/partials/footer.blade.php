@php
    $business = config('business');
    $site = config('site');
@endphp

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="logo">{{ $business['brand_name'] }}</a>
                <p>{{ $business['brand_name'] }} - متخصصون في شراء الأثاث المستعمل في {{ $business['city'] }} منذ أكثر
                    من {{ $business['years_experience'] ?? '10' }} سنوات.</p>
            </div>

            <div class="footer-links">
                <h3>الخدمات</h3>
                <ul>
                    <li><a href="{{ route('services.furniture') }}">شراء أثاث مستعمل</a></li>
                    <li><a href="{{ route('services.ac') }}">شراء مكيفات مستعملة</a></li>
                    <li><a href="{{ route('services.restaurant') }}">شراء معدات مطاعم</a></li>
                    <li><a href="{{ route('services.cafe') }}">شراء معدات كافيهات</a></li>
                    <li><a href="{{ route('services.appliances') }}">شراء أجهزة كهربائية</a></li>
                    <li><a href="{{ route('services.hotel') }}">شراء أثاث فنادق</a></li>
                    <li><a href="{{ route('services.warehouse') }}">تفريغ مستودعات</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h3>المناطق</h3>
                <ul>
                    <li><a href="{{ route('areas.north') }}">شمال جدة</a></li>
                    <li><a href="{{ route('areas.south') }}">جنوب جدة</a></li>
                    <li><a href="{{ route('areas.east') }}">شرق جدة</a></li>
                    <li><a href="{{ route('areas.west') }}">غرب جدة</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h3>روابط سريعة</h3>
                <ul>
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('about') }}">من نحن</a></li>
                    <li><a href="{{ route('faq') }}">الأسئلة الشائعة</a></li>
                    <li><a href="{{ route('location') }}">موقعنا في جدة</a></li>
                    <li><a href="{{ route('contact.show') }}">تواصل معنا</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h3>تواصل معنا</h3>
                <div class="contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    <span>{{ $site['phone_display'] }}</span>
                </div>
                <div class="contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                    </svg>
                    <a href="{{ route('location') }}"
                        style="color: rgba(255,255,255,0.7); text-decoration: none;">{{ $business['address_ar'] }}</a>
                </div>
                <div class="contact-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                    </svg>
                    <span>{{ $business['opening_hours_ar'] }}</span>
                </div>
                <x-cta size="sm" />
            </div>
        </div>

        <div class="footer-bottom">
            <p>© {{ date('Y') }} {{ $business['brand_name'] }}. جميع الحقوق محفوظة.</p>
            <div class="footer-legal">
                <a href="{{ route('legal.privacy') }}">سياسة الخصوصية</a>
                <a href="{{ route('legal.terms') }}">الشروط والأحكام</a>
            </div>
        </div>
    </div>
</footer>
