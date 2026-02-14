<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $today = now()->toDateString();
        $urls = collect();

        // 1. Static Pages
        $urls->push(['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'daily', 'lastmod' => $today]);
        $urls->push(['loc' => route('services.index'), 'priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => $today]);
        $urls->push(['loc' => route('about'), 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => $today]);
        $urls->push(['loc' => route('contact.show'), 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $today]);
        $urls->push(['loc' => route('faq'), 'priority' => '0.6', 'changefreq' => 'monthly', 'lastmod' => $today]);
        $urls->push(['loc' => route('location'), 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $today]);
        $urls->push(['loc' => route('legal.privacy'), 'priority' => '0.3', 'changefreq' => 'yearly', 'lastmod' => $today]);
        $urls->push(['loc' => route('legal.terms'), 'priority' => '0.3', 'changefreq' => 'yearly', 'lastmod' => $today]);

        // 2. Service Pages (Direct Routes)
        $services = [
            'services.furniture',
            'services.ac',
            'services.restaurant',
            'services.cafe',
            'services.appliances',
            'services.hotel',
            'services.warehouse',
            'services.carpets',
            'services.palace',
            'services.scrap',
            'services.afsh',
        ];

        foreach ($services as $serviceRoute) {
            $urls->push(['loc' => route($serviceRoute), 'priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => $today]);
        }

        // 3. Area Pages
        $areas = [
            'areas.north',
            'areas.south',
            'areas.east',
            'areas.west',
        ];

        foreach ($areas as $areaRoute) {
            $urls->push(['loc' => route($areaRoute), 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $today]);
        }

        // Generate XML
        $content = view('seo.sitemap', ['urls' => $urls])->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }
}
