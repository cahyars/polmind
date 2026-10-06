<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-E959YP027R"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-E959YP027R');
  </script>
  <meta name="description" content="@yield('meta_description', 'Politeknik Mitra Industri (Polmind) adalah perguruan tinggi vokasi unggulan di Kawasan Industri MM2100 Cikarang dengan kurikulum berbasis industri dan magang global.')" />
  <meta name="keywords" content="@yield('meta_keywords', 'politeknik mitra industri, polmind, mm2100, kampus vokasi cikarang, beasiswa industri, trpl, teknologi manufaktur, bisnis digital')" />
  <meta name="author" content="Politeknik Mitra Industri" />
  <meta name="robots" content="index, follow" />
  <meta name="site_name" content="Politeknik Mitra Industri">

  <title>@yield('title', 'Politeknik Mitra Industri | Kampus Vokasi MM2100')</title>
  <link rel="canonical" href="@yield('canonical', url()->current())" />

  <!-- Open Graph / Facebook / WhatsApp Preview -->
  <meta property="og:site_name" content="Politeknik Mitra Industri">
  <meta property="og:locale" content="id_ID">
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:title" content="@yield('title', 'Politeknik Mitra Industri | Kampus Vokasi MM2100')">
  <meta property="og:description" content="@yield('meta_description', 'Politeknik Mitra Industri (Polmind) adalah perguruan tinggi vokasi unggulan di Kawasan Industri MM2100 Cikarang.')">
  <meta property="og:url" content="@yield('canonical', url()->current())">
  <meta property="og:image" content="@yield('og_image', asset('assets/images/slider/polmind_vasanta.png'))">
  <meta property="og:image:alt" content="Politeknik Mitra Industri">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('title', 'Politeknik Mitra Industri | Kampus Vokasi MM2100')">
  <meta name="twitter:description" content="@yield('meta_description', 'Politeknik Mitra Industri (Polmind) adalah perguruan tinggi vokasi unggulan di Kawasan Industri MM2100 Cikarang.')">
  <meta name="twitter:image" content="@yield('og_image', asset('assets/images/slider/polmind_vasanta.png'))">

  <!-- Resource Hints for Faster Font & CDN Loading -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdnjs.cloudflare.com">
  <link rel="preconnect" href="https://unpkg.com">

  <!-- Combined Google Fonts Request with display=swap -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon-cerah.ico') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main-style.css') }}?v={{ file_exists(public_path('assets/css/main-style.css')) ? filemtime(public_path('assets/css/main-style.css')) : '1.0' }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ file_exists(public_path('assets/css/style.css')) ? filemtime(public_path('assets/css/style.css')) : '2.0' }}">
  <link rel="stylesheet" href="{{ asset('assets/css/news.css') }}?v={{ file_exists(public_path('assets/css/news.css')) ? filemtime(public_path('assets/css/news.css')) : '1.0' }}">
  <link rel="stylesheet" href="{{ asset('assets/css/detail_news.css') }}?v={{ file_exists(public_path('assets/css/detail_news.css')) ? filemtime(public_path('assets/css/detail_news.css')) : '2.1' }}">
  <link rel="stylesheet" href="{{ asset('assets/css/dokumentasi.css') }}?v={{ file_exists(public_path('assets/css/dokumentasi.css')) ? filemtime(public_path('assets/css/dokumentasi.css')) : '1.0' }}">
  <link rel="stylesheet" href="{{ asset('assets/css/daftar-dosen.css') }}?v={{ file_exists(public_path('assets/css/daftar-dosen.css')) ? filemtime(public_path('assets/css/daftar-dosen.css')) : '1.0' }}">

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Structured Data: Organization (Schema.org JSON-LD) -->
  <script type="application/ld+json">
  {!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollegeOrUniversity',
    'name' => 'Politeknik Mitra Industri',
    'alternateName' => 'Polmind',
    'url' => 'https://polmind.ac.id',
    'logo' => asset('assets/images/logo.png'),
    'description' => 'Politeknik Mitra Industri adalah perguruan tinggi vokasi unggulan yang berlokasi strategis di Kawasan Industri MM2100 Cikarang Barat, Bekasi.',
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => 'Vasanta Innopark, Kawasan Industri MM2100, Gandasari',
      'addressLocality' => 'Cikarang Barat',
      'addressRegion' => 'Jawa Barat',
      'postalCode' => '17530',
      'addressCountry' => 'ID',
    ],
    'contactPoint' => [
      '@type' => 'ContactPoint',
      'telephone' => '+6282113296897',
      'contactType' => 'admissions',
      'areaServed' => 'ID',
      'availableLanguage' => ['Indonesian', 'English'],
    ],
    'sameAs' => [
      'https://www.instagram.com/politeknikmitraindustri',
    ],
  ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>
  @yield('structured_data')

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
    :root {
      --blue: #102C53;
      --blue-80: #1b3e76;
      --white: #fff;
      --muted: #e9eef7;
      --text: #0f172a;
      --topbar-h: 40px;
    }
    .topbar, .topbar * { box-sizing: border-box; }
    .topbar {
      width: 100%;
      background: var(--blue);
      color: var(--white);
      font: 500 13px/1.2 system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
      border-bottom: 1px solid rgba(255,255,255,.12);
    }
    .topbar__container {
      margin: 0 auto;
      padding: 0px 160px;
      height: var(--topbar-h);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }
    .topbar__left, .topbar__right {
      display: flex;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
    }
    .topbar a { color: var(--white); text-decoration: none; }
    .topbar a:hover { text-decoration: underline; text-underline-offset: 2px; }
    .topbar__item {
      display: inline-flex; align-items: center; gap: 6px; opacity: .95;
    }
    .topbar__sep { opacity: .5; }
    .topbar__link { padding: 6px 8px; border-radius: 8px; opacity: .95; }
    .topbar__cta {
      padding: 6px 10px;
      background: #3065AB;
      color: var(--blue);
      border-radius: 10px;
      font-weight: 600;
      text-decoration: none;
      box-shadow: 0 2px 10px rgba(0,0,0,.08);
    }
    .language-selector select {
      appearance: none; -webkit-appearance: none; -moz-appearance: none;
      background: var(--muted);
      color: var(--blue);
      border: 0;
      border-radius: 10px;
      padding: 6px 30px 6px 10px;
      font-weight: 600;
      cursor: pointer;
      background-image: url("data:image/svg+xml;utf8,<svg fill='%23102C53' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M7 10l5 5 5-5z'/></svg>");
      background-repeat: no-repeat;
      background-position: right 8px center;
      background-size: 16px;
    }
    @media (max-width: 768px) {
      .topbar__container { height: auto; padding: 6px 12px; }
      .topbar__left { display: none; }
      .topbar__right { width: 100%; justify-content: space-between; gap: 8px; }
      .topbar__link { display: none; }
      .topbar__cta { padding: 6px 8px; font-size: 12px; }
      .language-selector select { padding: 6px 28px 6px 8px; font-size: 12px; }
    }
  </style>
  @stack('styles')
</head>

<body>
  <!-- Header -->
  <header>
    <!-- ==== TOPBAR POLMIND ==== -->
    <div class="topbar">
      <div class="topbar__container">
        <div class="topbar__left">
          @php
            $topEmail = \App\Models\SiteSetting::get('contact_email', 'info@polmind.ac.id');
            $topPhone = \App\Models\SiteSetting::get('contact_phone', '+62 821-1329-6897');
            $topWa = \App\Models\SiteSetting::get('contact_whatsapp', '6282113296897');
          @endphp
          <a class="topbar__item" href="mailto:{{ $topEmail }}" aria-label="Email Polmind">
            ✉️ <span>{{ $topEmail }}</span>
          </a>
          <span class="topbar__sep">•</span>
          <a class="topbar__item" href="https://wa.me/{{ $topWa }}" target="_blank" aria-label="Telepon Polmind">
            ☎ <span>{{ $topPhone }}</span>
          </a>
        </div>

        <div class="topbar__right">
          <a href="/pmb" class="topbar__cta" data-translate="register-now">Daftar Sekarang</a>

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
        <a href="/beranda" style="text-decoration:none; color:white;">
          <div class="logo" data-translate="site-title">{{ \App\Models\SiteSetting::get('site_title', 'POLITEKNIK MITRA INDUSTRI') }}</div>
        </a>

        <div class="burger" id="burgerMenu">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
          <ul>
            <li><a href="/beranda" data-translate="home">BERANDA</a></li>
            <li>
              <a href="/profil" data-translate="profile">PROFIL</a>
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
                <a href="/daftar_dosen" data-translate="lecturers">DAFTAR DOSEN</a>
                <a href="/daftar_tendik" data-translate="staff">DAFTAR TENDIK</a>
              </div>
            </li>
            <li><a href="/keunikan" data-translate="advantages">KEUNIKAN DAN KEUNGGULAN</a></li>
            <li><a href="/dokumentasi" data-translate="documentation">DOKUMENTASI</a></li>
            <li><a href="/prodi" data-translate="applied-program">PRODI SARJANA TERAPAN</a></li>
            <li><a href="/pmb" data-translate="admission">PENERIMAAN MAHASISWA BARU</a></li>
          </ul>
        </nav>
      </div>

      <!-- Mobile Navigation -->
      <ul class="mobile-nav" id="mobileNav">
        <li><a href="/beranda" data-translate="home">BERANDA</a></li>
        <li>
          <a href="/profil" data-translate="profile">PROFIL</a>
          <svg class="dropdown-icon" onclick="toggleDropdown(this)" viewBox="0 0 24 24">
            <path d="M7 10l5 5 5-5z" />
          </svg>
          <div class="dropdown-content">
            <a href="/daftar_dosen" data-translate="lecturers">DAFTAR DOSEN</a>
            <a href="/daftar_tendik" data-translate="staff">DAFTAR TENDIK</a>
          </div>
        </li>
        <li><a href="/keunikan" data-translate="advantages">KEUNIKAN DAN KEUNGGULAN</a></li>
        <li><a href="/dokumentasi" data-translate="documentation">DOKUMENTASI</a></li>
        <li><a href="/prodi" data-translate="applied-program">PRODI SARJANA TERAPAN</a></li>
        <li><a href="/pmb" data-translate="admission">PENERIMAAN MAHASISWA BARU</a></li>
      </ul>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <!-- Kolom 1 -->
      <div class="footer-col contact">
        <div class="footerLogo">
          <img src="{{ asset('assets/images/logoFooter.png') }}" alt="Logo polmind">
        </div>
        <div>
          <p data-translate="footer-area">{{ \App\Models\SiteSetting::get('contact_address', 'Kawasan Industri MM2100') }}</p>
          <p><i class="fas fa-phone"></i> {{ $topPhone }}</p>
          <p><i class="fas fa-envelope"></i> {{ $topEmail }}</p>
          <p><i class="fas fa-map-marker-alt"></i> <span data-translate="footer-area">MM2100 Industrial Town</span></p>
          {!! \App\Models\SiteSetting::get('gmaps_iframe', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.9027092193342!2d107.08309836648712!3d-6.289287568565989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f292b17f9b9%3A0xa3f25862f022169c!2sPoliteknik%20Mitra%20Industri!5e0!3m2!1sid!2sid!4v1763609292143!5m2!1sid!2sid" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>') !!}
        </div>
      </div>

      <!-- Kolom 2 -->
      <div class="footer-col">
        <h4 data-translate="about">Tentang Polmind</h4>
        <ul>
          <li><a href="/profil" data-translate="profile-footer">Profil</a></li>
          <li><a href="/keunikan" data-translate="advantages-footer">Keunikan dan Keunggulan</a></li>
          <li><a href="/profil#jajaran" data-translate="founder-footer">Pendiri dan Expert</a></li>
        </ul>
      </div>

      <!-- Kolom 3 -->
      <div class="footer-col">
        <h4 data-translate="study-programs">Program Studi</h4>
        <ul>
          <li><a href="/prodi#trm" data-translate="manuf-tech">Teknologi Rekayasa Manufaktur</a></li>
          <li><a href="/prodi#bd" data-translate="digital-business">Bisnis Digital</a></li>
          <li><a href="/prodi#trpl" data-translate="softeng-tech">Teknologi Rekayasa Perangkat Lunak</a></li>
        </ul>
      </div>

      <!-- Kolom 4 -->
      <div class="footer-col">
        <h4 data-translate="support">Support</h4>
        <ul>
          <li><a href="/dokumentasi" data-translate="documentation-footer">Dokumentasi</a></li>
          <li><a href="/pmb" data-translate="register-footer">Pendaftaran Mahasiswa Baru</a></li>
          @auth
            <li><a href="/admin/dashboard" style="color: #ffd700;"><i class="fas fa-cog"></i> Panel Admin</a></li>
          @endauth
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p data-translate="copyright">{{ \App\Models\SiteSetting::get('footer_copyright', '© 2025 Yayasan Mitra Global Mandiri') }}</p>
    </div>
  </footer>

  <!-- Wrapper untuk posisi tetap -->
  <div class="floating-icon">
    <div id="scrollToTop" class="icon-btn">↑</div>
    <a id="whatsappBtn" class="icon-btn" href="https://wa.me/{{ $topWa }}" target="_blank">
      <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp" />
    </a>
  </div>

  @if(\App\Models\SiteSetting::get('pmb_popup_enabled', '0') == '1' && !request()->is('pmb*') && !request()->is('admin*'))
  @php
    $popupImg = \App\Models\SiteSetting::get('pmb_popup_image', 'assets/images/perpanjangan_gel4.jpeg');
    $popupImgUrl = str_starts_with($popupImg, 'http') ? $popupImg : asset($popupImg);
    $popupCtaLink = url(\App\Models\SiteSetting::get('pmb_cta_link', '/pmb'));
  @endphp
  <!-- POPUP PROMO PMB -->
  <div id="popupPMB" class="pmb-popup-overlay" role="dialog" aria-modal="true" aria-label="Pengumuman PMB Politeknik Mitra Industri">
    <div class="pmb-popup-backdrop" onclick="closePopupPMB()"></div>
    <div class="pmb-popup-card">
      <!-- Tombol Close (X) -->
      <button type="button" class="pmb-popup-close-btn" onclick="closePopupPMB()" aria-label="Tutup Popup" title="Tutup">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>

      <!-- Gambar Flyer / Banner PMB -->
      <a href="{{ $popupCtaLink }}" class="pmb-popup-link" title="Klik untuk Informasi PMB Lengkap">
        <img src="{{ $popupImgUrl }}" alt="Informasi PMB Politeknik Mitra Industri" class="pmb-popup-image" loading="eager">
      </a>

      <!-- Quick Action Footer -->
      <div class="pmb-popup-footer">
        <a href="{{ $popupCtaLink }}" class="pmb-popup-action-btn">
          <span>Lihat Info &amp; Syarat Pendaftaran</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </a>
      </div>
    </div>
  </div>

  <style>
    /* ========================================================
       POPUP PROMO PMB STYLES
       ======================================================== */
    .pmb-popup-overlay {
      position: fixed !important;
      inset: 0 !important;
      z-index: 999999 !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      padding: 16px !important;
      opacity: 0 !important;
      visibility: hidden !important;
      pointer-events: none !important;
      transition: opacity 0.35s ease, visibility 0.35s ease !important;
    }

    .pmb-popup-overlay.show {
      opacity: 1 !important;
      visibility: visible !important;
      pointer-events: auto !important;
    }

    .pmb-popup-backdrop {
      position: absolute !important;
      inset: 0 !important;
      background: rgba(10, 20, 40, 0.72) !important;
      backdrop-filter: blur(6px) !important;
      -webkit-backdrop-filter: blur(6px) !important;
      cursor: pointer !important;
    }

    .pmb-popup-card {
      position: relative !important;
      z-index: 10 !important;
      max-width: 440px !important;
      width: 100% !important;
      background: #ffffff !important;
      border-radius: 16px !important;
      box-shadow: 0 25px 50px -12px rgba(10, 25, 55, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.15) !important;
      overflow: hidden !important;
      transform: scale(0.9) translateY(15px) !important;
      transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
      display: flex !important;
      flex-direction: column !important;
    }

    .pmb-popup-overlay.show .pmb-popup-card {
      transform: scale(1) translateY(0) !important;
    }

    .pmb-popup-close-btn {
      position: absolute !important;
      top: 12px !important;
      right: 12px !important;
      z-index: 25 !important;
      width: 36px !important;
      height: 36px !important;
      border-radius: 50% !important;
      background: rgba(15, 23, 42, 0.8) !important;
      color: #ffffff !important;
      border: 1.5px solid rgba(255, 255, 255, 0.7) !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      cursor: pointer !important;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.35) !important;
      transition: transform 0.25s ease, background 0.25s ease, border-color 0.25s ease !important;
      padding: 0 !important;
    }

    .pmb-popup-close-btn:hover {
      background: #dc2626 !important;
      border-color: #ef4444 !important;
      transform: rotate(90deg) scale(1.1) !important;
    }

    .pmb-popup-link {
      display: block !important;
      width: 100% !important;
      line-height: 0 !important;
      background: #f8fafc !important;
      overflow: hidden !important;
    }

    .pmb-popup-image {
      width: 100% !important;
      max-height: 72vh !important;
      height: auto !important;
      object-fit: contain !important;
      display: block !important;
      margin: 0 auto !important;
      transition: transform 0.3s ease !important;
    }

    .pmb-popup-link:hover .pmb-popup-image {
      transform: scale(1.015) !important;
    }

    .pmb-popup-footer {
      padding: 12px 16px 14px !important;
      background: #ffffff !important;
      border-top: 1px solid #f1f5f9 !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
    }

    .pmb-popup-action-btn {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      gap: 8px !important;
      width: 100% !important;
      padding: 11px 20px !important;
      background: linear-gradient(135deg, #102C53 0%, #1e4a86 100%) !important;
      color: #ffffff !important;
      font-weight: 600 !important;
      font-size: 14.5px !important;
      border-radius: 10px !important;
      text-decoration: none !important;
      box-shadow: 0 4px 14px rgba(16, 44, 83, 0.25) !important;
      transition: all 0.25s ease !important;
    }

    .pmb-popup-action-btn:hover {
      background: linear-gradient(135deg, #0d2342 0%, #163866 100%) !important;
      transform: translateY(-1px) !important;
      box-shadow: 0 6px 18px rgba(16, 44, 83, 0.35) !important;
      color: #ffffff !important;
    }

    @media (max-width: 480px) {
      .pmb-popup-card {
        max-width: 92vw !important;
        border-radius: 14px !important;
      }
      .pmb-popup-image {
        max-height: 65vh !important;
      }
      .pmb-popup-action-btn {
        font-size: 13.5px !important;
        padding: 10px 14px !important;
      }
      .pmb-popup-close-btn {
        width: 32px !important;
        height: 32px !important;
        top: 10px !important;
        right: 10px !important;
      }
    }
  </style>

  <script>
    (function() {
      const POPUP_STORAGE_KEY = 'polmind_pmb_popup_dismissed';
      const hasDismissed = sessionStorage.getItem(POPUP_STORAGE_KEY);
      const isTestMode = window.location.search.includes('popup=1');

      function openPopup() {
        const popup = document.getElementById('popupPMB');
        if (popup) {
          popup.classList.add('show');
          document.body.style.overflow = 'hidden';
        }
      }

      window.closePopupPMB = function() {
        const popup = document.getElementById('popupPMB');
        if (popup) {
          popup.classList.remove('show');
          document.body.style.overflow = '';
          sessionStorage.setItem(POPUP_STORAGE_KEY, 'true');
        }
      };

      if (!hasDismissed || isTestMode) {
        if (document.readyState === 'complete') {
          setTimeout(openPopup, 500);
        } else {
          window.addEventListener('load', function() {
            setTimeout(openPopup, 500);
          });
        }
      }

      // Close on Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' || e.keyCode === 27) {
          window.closePopupPMB();
        }
      });
    })();
  </script>
  @endif

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('assets/js/script1.js') }}?v={{ file_exists(public_path('assets/js/script1.js')) ? filemtime(public_path('assets/js/script1.js')) : '2.0' }}"></script>
  <script src="{{ asset('assets/js/en/lang.js') }}?v={{ file_exists(public_path('assets/js/en/lang.js')) ? filemtime(public_path('assets/js/en/lang.js')) : '1.0' }}"></script>
  @stack('scripts')
</body>
</html>
