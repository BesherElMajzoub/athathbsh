<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $business = config('business');
        $site = config('site');

        $seo = [
            'title' => 'من نحن | شراء أثاث مستعمل بالرياض',
            'description' => 'نحن متخصصون في شراء الأثاث المستعمل في الرياض منذ أكثر من ' . ($business['years_experience'] ?? '10') . ' سنوات. نوفر تقييم مجاني ونقل ودفع فوري.',
        ];

        return view('pages.about', compact('business', 'site', 'seo'));
    }

    public function location(): View
    {
        $business = config('business');
        $site = config('site');

        $seo = [
            'title' => 'موقعنا | شراء أثاث مستعمل بالرياض',
            'description' => 'موقعنا في الرياض. نغطي جميع مناطق الرياض لشراء الأثاث المستعمل.',
        ];

        return view('pages.location', compact('business', 'site', 'seo'));
    }
}
