<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            route('home'),
            route('services.index'),
            route('faq'),
            route('areas.index'),
            route('about'),
            route('location'),
            route('contact.show'),
            route('legal.privacy'),
            route('legal.terms'),
        ];

        foreach (array_keys(config('services', [])) as $slug) {
            $urls[] = route('services.show', ['serviceSlug' => $slug]);
        }

        foreach (array_keys(config('areas.canonicals', [])) as $slug) {
            $urls[] = route('areas.show', ['areaSlug' => $slug]);
        }

        $urls = array_values(array_unique($urls));

        $xml = view('seo.sitemap', ['urls' => $urls])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}

