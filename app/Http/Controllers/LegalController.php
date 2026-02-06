<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LegalController extends Controller
{
    public function privacy(): View
    {
        $business = config('business');

        $seo = [
            'title' => "سياسة الخصوصية | {$business['brand_name']}",
            'description' => "تعرف على كيفية جمع واستخدام وحماية بياناتك عند التواصل مع {$business['brand_name']}.",
        ];

        return view('pages.legal.privacy', [
            'seo' => $seo,
        ]);
    }

    public function terms(): View
    {
        $business = config('business');

        $seo = [
            'title' => "الشروط والأحكام | {$business['brand_name']}",
            'description' => "شروط وأحكام استخدام خدمات {$business['brand_name']} لشراء المستعمل.",
        ];

        return view('pages.legal.terms', [
            'seo' => $seo,
        ]);
    }
}

