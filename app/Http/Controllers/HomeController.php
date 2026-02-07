<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $business = config('business');
        $site = config('site');
        $services = config('services');
        $areas = config('areas.canonicals');

        // Quick FAQs for homepage
        $quickFaqs = [
            [
                'q' => 'هل التقييم مجاني؟',
                'a' => 'نعم، نوفر تقييم ومعاينة مجانية داخل جدة.',
            ],
            [
                'q' => 'ما هي مناطق جدة التي تغطونها؟',
                'a' => 'نغطي جميع مناطق جدة: شمال وجنوب وشرق وغرب.',
            ],
            [
                'q' => 'هل الدفع فوري؟',
                'a' => 'نعم، الدفع فوري بعد الاتفاق والتنفيذ.',
            ],
        ];

        $seo = [
            'title' => 'شراء أثاث مستعمل بجدة | تقييم مجاني ودفع فوري',
            'description' => 'نشتري الأثاث المستعمل في جدة: غرف نوم، كنب، مجالس، مكيفات، وأجهزة كهربائية. تقييم مجاني ونقل وتحميل ودفع فوري. تواصل الآن.',
        ];

        return view('pages.home', compact('business', 'site', 'services', 'areas', 'quickFaqs', 'seo'));
    }
}
