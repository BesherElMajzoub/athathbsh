<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsController extends Controller
{
    public function index(): Response
    {
        $sitemapUrl = rtrim(config('app.url'), '/').route('sitemap', absolute: false);

        $content = implode("\n", [
            'User-agent: *',
            'Allow: /',
            'Sitemap: '.$sitemapUrl,
            '',
        ]);

        return response($content, 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}

