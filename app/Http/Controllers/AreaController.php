<?php

namespace App\Http\Controllers;

use App\Support\Template;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AreaController extends Controller
{
    public function index(): View
    {
        $business = config('business');

        $seo = [
            'title' => "مناطق شراء الأثاث المستعمل {$business['city']} | تغطية الأحياء — {$business['brand_name']}",
            'description' => "نغطي أحياء {$business['city']} (شمال/جنوب/شرق/وسط). اختر الحي لمعرفة تفاصيل الخدمة وروابط الخدمات المتاحة والتواصل السريع.",
        ];

        return view('pages.areas.index', [
            'seo' => $seo,
            'areas' => config('areas.canonicals', []),
            'areaGroups' => config('areas.groups', []),
        ]);
    }

    public function show(string $areaSlug): View|RedirectResponse
    {
        $aliases = config('areas.aliases', []);
        if (isset($aliases[$areaSlug])) {
            return redirect()->route('areas.show', ['areaSlug' => $aliases[$areaSlug]], 301);
        }

        $area = config("areas.canonicals.$areaSlug");
        abort_if($area === null, 404);

        $business = config('business');

        $vars = [
            'brand' => $business['brand_name'],
            'city' => $business['city'],
            'area' => (string) ($area['name'] ?? $areaSlug),
        ];

        $seo = [
            'title' => Template::render((string) ($area['meta']['title'] ?? ''), $vars),
            'description' => Template::render((string) ($area['meta']['description'] ?? ''), $vars),
        ];

        return view('pages.areas.show', [
            'seo' => $seo,
            'area' => $area,
            'areaSlug' => $areaSlug,
            'services' => config('services', []),
        ]);
    }
}

