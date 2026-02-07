<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = collect();

        // Static pages
        $urls->push(['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.index'), 'priority' => '0.9', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('about'), 'priority' => '0.7', 'changefreq' => 'monthly']);
        $urls->push(['loc' => route('contact.show'), 'priority' => '0.7', 'changefreq' => 'monthly']);
        $urls->push(['loc' => route('faq'), 'priority' => '0.8', 'changefreq' => 'monthly']);

        // Service pages
        $urls->push(['loc' => route('services.furniture'), 'priority' => '0.9', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.ac'), 'priority' => '0.8', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.restaurant'), 'priority' => '0.8', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.cafe'), 'priority' => '0.8', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.appliances'), 'priority' => '0.8', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.hotel'), 'priority' => '0.8', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.warehouse'), 'priority' => '0.8', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.carpets'), 'priority' => '0.8', 'changefreq' => 'weekly']);
        $urls->push(['loc' => route('services.palace'), 'priority' => '0.8', 'changefreq' => 'weekly']);

        // Riyadh area pages
        $urls->push(['loc' => route('areas.north'), 'priority' => '0.7', 'changefreq' => 'monthly']);
        $urls->push(['loc' => route('areas.south'), 'priority' => '0.7', 'changefreq' => 'monthly']);
        $urls->push(['loc' => route('areas.east'), 'priority' => '0.7', 'changefreq' => 'monthly']);
        $urls->push(['loc' => route('areas.west'), 'priority' => '0.7', 'changefreq' => 'monthly']);

        $content = view('seo.sitemap', ['urls' => $urls])->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }
}
