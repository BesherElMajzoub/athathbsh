<?php

namespace App\Http\Controllers;

use App\Support\Template;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $business = config('business');
        $services = config('services', []);

        $seo = [
            'title' => "خدمات شراء المستعمل {$business['city']} | {$business['brand_name']}",
            'description' => "تعرّف على خدماتنا لشراء الأثاث والعفش والمكيفات والأجهزة ومعدات المطاعم والسكراب في {$business['city']}. تواصل الآن لتقييم مجاني.",
        ];

        return view('pages.services.index', [
            'seo' => $seo,
            'services' => $services,
        ]);
    }

    public function show(Request $request, string $serviceSlug): View
    {
        $service = config("services.$serviceSlug");

        abort_if($service === null, 404);

        $business = config('business');

        $vars = [
            'brand' => $business['brand_name'],
            'city' => $business['city'],
        ];

        $seo = [
            'title' => Template::render((string) ($service['meta']['title'] ?? ''), $vars),
            'description' => Template::render((string) ($service['meta']['description'] ?? ''), $vars),
        ];

        $related = [];
        foreach (($service['related_slugs'] ?? []) as $relatedSlug) {
            $relatedService = config("services.$relatedSlug");
            if ($relatedService !== null) {
                $related[$relatedSlug] = $relatedService;
            }
        }

        return view('pages.services.show', [
            'seo' => $seo,
            'service' => $service,
            'serviceSlug' => $serviceSlug,
            'services' => config('services', []),
            'relatedServices' => $related,
        ]);
    }
}

