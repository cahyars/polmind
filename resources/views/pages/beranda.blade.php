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
            <div class="news-card" data-category="{{ strtolower($item->category) }}">
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

      <!-- Pagination Bulatan -->
      <div class="swiper-pagination"></div>
    </div>
</div>

<!-- Partner Kami -->
<div class="container">
    <h2 class="prodi">
        <span class="highlight-box"><span class="highlight-text" data-translate="partner">Mitra</span></span>
        <span class="partner-text" data-translate="our">Kami</span>
    </h2>
    <div class="banner">
        <img src="{{ asset('assets/images/images11.png') }}" alt="Mitra Industri Politeknik Mitra Industri" class="partnerImg" loading="lazy" decoding="async">
    </div>
</div>

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
