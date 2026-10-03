<?php
// router.php - Router script untuk PHP Built-in Web Server (Kompatibel dengan Laravel 12)
// Digunakan dengan: php -S 127.0.0.1:8000 router.php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$filePath = __DIR__ . '/public' . urldecode($uri);

// Jika request adalah file fisik di folder public (CSS, JS, gambar, font, favicon, dll)
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    return false;
}

// Jika request adalah folder yang memiliki index.html (contoh: /spmb/)
if (is_dir($filePath)) {
    $indexHtml = rtrim($filePath, '/') . '/index.html';
    if (file_exists($indexHtml)) {
        if (substr($uri, -1) !== '/') {
            header("Location: $uri/");
            exit;
        }
        return false;
    }
}

// Arahkan ke Laravel entry point di public/index.php
require __DIR__ . '/public/index.php';
