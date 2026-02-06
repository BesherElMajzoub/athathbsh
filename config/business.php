<?php

return [
    'brand_name' => env('BUSINESS_BRAND_NAME', 'أبو رغد'),
    'city' => env('BUSINESS_CITY', 'جدة'),
    'years_experience' => env('BUSINESS_YEARS_EXPERIENCE'),

    // Store as entered (ex: 05XXXXXXXX). We derive tel/WhatsApp links elsewhere.
    'phone' => env('BUSINESS_PHONE', '0500000000'),
    'whatsapp' => env('BUSINESS_WHATSAPP', env('BUSINESS_PHONE', '0500000000')),
    'country_code' => env('BUSINESS_COUNTRY_CODE', '966'),

    'opening_hours_ar' => env('BUSINESS_OPENING_HOURS_AR', 'يوميًا من 8 مساءً حتى 12 ليلًا'),
    'address_ar' => env('BUSINESS_ADDRESS_AR', 'جدة، المملكة العربية السعودية'),

    // Use a placeholder embed until you provide the real Google Maps embed URL.
    'map_embed_src' => env('BUSINESS_MAP_EMBED_SRC', 'https://www.google.com/maps?q=%D8%AC%D8%AF%D8%A9&output=embed'),
    'map_url' => env('BUSINESS_MAP_URL'),

    // Where contact form notifications go (optional). If empty, we store in DB only.
    'leads_email' => env('BUSINESS_LEADS_EMAIL'),
];
