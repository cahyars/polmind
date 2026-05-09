<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-E959YP027R"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-E959YP027R');
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Politeknik Mitra Industri Dikembangkan di kawasan industri MM2100, didukung oleh para praktisi industri dan pendidikan." />
  <meta name="keywords" content="politeknik, mitra, industri, polmind, politeknik mitra industri, perguruan tinggi vokasi terbaik, politeknik terbaik" />
  <meta name="site_name" content="Politeknik Mitra Industri">

  <title><?php echo isset($page_title) ? $page_title : "Politeknik Mitra Industri"; ?></title>
  <link rel="canonical" href="<?php echo isset($canonical_url) ? $canonical_url : "https://polmind.ac.id"; ?>" />

  <!-- Open Graph -->
  <meta property="og:title" content="Politeknik Mitra Industri">
  <meta property="og:description" content="Politeknik Mitra Industri Dikembangkan di kawasan industri MM2100, didukung oleh para praktisi industri dan pendidikan.">
  <meta property="og:url" content="https://polmind.ac.id/">
  <meta property="og:type" content="website">

  <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/images/favicon-cerah.ico">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main-style.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/news.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/detail_news.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/dokumentasi.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/daftar-dosen.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>

    .news-card {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .news-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .news-content {
      padding: 15px;
    }

    .news-title {
      font-size: 1.1rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .news-date {
      font-size: 0.9rem;
      color: #888;
      margin-bottom: 10px;
    }

    .news-summary {
      font-size: 0.95rem;
      color: #444;
    }

    /* Desktop mode = Grid */
    @media (min-width: 768px) {
      .swiper-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
      }

      .swiper-slide {
        width: auto !important;
      }

      .swiper-button-next,
      .swiper-button-prev,
      .swiper-pagination {
        display: none !important;
      }
    }

    :root{
      --blue:#102C53;         /* biru khas Polmind */
      --blue-80:#1b3e76;
      --white:#fff;
      --muted:#e9eef7;
      --text:#0f172a;
      --topbar-h:40px;        /* tinggi topbar */
    }

    /* Reset singkat */
    .topbar, .topbar * { box-sizing: border-box; }

    .topbar{
      width:100%;
      background: var(--blue);
      color: var(--white);
      font: 500 13px/1.2 system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji","Segoe UI Emoji";
      border-bottom: 1px solid rgba(255,255,255,.12);
    }

    .topbar__container{
      margin:0 auto;
      padding: 0px 160px;
      height: var(--topbar-h);
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:12px;
    }

    .topbar__left,
    .topbar__right{
      display:flex;
      align-items:center;
      gap:10px;
      flex-wrap:wrap;
    }

    .topbar a{ color: var(--white); text-decoration:none; }
    .topbar a:hover{ text-decoration: underline; text-underline-offset: 2px; }

    .topbar__item{
      display:inline-flex; align-items:center; gap:6px;
      opacity:.95;
    }
    .topbar__sep{ opacity:.5; }

    .topbar__link{
      padding:6px 8px;
      border-radius:8px;
      opacity:.95;
    }

    .topbar__cta{
      padding:6px 10px;
      background: #3065AB;
      color: var(--blue);
      border-radius:10px;
      font-weight:600;
      text-decoration: none;
      box-shadow: 0 2px 10px rgba(0,0,0,.08);
    }

    .language-selector select{
      appearance:none; -webkit-appearance:none; -moz-appearance:none;
      background: var(--muted);
      color: var(--blue);
      border: 0;
      border-radius: 10px;
      padding: 6px 30px 6px 10px;
      font-weight:600;
      cursor:pointer;
      background-image: url("data:image/svg+xml;utf8,<svg fill='%23102C53' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M7 10l5 5 5-5z'/></svg>");
      background-repeat:no-repeat;
      background-position: right 8px center;
      background-size:16px;
    }

    /* Responsif */
    @media (max-width: 768px){
      .topbar__container{ height:auto; padding:6px 12px; }
      .topbar__left{ display:none; }               /* sembunyikan info kontak di layar kecil */
      .topbar__right{ width:100%; justify-content:space-between; gap:8px; }
      .topbar__link{ display:none; }               /* sisakan CTA + bahasa agar ringkas */
      .topbar__cta{ padding:6px 8px; font-size:12px; }
      .language-selector select{ padding:6px 28px 6px 8px; font-size:12px; }
    }

    /* Optional: dark mode */
    @media (prefers-color-scheme: dark){
      .language-selector select{
        background:#202833; color:#e6ebf5;
      }
    }

  </style>

</head>

<body>

<!-- Header -->
<header>
  <!-- ==== TOPBAR POLMIND ==== -->
  <div class="topbar">
    <div class="topbar__container">
      <div class="topbar__left">
        <a class="topbar__item" href="mailto:info@polmind.ac.id" aria-label="Email Polmind">
          ✉️ <span>info@polmind.ac.id</span>
        </a>
        <span class="topbar__sep">•</span>
        <a class="topbar__item" href="https://wa.me/6282113296897" target="_blank" aria-label="Telepon Polmind">
          ☎ <span>+62 821-1329-6897</span>
        </a>
      </div>

      <div class="topbar__right">
        <!-- quick links yang bisa diterjemahkan -->
        <a href="/pmb" class="topbar__cta" data-translate="register-now">Daftar Sekarang</a>

        <!-- dropdown bahasa -->
        <div class="language-selector">
          <select id="languageSwitcher" aria-label="Pilih bahasa">
            <option value="id">🇮🇩 Bahasa</option>
            <option value="en">🇬🇧 English</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <!-- ==== /TOPBAR ==== -->

  <div class="header">
    <div class="header-inner">
      <a href="<?= BASE_URL ?>beranda" style="text-decoration:none; color:white;">
        <h1 class="logo" data-translate="site-title">POLITEKNIK MITRA INDUSTRI</h1>
      </a>

      <div class="burger" id="burgerMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <!-- Desktop Navigation -->
      <nav class="desktop-nav">
        <ul>
          <li><a href="<?= BASE_URL ?>beranda" data-translate="home">BERANDA</a></li>
          <li>
            <a href="<?= BASE_URL ?>profil" data-translate="profile">PROFIL</a>
            <svg width="256px" height="256px" class="dropdown-icon" onclick="toggleDropdown(this)" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fafafa" stroke-width="0.00024000000000000003" transform="rotate(0)">
              <g id="SVGRepo_bgCarrier" stroke-width="0">
                <rect x="0" y="0" width="24.00" height="24.00" rx="0" fill="#102C53" strokewidth="0"></rect>
              </g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" fill="#FFFFFF"></path>
              </g>
            </svg>
            <div class="dropdown-content">
              <a href="<?= BASE_URL ?>daftar_dosen" data-translate="lecturers">DAFTAR DOSEN</a>
            </div>
          </li>
          <li><a href="<?= BASE_URL ?>keunikan" data-translate="advantages">KEUNIKAN DAN KEUNGGULAN</a></li>
          <li><a href="<?= BASE_URL ?>dokumentasi" data-translate="documentation">DOKUMENTASI</a></li>
          <li><a href="<?= BASE_URL ?>prodi" data-translate="applied-program">PRODI SARJANA TERAPAN</a></li>
          <li><a href="<?= BASE_URL ?>pmb" data-translate="admission">PENERIMAAN MAHASISWA BARU</a></li>
        </ul>
      </nav>
    </div>

    <!-- Mobile Navigation -->
    <ul class="mobile-nav" id="mobileNav">
      <li><a href="<?= BASE_URL ?>beranda" data-translate="home">BERANDA</a></li>
      <li>
        <a href="<?= BASE_URL ?>profil" data-translate="profile">PROFIL</a>
        <svg class="dropdown-icon" onclick="toggleDropdown(this)" viewBox="0 0 24 24">
          <path d="M7 10l5 5 5-5z" />
        </svg>
        <div class="dropdown-content">
          <a href="<?= BASE_URL ?>daftar_dosen" data-translate="lecturers">DAFTAR DOSEN</a>
        </div>
      </li>
      <li><a href="<?= BASE_URL ?>keunikan" data-translate="advantages">KEUNIKAN DAN KEUNGGULAN</a></li>
      <li><a href="<?= BASE_URL ?>dokumentasi" data-translate="documentation">DOKUMENTASI</a></li>
      <li><a href="<?= BASE_URL ?>prodi" data-translate="applied-program">PRODI SARJANA TERAPAN</a></li>
      <li><a href="<?= BASE_URL ?>pmb" data-translate="admission">PENERIMAAN MAHASISWA BARU</a></li>
    </ul>
  </div>
</header>
<!--End Header -->
