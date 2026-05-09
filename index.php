<?php
require_once 'config.php';

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Hilangkan folder project
$request_uri = str_replace('/polmind', '', $request_uri);

// Bersihkan slash
$request_uri = trim($request_uri, '/');

$allowed_pages = [
    'beranda',
    'profil',
    'dokumentasi',
    'prodi',
    'pmb',
    'keunikan',
    'daftar_dosen'
];

// ROOT
if ($request_uri == '') {
    $page = 'beranda';
}

// HALAMAN BIASA
elseif (in_array($request_uri, $allowed_pages)) {
    $page = $request_uri;
}

// DAFTAR BERITA
elseif ($request_uri == 'beranda/berita') {
    include 'pages/berita/index.php';
    exit;
}

// DETAIL BERITA
elseif (preg_match('#^beranda/berita/([a-zA-Z0-9\-_]+)$#', $request_uri, $matches)) {

    $slug = $matches[1];

    $file = "pages/berita/$slug.php";

    if (file_exists($file)) {
        include $file;
    } else {
        http_response_code(404);
        echo "<h1>404 - Berita tidak ditemukan</h1>";
    }

    exit;
}

// 404
else {
    http_response_code(404);
    echo "<h1>404 - Halaman tidak ditemukan</h1>";
    exit;
}

// LOAD PAGE
include "pages/$page.php";