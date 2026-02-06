<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $business = config('business');

        $seo = [
            'title' => "من نحن | {$business['brand_name']} لشراء الأثاث المستعمل {$business['city']}",
            'description' => "تعرّف على {$business['brand_name']}: خدمة شراء مستعمل موثوقة في {$business['city']} بتقييم واضح ونقل ودفع فوري. هدفنا تسهيل البيع عليك بسرعة واحترافية.",
        ];

        return view('pages.about', [
            'seo' => $seo,
        ]);
    }

    public function location(): View
    {
        $business = config('business');

        $seo = [
            'title' => "موقعنا | {$business['brand_name']} — شراء مستعمل في {$business['city']}",
            'description' => "خريطة تغطية خدمتنا في {$business['city']} وكيف نصل لموقعك للمعاينة والشراء. تواصل معنا الآن عبر الاتصال أو واتساب.",
        ];

        return view('pages.location', [
            'seo' => $seo,
        ]);
    }
}

