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
            <div class="slide">
                @if($slide->link)
                    <a href="{{ $slide->link }}">
                        <img src="{{ $slide->image_url }}"
                             alt="{{ $slide->title ?? 'Politeknik Mitra Industri' }}"
                             @if($loop->first) fetchpriority="high" @else fetchpriority="low" loading="lazy" decoding="async" @endif />
                    </a>
                @else
                    <img src="{{ $slide->image_url }}"
                         alt="{{ $slide->title ?? 'Politeknik Mitra Industri' }}"
                         @if($loop->first) fetchpriority="high" @else fetchpriority="low" loading="lazy" decoding="async" @endif />
                @endif
            </div>
        @empty
            <div class="slide">
                <img id="img-slider" src="{{ asset('assets/images/slider/polmind_vasanta.png') }}"
                     alt="Kampus Polmind Vasanta Innopark Kawasan Industri MM2100"
                     fetchpriority="high" />
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

<div class="textPmb">
    <a href="{{ $settings['pmb_cta_link'] }}" data-translate="signup">{{ $settings['pmb_cta_text'] }}</a>
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
