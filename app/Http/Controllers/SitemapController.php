<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic sitemap XML
     */
    public function index(): Response
    {
        $xml = $this->buildSitemapXml();

        // Also refresh public/sitemap.xml to stay in sync
        @file_put_contents(public_path('sitemap.xml'), $xml);

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }

    /**
     * Build standard valid sitemap XML string
     */
    public function buildSitemapXml(): string
    {
        $baseUrl = config('app.url', 'https://polmind.ac.id');
        if (empty($baseUrl) || str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '127.0.0.1')) {
            $baseUrl = 'https://polmind.ac.id';
        }
        $baseUrl = rtrim($baseUrl, '/');

        $staticPages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['url' => '/pmb', 'priority' => '0.9', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['url' => '/prodi', 'priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
            ['url' => '/beranda/berita', 'priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
            ['url' => '/profil', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
            ['url' => '/keunikan', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
            ['url' => '/daftar_dosen', 'priority' => '0.8', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
            ['url' => '/daftar_tendik', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
            ['url' => '/dokumentasi', 'priority' => '0.7', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
        ];

        $articles = Berita::where('is_published', true)
            ->orderByDesc('updated_at')
            ->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n";
        $xml .= '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        // Static Pages
        foreach ($staticPages as $page) {
            $loc = $baseUrl . $page['url'];
            $xml .= "    <url>\n";
            $xml .= "        <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "        <lastmod>{$page['lastmod']}</lastmod>\n";
            $xml .= "        <changefreq>{$page['changefreq']}</changefreq>\n";
            $xml .= "        <priority>{$page['priority']}</priority>\n";
            $xml .= "    </url>\n";
        }

        // Dynamic News Articles
        foreach ($articles as $article) {
            $loc = $baseUrl . '/beranda/berita/' . $article->slug;
            $lastmod = $article->updated_at ? $article->updated_at->format('Y-m-d') : date('Y-m-d');
            $xml .= "    <url>\n";
            $xml .= "        <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "        <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "        <changefreq>weekly</changefreq>\n";
            $xml .= "        <priority>0.8</priority>\n";
            $xml .= "    </url>\n";
        }

        $xml .= "</urlset>";

        return $xml;
    }
}
