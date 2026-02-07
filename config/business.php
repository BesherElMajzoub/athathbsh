<?php

return [
    'brand_name' => env('BUSINESS_BRAND_NAME', 'شراء أثاث مستعمل بجدة'),
    'city' => env('BUSINESS_CITY', 'جدة'),
    'years_experience' => env('BUSINESS_YEARS_EXPERIENCE', '10'),

    'phone' => env('BUSINESS_PHONE', config('site.phone')),
    'phone_e164' => env('BUSINESS_PHONE_E164', config('site.whatsapp_number_international')),
    'whatsapp' => env('BUSINESS_WHATSAPP', config('site.phone')),
    'country_code' => env('BUSINESS_COUNTRY_CODE', '966'),

    'opening_hours_ar' => env('BUSINESS_OPENING_HOURS_AR', 'يوميًا من 8 صباحًا حتى 10 مساءً'),
    'address_ar' => env('BUSINESS_ADDRESS_AR', 'جدة، المملكة العربية السعودية'),

    'map_embed_src' => env('BUSINESS_MAP_EMBED_SRC', 'https://maps.app.goo.gl/uuEaJ5v91AfWCXYq6'),
    'map_url' => env('BUSINESS_MAP_URL', config('site.google_map_url')),

    'leads_email' => env('BUSINESS_LEADS_EMAIL'),
];
