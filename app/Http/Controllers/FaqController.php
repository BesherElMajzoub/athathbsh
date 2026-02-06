<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $business = config('business');

        $seo = [
            'title' => "الأسئلة الشائعة | شراء أثاث مستعمل {$business['city']} — {$business['brand_name']}",
            'description' => "إجابات مختصرة وواضحة عن تقييم الأسعار، النقل، مناطق الخدمة في {$business['city']}، وما الذي نشتريه. تواصل معنا مباشرة للمعاينة.",
        ];

        return view('pages.faq', [
            'seo' => $seo,
            'faqs' => config('faqs', []),
        ]);
    }
}

