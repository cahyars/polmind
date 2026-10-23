@extends('layouts.frontend')

@section('title', 'Video AI Karya Mahasiswa | Politeknik Mitra Industri')
@section('meta_description', 'Kumpulan video AI hasil karya mahasiswa Politeknik Mitra Industri MM2100 Cikarang.')
@section('canonical', url('/video-ai'))

@push('styles')
<style>
  .video-page-container {
    padding-top: 160px;
    padding-bottom: 70px;
    min-height: 80vh;
    max-width: 1040px;
    margin: 0 auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
  }

  /* Top Navigation Row */
  .video-nav-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 24px;
  }

  .video-back-btn {
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    background-color: #102C53 !important;
    color: #ffffff !important;
    font-size: 13.5px !important;
    font-weight: 600 !important;
    padding: 8px 18px !important;
    border-radius: 6px !important;
    text-decoration: none !important;
    margin: 0 !important;
    transition: background 0.2s ease, transform 0.2s ease !important;
  }

  .video-back-btn:hover {
    background-color: #1e4b85 !important;
    color: #ffffff !important;
    transform: translateX(-2px);
  }

  .video-breadcrumb {
    font-size: 13px;
    color: #64748b;
  }

  .video-breadcrumb a {
    color: #64748b;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .video-breadcrumb a:hover {
    color: #102C53;
  }

  .video-breadcrumb span.sep {
    margin: 0 6px;
    color: #cbd5e1;
  }

  .video-breadcrumb span.active {
    color: #102C53;
    font-weight: 600;
  }

  /* Main Title */
  .video-header-wrap {
    text-align: center;
    margin-bottom: 35px;
  }

  .video-page-title {
    color: #102C53 !important;
    font-size: 30px !important;
    font-weight: 700 !important;
    line-height: 1.35 !important;
    margin: 0 auto !important;
    text-align: center !important;
  }

  /* Landscape Video Card */
  .video-card-landscape {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 6px 20px rgba(16, 44, 83, 0.06);
    margin: 0 auto 35px;
    max-width: 960px;
    box-sizing: border-box;
    transition: box-shadow 0.25s ease, border-color 0.25s ease;
  }

  .video-card-landscape:hover {
    box-shadow: 0 10px 28px rgba(16, 44, 83, 0.1);
    border-color: #cbd5e1;
  }

  .video-card-landscape .video-item-title {
    color: #102C53 !important;
    font-size: 19px !important;
    font-weight: 700 !important;
    line-height: 1.45 !important;
    margin: 0 0 16px 0 !important;
    text-align: left !important;
  }

  .video-player-16-9 {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
    background: #000000;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
  }

  .video-player-16-9 iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
  }

  /* Shorts / Portrait Section */
  .shorts-grid-wrap {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 24px;
    max-width: 1040px;
    margin: 0 auto 40px;
    box-sizing: border-box;
  }

  .shorts-card {
    flex: 1 1 290px;
    max-width: 330px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 18px;
    box-shadow: 0 6px 20px rgba(16, 44, 83, 0.06);
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  }

  .shorts-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(16, 44, 83, 0.1);
    border-color: #cbd5e1;
  }

  .shorts-card .shorts-item-title {
    color: #102C53 !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    line-height: 1.4 !important;
    margin: 0 0 12px 0 !important;
    text-align: left !important;
  }

  .shorts-player-9-16 {
    position: relative;
    width: 100%;
    padding-bottom: 177.77%; /* 9:16 Portrait Aspect Ratio */
    height: 0;
    background: #0b0f19;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
  }

  .shorts-player-9-16 iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
  }

  /* Mobile Optimizations */
  @media (max-width: 991px) {
    .video-page-container {
      padding-top: 145px;
      padding-bottom: 50px;
    }
    .video-page-title {
      font-size: 26px !important;
    }
  }

  @media (max-width: 767px) {
    .video-page-container {
      padding-top: 125px;
      padding-bottom: 35px;
      padding-left: 14px;
      padding-right: 14px;
    }

    .video-nav-row {
      margin-bottom: 18px;
    }

    .video-header-wrap {
      margin-bottom: 24px;
    }

    .video-page-title {
      font-size: 22px !important;
      text-align: center !important;
    }

    .video-card-landscape {
      padding: 14px;
      border-radius: 12px;
      margin-bottom: 24px;
    }

    .video-card-landscape .video-item-title {
      font-size: 16px !important;
      margin-bottom: 10px !important;
    }

    .video-player-16-9 {
      border-radius: 8px;
    }

    .shorts-grid-wrap {
      gap: 20px;
      margin-bottom: 30px;
    }

    .shorts-card {
      flex: 1 1 100%;
      max-width: 360px;
      margin: 0 auto;
      padding: 14px;
      border-radius: 12px;
    }

    .shorts-card .shorts-item-title {
      font-size: 15px !important;
      margin-bottom: 10px !important;
    }

    .shorts-player-9-16 {
      border-radius: 8px;
    }
  }
</style>
@endpush

@section('content')
<div class="container video-page-container">
  
  <!-- Baris Navigasi Atas -->
  <div class="video-nav-row">
    <a href="javascript:history.back()" class="video-back-btn">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <div class="video-breadcrumb">
      <a href="/">Beranda</a>
      <span class="sep">/</span>
      <span class="active">Video AI Mahasiswa</span>
    </div>
  </div>

  <!-- Judul Halaman -->
  <div class="video-header-wrap">
    <h1 class="video-page-title">Video AI Hasil Karya Mahasiswa</h1>
  </div>

  @php
    $landscapeVideos = collect($videos)->where('type', 'landscape')->values();
    $shortsVideos = collect($videos)->where('type', 'shorts')->values();
  @endphp

  <!-- 1. Video Landscape -->
  @foreach($landscapeVideos as $vid)
    <article class="video-card-landscape">
      <h2 class="video-item-title">{{ $vid['title'] }}</h2>
      <div class="video-player-16-9">
        <iframe 
          src="{{ $vid['embed_url'] }}?rel=0&playsinline=1" 
          title="{{ $vid['title'] }}" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          referrerpolicy="strict-origin-when-cross-origin" 
          allowfullscreen>
        </iframe>
      </div>
    </article>
  @endforeach

  <!-- 2. Video Shorts / Portrait (Side-by-side on desktop, 1-col on mobile) -->
  @if($shortsVideos->isNotEmpty())
    <div class="shorts-grid-wrap">
      @foreach($shortsVideos as $short)
        <article class="shorts-card">
          <h3 class="shorts-item-title">{{ $short['title'] }}</h3>
          <div class="shorts-player-9-16">
            <iframe 
              src="{{ $short['embed_url'] }}?rel=0&playsinline=1" 
              title="{{ $short['title'] }}" 
              loading="lazy" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
              referrerpolicy="strict-origin-when-cross-origin" 
              allowfullscreen>
            </iframe>
          </div>
        </article>
      @endforeach
    </div>
  @endif

</div>
@endsection
