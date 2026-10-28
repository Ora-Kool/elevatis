<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $entries = collect(['home', 'about', 'services', 'pricing', 'testimonials', 'contact'])
            ->map(fn (string $name, int $index) => sprintf(
                '<url><loc>%s</loc><changefreq>monthly</changefreq><priority>%s</priority></url>',
                e(route($name)),
                $index === 0 ? '1.0' : '0.8',
            ))
            ->implode('');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'
            .'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.$entries.'</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
