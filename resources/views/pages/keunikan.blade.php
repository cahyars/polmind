@extends('layouts.frontend')

@section('title', 'Keunikan & Keunggulan Kuliah | Politeknik Mitra Industri')
@section('meta_description', 'Keunikan dan Keunggulan Politeknik Mitra Industri: Kurikulum 70% Praktek, Teaching Factory (TEFA), Real Project Industri MM2100, Magang Global, dan Peluang Kerja.')
@section('canonical', 'https://polmind.ac.id/keunikan')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/keunikan.css') }}?v={{ file_exists(public_path('assets/css/keunikan.css')) ? filemtime(public_path('assets/css/keunikan.css')) : '1.0' }}">
<style>
  /* Sorot navigasi aktif di navbar */
  .desktop-nav ul li a[href="/keunikan"] {
    border-bottom: 2px solid #ffffff !important;
  }
</style>
@endpush

@section('content')
<div class="keunikan-page-wrapper">
  <div class="keunikan-container">
    
    <!-- Header Halaman -->
    <div class="keunikan-header">
      <h1 class="keunikan-main-title" data-translate="uniq-title">
        {{ $pageTitle ?? 'KEUNIKAN DAN KEUNGGULAN' }}
      </h1>
      <p class="keunikan-subtitle">
        {{ $pageSubtitle ?? 'Mengapa Memilih Politeknik Mitra Industri?' }}
      </p>
    </div>

    <!-- Daftar Blok Keunggulan (01, 02, 03...) -->
    <div class="keunikan-blocks-list">
      @forelse($blocks as $block)
        <section class="keunikan-block {{ $loop->even ? 'block-reverse' : '' }}" id="keunikan-block-{{ $block->order }}">
          
          <!-- Konten Teks & Checklist -->
          <div class="keunikan-block-content">
            <div class="keunikan-badge-number">
              {{ $block->badge_number ?: sprintf('%02d', $loop->iteration) }}
            </div>
            
            <h2 class="keunikan-block-title">
              {{ $block->title }}
            </h2>

            @if(count($block->points) > 0)
              <ul class="keunikan-points-list">
                @foreach($block->points as $point)
                  <li class="keunikan-point-item">
                    <span class="keunikan-point-icon" aria-hidden="true">
                      <i class="fas fa-check"></i>
                    </span>
                    <p class="keunikan-point-text">{!! $point !!}</p>
                  </li>
                @endforeach
              </ul>
            @else
              <p class="keunikan-point-text">{{ $block->description }}</p>
            @endif
          </div>

          <!-- Foto Kegiatan / Industri -->
          <div class="keunikan-block-image-wrap">
            <div class="keunikan-image-card">
              <img 
                src="{{ $block->image_url }}" 
                alt="{{ $block->title }} — Politeknik Mitra Industri" 
                loading="{{ $loop->first ? 'eager' : 'lazy' }}" 
                decoding="async"
                @if($loop->first) fetchpriority="high" @endif
              >
            </div>
          </div>

        </section>
      @empty
        <!-- Fallback Statis jika data belum tersedia -->
        <section class="keunikan-block">
          <div class="keunikan-block-content">
            <div class="keunikan-badge-number">01</div>
            <h2 class="keunikan-block-title">Project-Based Learning & TEFA</h2>
            <ul class="keunikan-points-list">
              <li class="keunikan-point-item">
                <span class="keunikan-point-icon"><i class="fas fa-check"></i></span>
                <p class="keunikan-point-text">Kuliah lebih fokus Project-Based Learning (Teaching Factory), tidak banyak di dalam ruang kelas.</p>
              </li>
              <li class="keunikan-point-item">
                <span class="keunikan-point-icon"><i class="fas fa-check"></i></span>
                <p class="keunikan-point-text">TEFA dan PjBL sejak semester awal.</p>
              </li>
              <li class="keunikan-point-item">
                <span class="keunikan-point-icon"><i class="fas fa-check"></i></span>
                <p class="keunikan-point-text"><em>Project-project</em>-nya berasal dari perusahaan/industri, dan <em>real project</em>.</p>
              </li>
            </ul>
          </div>
          <div class="keunikan-block-image-wrap">
            <div class="keunikan-image-card">
              <img src="/assets/images-new/images10.jpg" alt="PBL dan TEFA Polmind" loading="eager" fetchpriority="high">
            </div>
          </div>
        </section>
      @endforelse
    </div>

    <!-- Bagian Karir & Internasionalisasi (4 Kartu Grid) -->
    <section class="keunikan-career-section">
      <h2 class="keunikan-career-heading">
        {{ $careerTitle ?? 'Bagian Karir & Internasionalisasi' }}
      </h2>

      <div class="keunikan-career-grid">
        @forelse($careers as $career)
          <div class="keunikan-career-card">
            <div class="keunikan-career-icon-box">
              <i class="{{ $career->icon ?: 'fas fa-briefcase' }}"></i>
            </div>
            <h3 class="keunikan-career-title">{{ $career->title }}</h3>
            @if($career->subtitle)
              <div class="keunikan-career-note">{{ $career->subtitle }}</div>
            @endif
          </div>
        @empty
          <div class="keunikan-career-card">
            <div class="keunikan-career-icon-box"><i class="fas fa-briefcase"></i></div>
            <h3 class="keunikan-career-title">Magang di Industri</h3>
          </div>
          <div class="keunikan-career-card">
            <div class="keunikan-career-icon-box"><i class="fas fa-file-lines"></i></div>
            <h3 class="keunikan-career-title">Tugas Akhir/Skripsi dari project</h3>
          </div>
          <div class="keunikan-career-card">
            <div class="keunikan-career-icon-box"><i class="fas fa-handshake"></i></div>
            <h3 class="keunikan-career-title">Kesempatan Kerja</h3>
          </div>
          <div class="keunikan-career-card">
            <div class="keunikan-career-icon-box"><i class="fas fa-globe"></i></div>
            <h3 class="keunikan-career-title">Presentasi Bahasa Asing</h3>
          </div>
        @endforelse
      </div>
    </section>

  </div>
</div>
@endsection
