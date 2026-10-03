<?php
// router.php - Router script untuk PHP Built-in Web Server (Kompatibel dengan Laravel 12)
// Digunakan dengan: php -S 127.0.0.1:8000 router.php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$filePath = __DIR__ . '/public' . urldecode($uri);

// Jika request adalah file fisik di folder public (CSS, JS, gambar, font, favicon, robots.txt, sitemap.xml, dll)
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    $mimes = [
        'css'   => 'text/css; charset=utf-8',
        'js'    => 'application/javascript; charset=utf-8',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'ico'   => 'image/x-icon',
        'webp'  => 'image/webp',
        'txt'   => 'text/plain; charset=utf-8',
        'xml'   => 'application/xml; charset=utf-8',
        'html'  => 'text/html; charset=utf-8',
        'woff2' => 'font/woff2',
        'woff'  => 'font/woff',
        'ttf'   => 'font/ttf',
    ];

    $mime = $mimes[$ext] ?? (mime_content_type($filePath) ?: 'application/octet-stream');
    header("Content-Type: $mime");
    header("Content-Length: " . filesize($filePath));
    readfile($filePath);
    exit;
}

// Jika request adalah folder yang memiliki index.html (contoh: /spmb/)
if (is_dir($filePath)) {
    $indexHtml = rtrim($filePath, '/') . '/index.html';
    if (file_exists($indexHtml)) {
        if (substr($uri, -1) !== '/') {
            header("Location: $uri/");
            exit;
        }
        header("Content-Type: text/html; charset=utf-8");
        header("Content-Length: " . filesize($indexHtml));
        readfile($indexHtml);
        exit;
    }
}

// Arahkan ke Laravel entry point di public/index.php
require __DIR__ . '/public/index.php';
