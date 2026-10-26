@extends('layouts.frontend')

@section('title', 'Politeknik Mitra Industri | Kampus Vokasi Unggulan MM2100')
@section('meta_description', 'Politeknik Mitra Industri (Polmind) adalah perguruan tinggi vokasi di Kawasan Industri MM2100 Cikarang dengan kurikulum terapan berbasis industri, program kerja ke Jepang, dan beasiswa.')
@section('canonical', 'https://polmind.ac.id/')

@section('content')
<!-- Primary Heading for SEO -->
<h1 style="position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); border:0;">Politeknik Mitra Industri (Polmind) - Kampus Vokasi Terapan Kawasan Industri MM2100 Cikarang</h1>

<!-- Slider -->
<div class="slider-container">
    <div class="slider">
        @forelse($sliders as $index => $slide)
            <div class="slide {{ $slide->is_standard_aspect_ratio ? 'slide-standard' : 'slide-non-standard' }}">
                @if(!$slide->is_standard_aspect_ratio)
                    <!-- Layer 1: Ambient Blur Backdrop HANYA untuk slide non-standar (Anti-Gepeng & Anti-Crop) -->
                    <div class="slide-ambient-blur" aria-hidden="true">
                        <img src="{{ $slide->image_url }}" alt="" loading="lazy" decoding="async" />
                        <div class="slide-ambient-overlay"></div>
                    </div>
                @endif

                <!-- Layer 2: Main Content & Image -->
                @if($slide->link)
                    <a href="{{ $slide->link }}" class="slide-content-link">
                        <div class="slide-main-image-container">
                            <img class="{{ $slide->is_standard_aspect_ratio ? 'slide-standard-img' : 'slide-contain-img' }}"
                                 src="{{ $slide->image_url }}"
                                 alt="{{ $slide->title ?? 'Politeknik Mitra Industri' }}"
                                 @if($loop->first) fetchpriority="high" @else fetchpriority="low" loading="lazy" decoding="async" @endif />
                        </div>
                        @if($slide->has_dynamic_caption)
                            <div class="slide-caption-wrapper">
                                <div class="slide-caption-title">{!! $slide->formatted_caption !!}</div>
                            </div>
                        @endif
                    </a>
                @else
                    <div class="slide-content-wrapper">
                        <div class="slide-main-image-container">
                            <img class="{{ $slide->is_standard_aspect_ratio ? 'slide-standard-img' : 'slide-contain-img' }}"
                                 src="{{ $slide->image_url }}"
                                 alt="{{ $slide->title ?? 'Politeknik Mitra Industri' }}"
                                 @if($loop->first) fetchpriority="high" @else fetchpriority="low" loading="lazy" decoding="async" @endif />
                        </div>
                        @if($slide->has_dynamic_caption)
                            <div class="slide-caption-wrapper">
                                <div class="slide-caption-title">{!! $slide->formatted_caption !!}</div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        @empty
            <div class="slide slide-standard">
                <div class="slide-content-wrapper">
                    <div class="slide-main-image-container">
                        <img id="img-slider" class="slide-standard-img"
                             src="{{ asset('assets/images/slider/polmind_vasanta.png') }}"
                             alt="Kampus Polmind Vasanta Innopark Kawasan Industri MM2100"
                             fetchpriority="high" />
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    <div class="slider-buttons">
        <button class="prev" aria-label="Slide sebelumnya">&#10094;</button>
        <button class="next" aria-label="Slide berikutnya">&#10095;</button>
    </div>
</div>

<!-- Grid Box Section -->
<div class="banner">
    <a href="{{ $settings['pmb_cta_link'] }}">
        <img id="img-wp_daftar" src="{{ asset($settings['pmb_banner_image']) }}" alt="Why Polmind" data-translate="banner-why" loading="lazy" decoding="async" />
    </a>
</div>

@push('styles')
<style>
/* ========================================================
   SLIDER RESPONSIVE & CERDAS POLMIND
   - Standard slides (rasio ~2:1): Tampil 100% full frame edge-to-edge (0% dark bars, 0% crop, 0% gepeng)
   - Non-standard slides: Menggunakan Ambient Blur Backdrop cerdas (anti-gepeng & anti-crop)
   - Mobile: Rasio 2:1 terjaga sempurna tanpa min-height berlebih
   ======================================================== */

.slider-container {
  position: relative !important;
  width: 100% !important;
  overflow: hidden !important;
  padding-top: 0 !important;
  margin-top: 94px !important;
}

@media (max-width: 991px) {
  .slider-container {
    margin-top: 84px !important;
  }
}

@media (max-width: 768px) {
  .slider-container {
    margin-top: 70px !important;
  }
}

.slider {
  display: flex !important;
  transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1) !important;
  width: 100% !important;
  height: auto !important;
}

.slide {
  position: relative !important;
  width: 100vw !important;
  flex-shrink: 0 !important;
  aspect-ratio: 2 / 1 !important;
  max-height: 720px !important;
  height: auto !important;
  overflow: hidden !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  background: transparent !important;
}

/* Slide Standar: Full-bleed Cover (Tepat 2:1, Bersih Tanpa Blok Gelap) */
.slide.slide-standard {
  background: transparent !important;
}

.slide-standard-img {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover !important;
  object-position: center !important;
  margin: 0 !important;
  display: block !important;
}

/* Slide Non-Standar: Ambient Blur Backdrop & Contain */
.slide.slide-non-standard {
  background: #081426 !important;
}

.slide-ambient-blur {
  position: absolute !important;
  inset: -15px !important;
  width: calc(100% + 30px) !important;
  height: calc(100% + 30px) !important;
  overflow: hidden !important;
  pointer-events: none !important;
  z-index: 1 !important;
}

.slide-ambient-blur img {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover !important;
  filter: blur(25px) brightness(0.9) saturate(1.2) !important;
  transform: scale(1.15) !important;
  margin: 0 !important;
  display: block !important;
}

.slide-ambient-overlay {
  position: absolute !important;
  inset: 0 !important;
  background: rgba(8, 20, 38, 0.25) !important;
}

.slide-content-link,
.slide-content-wrapper {
  position: relative !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: 100% !important;
  height: 100% !important;
  z-index: 2 !important;
  text-decoration: none !important;
}

.slide-main-image-container {
  position: relative !important;
  width: 100% !important;
  height: 100% !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
}

.slide-contain-img {
  width: 100% !important;
  height: 100% !important;
  object-fit: contain !important;
  object-position: center !important;
  margin: 0 !important;
  display: block !important;
  filter: drop-shadow(0 10px 25px rgba(0, 0, 0, 0.45)) !important;
  transition: transform 0.4s ease !important;
}

.slide-content-link:hover .slide-contain-img,
.slide-content-link:hover .slide-standard-img {
  transform: scale(1.01) !important;
}

/* Dynamic Caption Overlay */
.slide-caption-wrapper {
  position: absolute !important;
  bottom: 8% !important;
  left: 0 !important;
  right: 0 !important;
  width: 100% !important;
  background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.55) 25%, rgba(0, 0, 0, 0.65) 75%, rgba(0, 0, 0, 0) 100%) !important;
  padding: 16px 24px !important;
  display: flex !important;
  justify-content: center !important;
  align-items: center !important;
  text-align: center !important;
  z-index: 3 !important;
  pointer-events: none !important;
}

.slide-caption-title {
  color: #ffffff !important;
  font-family: 'Montserrat', 'Plus Jakarta Sans', sans-serif !important;
  font-size: clamp(16px, 3.2vw, 36px) !important;
  font-weight: 800 !important;
  line-height: 1.35 !important;
  margin: 0 !important;
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.85) !important;
  letter-spacing: -0.2px !important;
  max-width: 1100px !important;
}

.slide-caption-title em,
.slide-caption-title i {
  font-style: italic !important;
  font-weight: 800 !important;
}

.slider-buttons {
  z-index: 10 !important;
}

@media (max-width: 768px) {
  .slide-caption-wrapper {
    bottom: 5% !important;
    padding: 8px 14px !important;
    background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.62) 20%, rgba(0, 0, 0, 0.7) 80%, rgba(0, 0, 0, 0) 100%) !important;
  }
  .slide-caption-title {
    font-size: clamp(13px, 4vw, 18px) !important;
    line-height: 1.25 !important;
  }
}

.video-section-pmb {
  width: 100% !important;
  margin: 0 !important;
  padding: 45px 20px 50px !important;
  background: #f8fafc !important;
  border-top: 1px solid #e2e8f0 !important;
  border-bottom: 1px solid #e2e8f0 !important;
  text-align: center !important;
}

.video-section-pmb .video-inner {
  max-width: 960px;
  margin: 0 auto;
}

.video-section-pmb .video-title {
  color: #102C53 !important;
  font-size: 26px !important;
  font-weight: 700 !important;
  margin: 0 0 8px 0 !important;
  line-height: 1.35 !important;
  letter-spacing: -0.2px;
}

.video-section-pmb .video-subtitle {
  color: #64748b;
  font-size: 14px;
  margin: 0 auto 22px auto;
  max-width: 650px;
  line-height: 1.5;
}

.video-section-pmb .video-wrapper {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
  height: 0;
  overflow: hidden;
  background: #000000;
  border-radius: 14px;
  box-shadow: 0 14px 35px rgba(16, 44, 83, 0.12);
  border: 1px solid rgba(226, 232, 240, 0.8);
}

.video-section-pmb .video-wrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100% !important;
  height: 100% !important;
  border: 0;
}

.video-section-pmb .video-action-wrap {
  margin-top: 28px;
  text-align: center;
}

.video-section-pmb a.btn-video-more,
.video-section-pmb .btn-video-more {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 10px !important;
  background: #102C53 !important;
  background-color: #102C53 !important;
  color: #ffffff !important;
  font-size: 15px !important;
  font-weight: 600 !important;
  padding: 12px 30px !important;
  border-radius: 30px !important;
  text-decoration: none !important;
  box-shadow: 0 4px 14px rgba(16, 44, 83, 0.2) !important;
  transition: all 0.25s ease !important;
  border: 1px solid #102C53 !important;
}

.video-section-pmb a.btn-video-more span,
.video-section-pmb a.btn-video-more i,
.video-section-pmb .btn-video-more span,
.video-section-pmb .btn-video-more i {
  color: #ffffff !important;
}

.video-section-pmb a.btn-video-more:hover,
.video-section-pmb .btn-video-more:hover {
  background: #1e4b85 !important;
  background-color: #1e4b85 !important;
  color: #ffffff !important;
  border-color: #1e4b85 !important;
  transform: translateY(-2px);
  box-shadow: 0 8px 22px rgba(16, 44, 83, 0.28) !important;
}

.video-section-pmb a.btn-video-more i,
.video-section-pmb .btn-video-more i {
  transition: transform 0.25s ease;
  font-size: 13px;
}

.video-section-pmb a.btn-video-more:hover i,
.video-section-pmb .btn-video-more:hover i {
  transform: translateX(4px);
}

@media (max-width: 767px) {
  .video-section-pmb {
    padding: 30px 15px 35px !important;
  }
  .video-section-pmb .video-title {
    font-size: 20px !important;
    margin-bottom: 6px !important;
  }
  .video-section-pmb .video-subtitle {
    font-size: 13px;
    margin-bottom: 16px;
  }
  .video-section-pmb .video-wrapper {
    border-radius: 10px;
  }
  .video-section-pmb a.btn-video-more,
  .video-section-pmb .btn-video-more {
    font-size: 14px !important;
    padding: 11px 24px !important;
  }
}
</style>
@endpush

<div class="video-section-pmb">
    <div class="video-inner">
        <h2 class="video-title">
            Film Pendek Hasil Latihan AI Mahasiswa
        </h2>
        <p class="video-subtitle">
            Terima Kasih Pihak Sponsor Acara PERKASA 2026
        </p>
        <div class="video-wrapper">
            <iframe 
                src="https://www.youtube.com/embed/3AdW-_NuwIU?autoplay=1&mute=1&loop=1&playlist=3AdW-_NuwIU&playsinline=1&rel=0&controls=1" 
                title="Film Pendek Hasil Latihan AI Mahasiswa" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen>
            </iframe>
        </div>

        <!-- Tombol Lihat Video Lainnya -->
        <div class="video-action-wrap">
            <a href="/video-ai" class="btn-video-more">
                <span>Lihat Video Lainnya</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="container baseColor">
    <div class="grid-container baseColor">
        @foreach($gridFeatures as $idx => $feature)
            <div class="grid-item">
                <img src="{{ $feature->image_url }}" alt="{{ $feature->title }}" loading="lazy" decoding="async" />
                <h3 class="fs15" data-translate="grid-{{ $idx + 1 }}">{!! $feature->title !!}</h3>
            </div>
        @endforeach
    </div>
</div>

<div class="container greyColor">
    <div class="custom-grid-container">
        <img src="{{ asset('assets/images-new/images10.jpg') }}" alt="⁠Project-nya berasal dari berbagai perusahaan di dalam dan luar Kawasan Industri MM2100." height="200px" loading="lazy" decoding="async" />
        <div class="custom-grid-text">
            <h3 class="fs32" data-translate="project"><i>⁠Project</i>-nya berasal dari berbagai perusahaan di dalam dan luar Kawasan Industri MM2100.</h3>
        </div>
    </div>
</div>

<div class="container" style="padding-bottom: 0px;">
    <h3 class="prodi fs32 pt5 pr20 pl20 center-text" data-translate="prodi-title">Prodi Sarjana Terapan (D4) dengan prospek cerah.</h3>
    <picture>
        <source id="src-prodi-sp" media="(max-width: 767px)" srcset="{{ asset('assets/images/prodi-sp.png') }}">
        <img id="img-prodi" src="{{ asset('assets/images/prodi.png') }}" alt="Prodi Sarjana Terapan (D4) dengan prospek cerah." class="img-center" loading="lazy" decoding="async">
    </picture>
</div>

<div class="container quote-box">
    <p class="quote-text" data-translate="quote">
        <span class="quote-icon left">“</span>
        Terbuka juga bagi Karyawan yang ingin melanjutkan studi Sarjana Terapan!
        <span class="quote-icon right">”</span>
    </p>
</div>

<div class="container">
    <div class="custom-grid-container">
        <img src="{{ asset('assets/images-new/dosen2026.jpeg') }}" alt="Tim dosen terdiri dari gabungan dosen profesional serta expert dan praktisi industri." loading="lazy" decoding="async" />
        <div class="custom-grid-text">
            <h3 class="fs32" data-translate="lecturers-desc">Tim dosen terdiri dari gabungan dosen profesional serta <i>expert</i> dan praktisi industri.</h3>
        </div>
    </div>
</div>

<div class="container greyColor">
    <div class="custom-grid-container">
        <img src="{{ asset('assets/images-new/images14.jpg') }}" alt="⁠Mengutamakan pembentukan karakter dan attitude siap kerja." loading="lazy" decoding="async" />
        <div class="custom-grid-text">
            <h3 class="fs32" data-translate="character">⁠Mengutamakan pembentukan karakter dan <i>attitude</i> siap kerja.</h3>
        </div>
    </div>
</div>

<div class="container">
    <div class="custom-grid-container">
        <img src="{{ asset('assets/images-new/images13.jpg') }}" alt="Pola perkuliahan 30% Teori : 70% Praktek." loading="lazy" decoding="async" />
        <div class="custom-grid-text">
            <h3 class="fs32" data-translate="learning-model">Pola perkuliahan 30% Teori : 70% Praktek.</h3>
        </div>
    </div>
</div>

<style>
    .news-category-buttons { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin: 16px auto 8px; max-width: 800px; }
    .news-filter-btn { border: 1px solid #102C53; background: #fff; color: #102C53; padding: 10px 18px; border-radius: 999px; cursor: pointer; transition: all .2s ease; font-weight: 500; }
    .news-filter-btn.active, .news-filter-btn:hover { background: #102C53; color: #fff; }
    .news-empty-message { color: #102C53; margin-bottom: 20px; text-align: center; }

    /* Desktop News Pagination (8 Berita / Halaman) */
    .desktop-news-pagination { display: none; }
    @media (min-width: 768px) {
        .desktop-news-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 36px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .desktop-news-pagination .page-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 42px;
            height: 42px;
            padding: 0 16px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            background-color: #ffffff;
            color: #102C53;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            user-select: none;
        }
        .desktop-news-pagination .page-btn:hover:not(:disabled):not(.active) {
            background-color: #f1f5f9;
            border-color: #102C53;
            color: #102C53;
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(16, 44, 83, 0.12);
        }
        .desktop-news-pagination .page-btn.active {
            background-color: #102C53;
            border-color: #102C53;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(16, 44, 83, 0.25);
            cursor: default;
        }
        .desktop-news-pagination .page-btn:disabled {
            opacity: 0.45;
            cursor: not-allowed;
            background-color: #f8fafc;
            border-color: #e2e8f0;
            color: #94a3b8;
            box-shadow: none;
            transform: none;
        }
        .desktop-news-pagination .page-ellipsis {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 28px;
            height: 42px;
            color: #64748b;
            font-weight: 700;
            font-size: 1rem;
            user-select: none;
        }
    }
    @media (max-width: 767px) {
        .desktop-news-pagination { display: none !important; }
    }
</style>

<!-- News -->
<div class="news-section">
    <h2 class="prodi">
        <a href="/beranda/berita" style="text-decoration: none;">
            <span class="highlight-box"><span class="highlight-text" data-translate="news">Berita</span></span>
            <span class="partner-text" data-translate="latest">Terkini</span>
        </a>
    </h2>
    <div class="news-category-buttons" style="margin-bottom:10px;">
        <button type="button" class="news-filter-btn active" data-category="all">Semua</button>
        @foreach($categories as $cat)
            <button type="button" class="news-filter-btn" data-category="{{ $cat->slug }}">{{ $cat->name }}</button>
        @endforeach
    </div>
    <div id="news-empty-message" class="news-empty-message" style="display:none;">Tidak ada berita untuk kategori ini.</div>

    <!-- Swiper Container -->
    <div class="swiper news-slider">
      <div class="swiper-wrapper">
        @foreach($latestNews as $item)
          <div class="swiper-slide">
            <div class="news-card" data-category="{{ strtolower($item->category ?? ($item->categoryRel->slug ?? 'umum')) }}">
              <a href="/beranda/berita/{{ $item->slug }}" style="text-decoration: none;">
                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" loading="lazy" decoding="async">
                <div class="news-content" style="color: #102C53;">
                  <div class="news-title">{{ $item->title }}</div>
                  <div class="news-date">{{ $item->formatted_date }}</div>
                  <div class="news-summary">{{ Str::limit($item->summary, 130) }}</div>
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Pagination Bulatan (Mobile Only) -->
      <div class="swiper-pagination"></div>
    </div>

    <!-- Pagination Desktop (8 Berita per Halaman) -->
    <div class="desktop-news-pagination" id="desktop-news-pagination"></div>
</div>

<!-- Partner Kami (Slider Otomatis Dinamis) -->
<div class="container partner-section-wrap">
    <h2 class="prodi" style="margin-bottom: 6px;">
        <span class="highlight-box"><span class="highlight-text" data-translate="partner">Mitra</span></span>
        <span class="partner-text" data-translate="our">Kami</span>
    </h2>
    <p class="partner-section-subtitle" data-translate="partner-sub">
        Kolaborasi strategis bersama industri manufaktur terkemuka, teknologi global, BUMN, dan perguruan tinggi bergengsi.
    </p>

    @if(isset($partners) && $partners->isNotEmpty())
        <div class="partner-marquee-wrapper" aria-label="Slider Logo Mitra Industri dan Kampus">
            <div class="partner-marquee-track">
                <!-- Track 1: Original List -->
                <div class="partner-track-group">
                    @foreach($partners as $partner)
                        @if($partner->website_url)
                            <a href="{{ $partner->website_url }}" target="_blank" rel="noopener noreferrer" class="partner-card" title="{{ $partner->name }}">
                        @else
                            <div class="partner-card" title="{{ $partner->name }}">
                        @endif
                            <div class="partner-card-logo">
                                <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}" class="partner-logo-img" loading="lazy" decoding="async">
                            </div>
                            <div class="partner-card-name">{{ $partner->name }}</div>
                        @if($partner->website_url)
                            </a>
                        @else
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Track 2: Duplicate List for Seamless Infinite Loop -->
                <div class="partner-track-group" aria-hidden="true">
                    @foreach($partners as $partner)
                        @if($partner->website_url)
                            <a href="{{ $partner->website_url }}" target="_blank" rel="noopener noreferrer" class="partner-card" tabindex="-1">
                        @else
                            <div class="partner-card">
                        @endif
                            <div class="partner-card-logo">
                                <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}" class="partner-logo-img" loading="lazy" decoding="async">
                            </div>
                            <div class="partner-card-name">{{ $partner->name }}</div>
                        @if($partner->website_url)
                            </a>
                        @else
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="banner">
            <p style="text-align: center; color: #64748b; padding: 24px;">Data mitra industri sedang disinkronkan.</p>
        </div>
    @endif
</div>

<style>
    /* Styling Slider Otomatis Mitra Kami */
    .partner-section-wrap {
        margin-top: 50px;
        margin-bottom: 24px;
        position: relative;
    }
    .partner-section-subtitle {
        text-align: center;
        color: #64748b;
        font-size: 14.5px;
        margin-top: 4px;
        margin-bottom: 20px;
        font-weight: 400;
        max-width: 780px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.5;
    }
    .partner-marquee-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding: 16px 0 28px;
        mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
        -webkit-mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
    }
    .partner-marquee-track {
        display: flex;
        width: max-content;
        will-change: transform;
        animation: scrollPartnerMarquee 50s linear infinite;
    }
    .partner-marquee-wrapper:hover .partner-marquee-track {
        animation-play-state: paused;
    }
    .partner-track-group {
        display: flex;
        align-items: stretch;
        gap: 16px;
        padding-right: 16px;
    }
    .partner-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 185px;
        min-width: 185px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px 14px 14px;
        text-decoration: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), 
                    box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), 
                    border-color 0.25s ease;
        cursor: pointer;
        user-select: none;
    }
    .partner-card:hover {
        transform: translateY(-5px);
        border-color: #3b82f6;
        box-shadow: 0 12px 28px -6px rgba(16, 44, 83, 0.14), 0 4px 8px -2px rgba(0, 0, 0, 0.04);
    }
    .partner-card-logo {
        height: 64px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }
    .partner-logo-img {
        max-height: 100%;
        max-width: 100%;
        width: auto;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.72;
        transition: filter 0.35s ease, opacity 0.35s ease, transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .partner-card:hover .partner-logo-img {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.08);
    }
    .partner-card-name {
        font-size: 11.5px;
        font-weight: 500;
        color: #475569;
        text-align: center;
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 31px;
        transition: color 0.25s ease, font-weight 0.2s ease;
    }
    .partner-card:hover .partner-card-name {
        color: #102C53;
        font-weight: 700;
    }

    @keyframes scrollPartnerMarquee {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    @media (max-width: 768px) {
        .partner-section-subtitle {
            font-size: 13px;
            padding: 0 12px;
            margin-bottom: 16px;
        }
        .partner-card {
            width: 155px;
            min-width: 155px;
            padding: 12px 10px 10px;
        }
        .partner-card-logo {
            height: 50px;
            margin-bottom: 8px;
        }
        .partner-card-name {
            font-size: 10.5px;
            min-height: 28px;
        }
        .partner-marquee-track {
            animation-duration: 42s;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .partner-marquee-track {
            animation: none;
            overflow-x: auto;
            width: 100%;
            padding-bottom: 12px;
        }
        .partner-marquee-wrapper {
            mask-image: none;
            -webkit-mask-image: none;
        }
    }
</style>

<!-- Sambutan -->
<div class="container-wrapper pb0">
    <div class="wrapper">
        <img src="{{ asset('assets/images/shape-garis.png') }}" alt="Background Shape" class="shape-bg" loading="lazy" decoding="async">

        <div class="sambutan">
            <h2 class="title-dir h2Dir hide-pc">
                <span class="highlight-box2"><span class="highlight-text" data-translate="welcome-title">Sambutan</span></span>
                <span class="partner-text" data-translate="director">Direktur</span>
            </h2>

            <img src="{{ asset($settings['director_photo']) }}" alt="{{ $settings['director_name'] }}" class="photo" loading="lazy" decoding="async">

            <div class="text-box-container">
                <h2 class="title-dir h2Dir hide-mobile">
                    <span class="highlight-box2"><span class="highlight-text" data-translate="welcome-title">Sambutan</span></span>
                    <span class="partner-text" data-translate="director">Direktur</span>
                </h2>
                <!-- Box Teks Sambutan -->
                <div class="text-box">
                    <p data-translate="welcome-text">
                        {!! nl2br(e($settings['director_message'])) !!}
                    </p>
                    <p data-translate="welcome-director">
                        – <strong>{{ $settings['director_name'] }}</strong><br>
                        {{ $settings['director_title'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button register -->
<div class="cta-container">
    <img src="{{ asset('assets/images-new/images12.jpg') }}" alt="Daftar Sekarang Politeknik Mitra Industri" class="cta-image" loading="lazy" decoding="async">
    <a href="/pmb" class="cta-button" data-translate="register-now">Daftar Sekarang</a>
</div>
@endsection
