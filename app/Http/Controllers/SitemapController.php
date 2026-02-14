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
        // All service pages should be weekly
        if (str_starts_with($route, 'services.')) {
            return 'weekly';
        }

        return match ($route) {
            'home' => 'daily',
            'about', 'contact.show', 'faq', 'location' => 'monthly',
            'areas.north', 'areas.south', 'areas.east', 'areas.west' => 'monthly',
            'legal.privacy', 'legal.terms' => 'yearly',
            default => 'monthly',
        };
    }

    private function priority(string $route): string
    {
        // Home is top priority
        if ($route === 'home') {
            return '1.0';
        }

        // Service index and individual service pages are high priority
        if (str_starts_with($route, 'services.')) {
            return '0.9';
        }

        // Areas are medium-high
        if (str_starts_with($route, 'areas.')) {
            return '0.8';
        }

        return match ($route) {
            'about', 'contact.show', 'location' => '0.7',
            'faq' => '0.6',
            'legal.privacy', 'legal.terms' => '0.3',
            default => '0.5',
        };
    }
}
