<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AreaController extends Controller
{
    public function index(): View
    {
        $areas = config('areas.canonicals');
        $business = config('business');

        $seo = [
            'title' => 'مناطق الخدمة في الرياض | شراء أثاث مستعمل',
            'description' => 'نغطي جميع مناطق الرياض: شمال وجنوب وشرق وغرب. شراء أثاث مستعمل مع تقييم مجاني ونقل ودفع فوري.',
        ];

        return view('pages.areas.index', compact('areas', 'business', 'seo'));
    }

    public function show(string $areaSlug): View
    {
        $areas = config('areas.canonicals');
        $area = $areas[$areaSlug] ?? null;

        if (!$area) {
            abort(404);
        }

        $business = config('business');
        $site = config('site');

        $seo = [
            'title' => $area['meta']['title'] ?? "شراء أثاث مستعمل {$area['name']}",
            'description' => $area['meta']['description'] ?? $area['intro'],
            'canonical' => url()->current(),
        ];

        return view('pages.areas.show', compact('area', 'areaSlug', 'business', 'site', 'seo'));
    }
}
