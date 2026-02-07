<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = config('services');
        $business = config('business');

        $seo = [
            'title' => 'خدماتنا في جدة | شراء أثاث ومكيفات وأجهزة مستعملة',
            'description' => 'نقدم خدمات شراء الأثاث المستعمل والمكيفات والأجهزة الكهربائية وتفريغ المستودعات في جدة. تقييم مجاني ودفع فوري.',
        ];

        return view('pages.services.index', compact('services', 'business', 'seo'));
    }

    public function show(string $serviceSlug): View
    {
        $services = config('services');
        $service = $services[$serviceSlug] ?? null;

        if (!$service) {
            abort(404);
        }

        $business = config('business');
        $site = config('site');

        $seo = [
            'title' => $service['meta']['title'] ?? $service['name'],
            'description' => $service['meta']['description'] ?? $service['excerpt'],
            'canonical' => url()->current(),
        ];

        // Get related services
        $relatedServices = collect($service['related_slugs'] ?? [])
            ->map(fn($slug) => isset($services[$slug]) ? ['slug' => $slug, ...$services[$slug]] : null)
            ->filter();

        return view('pages.services.show', compact('service', 'serviceSlug', 'business', 'site', 'seo', 'relatedServices'));
    }
}
