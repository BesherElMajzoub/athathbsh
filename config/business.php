<?php

return [
    'brand_name' => env('BUSINESS_BRAND_NAME', 'شراء أثاث مستعمل في جدة'),
    'city' => env('BUSINESS_CITY', 'جدة'),
    'years_experience' => env('BUSINESS_YEARS_EXPERIENCE', '10'),

    'phone' => env('BUSINESS_PHONE', config('site.phone')),
    'phone_e164' => env('BUSINESS_PHONE_E164', config('site.whatsapp_number_international')),
    'whatsapp' => env('BUSINESS_WHATSAPP', config('site.phone')),
    'country_code' => env('BUSINESS_COUNTRY_CODE', '966'),

    'opening_hours_ar' => env('BUSINESS_OPENING_HOURS_AR', 'يوميًا من 8 صباحًا حتى 10 مساءً'),
    'address_ar' => env('BUSINESS_ADDRESS_AR', 'جدة، المملكة العربية السعودية'),

    'map_embed_src' => env('BUSINESS_MAP_EMBED_SRC', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118830.37526435773!2d39.11029279092408!3d21.54333332560731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737bfeff0!2sJeddah!5e0!3m2!1sen!2ssa!4v1634567890123!5m2!1sen!2ssa'),
    'map_url' => env('BUSINESS_MAP_URL', config('site.google_map_url')),

    'leads_email' => env('BUSINESS_LEADS_EMAIL'),
];
