<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = config('services', []);
        $areas = config('areas.canonicals', []);

        $business = config('business');

        $seo = [
            'title' => "شراء أثاث مستعمل {$business['city']} | {$business['brand_name']} — تقييم مجاني ونقل ودفع فوري",
            'description' => "نشتري الأثاث المستعمل في {$business['city']} بأفضل سعر. تقييم مجاني، فك ونقل، ودفع فوري. اتصل الآن أو راسلنا واتساب لعرض سريع.",
        ];

        return view('pages.home', [
            'seo' => $seo,
            'services' => $services,
            'areas' => $areas,
            'quickFaqs' => array_slice(config('faqs', []), 0, 3),
        ]);
    }
}
