<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $today = now()->toDateString();

        $routeNames = [
            // Static
            'home',
            'services.index',
            'about',
            'contact.show',
            'faq',
            'location',
            'legal.privacy',
            'legal.terms',

            // Services (canonical only)
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

            // Areas
            'areas.north',
            'areas.south',
            'areas.east',
            'areas.west',
        ];

        $urls = collect($routeNames)
            ->map(function ($routeName) use ($today) {
                return [
                    'loc' => route($routeName),
                    'priority' => $this->priority($routeName),
                    'changefreq' => $this->changefreq($routeName),
                    'lastmod' => $today,
                ];
            })

            // 🚨 Safety Filter: NEVER allow old redirected URLs
            ->filter(function ($url) {
                return !str_contains($url['loc'], '/services/buy-');
            })

            ->values();

        // 🔍 DEBUG MODE (local only)
        if (app()->environment('local') && request()->query('debug') == 1) {
            return response()->json($urls);
        }

        return response()
            ->view('seo.sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function changefreq(string $route): string
    {
        return match ($route) {
            'home' => 'daily',
            'services.index' => 'weekly',
            'services.furniture',
            'services.ac',
            'services.appliances',
            'services.scrap',
            'services.afsh' => 'weekly',
            default => 'monthly',
        };
    }

    private function priority(string $route): string
    {
        return match ($route) {
            'home' => '1.0',
            'services.index' => '0.9',
            'services.furniture',
            'services.ac',
            'services.scrap',
            'services.afsh' => '0.9',
            default => '0.6',
        };
    }
}
