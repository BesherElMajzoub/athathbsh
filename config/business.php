<?php

return [
    'brand_name' => env('BUSINESS_BRAND_NAME', 'شراء أثاث مستعمل بالرياض'),
    'city' => env('BUSINESS_CITY', 'الرياض'),
    'years_experience' => env('BUSINESS_YEARS_EXPERIENCE', '10'),

    'phone' => env('BUSINESS_PHONE', config('site.phone')),
    'whatsapp' => env('BUSINESS_WHATSAPP', config('site.phone')),
    'country_code' => env('BUSINESS_COUNTRY_CODE', '966'),

    'opening_hours_ar' => env('BUSINESS_OPENING_HOURS_AR', 'يوميًا من 8 صباحًا حتى 10 مساءً'),
    'address_ar' => env('BUSINESS_ADDRESS_AR', 'الرياض، المملكة العربية السعودية'),

    'map_embed_src' => env('BUSINESS_MAP_EMBED_SRC', 'https://www.google.com/maps?q=%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6&output=embed'),
    'map_url' => env('BUSINESS_MAP_URL'),

    'leads_email' => env('BUSINESS_LEADS_EMAIL'),
];
