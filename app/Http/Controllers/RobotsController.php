<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsController extends Controller
{
    public function index(): Response
    {
        $content = <<<ROBOTS
User-agent: *
Allow: /

Disallow: /admin/
Disallow: /t/

Sitemap: {$this->getSitemapUrl()}
ROBOTS;

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }

    protected function getSitemapUrl(): string
    {
        return url('/sitemap.xml');
    }
}
