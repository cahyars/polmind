@extends('layouts.frontend')

@section('title', 'Berita & Informasi Terkini | Politeknik Mitra Industri')
@section('meta_description', 'Kumpulan berita terbaru, siaran pers, kemitraan industri global, dan agenda kegiatan mahasiswa Politeknik Mitra Industri (Polmind) MM2100.')
@section('canonical', 'https://polmind.ac.id/beranda/berita')

@push('styles')
<style>
  .news-index-container {
    padding-top: 165px;
    padding-bottom: 60px;
    min-height: 75vh;
  }

  @media (max-width: 991px) {
    .news-index-container {
      padding-top: 150px;
      padding-bottom: 50px;
    }
  }

  @media (max-width: 767px) {
    .news-index-container {
      padding-top: 130px;
      padding-bottom: 40px;
    }
  }

  /* Filter category pills */
  .category-pill {
    padding: 7px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s ease;
    display: inline-block;
  }

  .category-pill.active {
    background: #102C53;
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(16, 44, 83, 0.2);
  }

  .category-pill.inactive {
    background: #e9eef7;
    color: #102C53;
  }

  .category-pill.inactive:hover {
    background: #d8e2f3;
    color: #0c203d;
  }

  /* Berita Card Component with Right-side Thumbnail */
  .berita-card {
    display: flex;
    flex-direction: row;
    align-items: stretch;
    justify-content: space-between;
    gap: 24px;
    background: #ffffff;
    border: 1px solid #eef2f6;
    border-radius: 12px;
    padding: 22px 24px;
    margin-bottom: 22px;
    box-shadow: 0 2px 8px rgba(16, 44, 83, 0.05);
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    overflow: hidden;
  }

  .berita-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(16, 44, 83, 0.09);
    border-color: #cbd5e1;
  }

  /* Left: Content Area */
  .berita-card-body {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .berita-title-link {
    text-decoration: none;
    display: block;
  }

  .berita-card-title {
    color: #102C53;
    text-align: left;
    font-size: 20px;
    line-height: 1.4;
    font-weight: 700;
    margin: 0 0 8px 0;
    transition: color 0.2s ease;
  }

  .berita-card:hover .berita-card-title,
  .berita-title-link:hover .berita-card-title {
    color: #1d4ed8;
  }

  .berita-card-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px 10px;
    color: #64748b;
    font-size: 13px;
    margin-bottom: 12px;
  }

  .berita-card-meta i {
    color: #94a3b8;
    margin-right: 3px;
  }

  .meta-dot {
    color: #cbd5e1;
    font-size: 14px;
  }

  .berita-category-badge {
    text-transform: capitalize;
    background: #e0e7ff;
    color: #3730a3;
    padding: 2px 10px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.2px;
  }

  .berita-card-summary {
    color: #475569;
    font-size: 14.5px;
    line-height: 1.6;
    margin: 0 0 16px 0;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .berita-card-footer {
    margin-top: auto;
    display: flex;
    align-items: center;
  }

  .berita-read-more {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13.5px;
    font-weight: 600;
    color: #102C53;
    text-decoration: none;
    transition: color 0.2s ease, transform 0.2s ease;
  }

  .berita-read-more i {
    font-size: 12px;
    transition: transform 0.2s ease;
  }

  .berita-read-more:hover {
    color: #1d4ed8;
  }

  .berita-read-more:hover i {
    transform: translateX(4px);
  }

  /* Right: Thumbnail Area */
  .berita-card-thumb {
    width: 260px;
    min-width: 260px;
    max-width: 260px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
  }

  .berita-thumb-link {
    display: block;
    width: 100%;
    height: 170px;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    background: #f1f5f9;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    text-decoration: none;
  }

  .berita-thumb-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.35s ease;
  }

  .berita-card:hover .berita-thumb-img {
    transform: scale(1.05);
  }

  /* Responsive Breakpoints */
  @media (max-width: 991px) {
    .berita-card-thumb {
      width: 220px;
      min-width: 220px;
      max-width: 220px;
    }
    .berita-thumb-link {
      height: 155px;
    }
    .berita-card-title {
      font-size: 19px;
    }
  }

  @media (max-width: 767px) {
    .berita-card {
      flex-direction: column-reverse;
      padding: 16px;
      gap: 16px;
    }
    .berita-card-thumb {
      width: 100%;
      min-width: 100%;
      max-width: 100%;
    }
    .berita-thumb-link {
      height: 190px;
      border-radius: 8px;
    }
    .berita-card-title {
      font-size: 18px;
    }
    .berita-card-summary {
      font-size: 14px;
      -webkit-line-clamp: 2;
    }
  }
</style>
@endpush

@section('content')
<div class="container news-index-container">
  <h1 class="center-text" style="color: #102C53; font-size: 32px; font-weight: 700; margin-bottom: 25px;">Berita & Informasi Terkini</h1>
  
  <div style="margin: 20px 0px 25px 0px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
    <a href="javascript:history.back()" class="back-button mb15">← Kembali</a>

    <!-- Category filter tags -->
    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
      <a href="/beranda/berita" class="category-pill {{ !request('category') || request('category') == 'all' ? 'active' : 'inactive' }}">Semua</a>
      @foreach($categories as $cat)
        <a href="/beranda/berita?category={{ $cat->slug }}" class="category-pill {{ request('category') == $cat->slug ? 'active' : 'inactive' }}">{{ $cat->name }}</a>
      @endforeach
    </div>
  </div>

  @forelse($news as $article)
    <article class="berita-card">
      <!-- Left side: Content -->
      <div class="berita-card-body">
        <div>
          <a href="/beranda/berita/{{ $article->slug }}" class="berita-title-link">
            <h2 class="berita-card-title">{{ $article->title }}</h2>
          </a>
          <div class="berita-card-meta">
            <span><i class="far fa-user"></i> {{ $article->author ?: 'Humas Polmind' }}</span>
            <span class="meta-dot">•</span>
            <span><i class="far fa-calendar-alt"></i> {{ $article->formatted_date }}</span>
            @if($article->category)
              <span class="meta-dot">•</span>
              <span class="berita-category-badge">{{ $article->category }}</span>
            @endif
          </div>
          <p class="berita-card-summary">{{ $article->summary }}</p>
        </div>
        <div class="berita-card-footer">
          <a href="/beranda/berita/{{ $article->slug }}" class="berita-read-more">
            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <!-- Right side: Thumbnail -->
      <div class="berita-card-thumb">
        <a href="/beranda/berita/{{ $article->slug }}" class="berita-thumb-link" aria-label="{{ $article->title }}">
          <img 
            src="{{ $article->image_url }}" 
            alt="{{ $article->title }}" 
            class="berita-thumb-img"
            loading="lazy" 
            decoding="async"
            onerror="this.onerror=null; this.src='{{ asset('assets/images/news01.jpg') }}';"
          >
        </a>
      </div>
    </article>
  @empty
    <div style="text-align: center; padding: 60px 20px; color: #64748b; background: #ffffff; border-radius: 12px; border: 1px dashed #cbd5e1; margin-top: 20px;">
      <i class="far fa-newspaper" style="font-size: 40px; color: #94a3b8; margin-bottom: 12px; display: block;"></i>
      <p style="font-size: 18px; font-weight: 600; color: #334155; margin-bottom: 6px;">Belum Ada Berita</p>
      <p style="font-size: 14px; color: #64748b; margin: 0;">Belum ada artikel berita yang dipublikasikan dalam kategori ini.</p>
    </div>
  @endforelse

</div>
@endsection
