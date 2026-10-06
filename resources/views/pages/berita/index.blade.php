@extends('layouts.frontend')

@section('title', 'Berita & Informasi Terkini | Politeknik Mitra Industri')
@section('meta_description', 'Kumpulan berita terbaru, siaran pers, kemitraan industri global, dan agenda kegiatan mahasiswa Politeknik Mitra Industri (Polmind) MM2100.')
@section('canonical', 'https://polmind.ac.id/beranda/berita')

@section('content')
<div class="container" style="padding-top: 165px; min-height: 70vh;">
  <h1 class="center-text" style="color: #102C53; font-size: 32px; font-weight: 700; margin-bottom: 25px;">Berita & Informasi Terkini</h1>
  
  <div style="margin: 20px 0px 25px 0px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
    <a href="javascript:history.back()" class="back-button mb15">← Kembali</a>

    <!-- Category filter tags -->
    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
      <a href="/beranda/berita" class="btn" style="padding: 6px 14px; border-radius: 20px; text-decoration: none; font-size: 13px; font-weight: 600; {{ !request('category') || request('category') == 'all' ? 'background: #102C53; color: white;' : 'background: #e9eef7; color: #102C53;' }}">Semua</a>
      @foreach($categories as $cat)
        <a href="/beranda/berita?category={{ $cat->slug }}" class="btn" style="padding: 6px 14px; border-radius: 20px; text-decoration: none; font-size: 13px; font-weight: 600; {{ request('category') == $cat->slug ? 'background: #102C53; color: white;' : 'background: #e9eef7; color: #102C53;' }}">{{ $cat->name }}</a>
      @endforeach
    </div>
  </div>

  @forelse($news as $article)
    <div class="card bg-light" style="margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.06); overflow: hidden; background: #fafafa; border: 1px solid #eef2f6;">
      <div class="card-header" style="padding: 15px 20px 5px;">
        <a href="/beranda/berita/{{ $article->slug }}" style="text-decoration:none;">
          <h2 class="b-600 fs24" style="color: #102c53; text-align:left; font-size: 20px; line-height: 1.4; margin-bottom: 6px;">{{ $article->title }}</h2>
          <p class="breadcrumb ml5" style="color: #64748b; font-size: 13px;">
            <i class="far fa-user"></i> {{ $article->author }} &nbsp;|&nbsp; 
            <i class="far fa-calendar-alt"></i> {{ $article->formatted_date }} &nbsp;|&nbsp; 
            <span style="text-transform: capitalize; background: #e0e7ff; color: #3730a3; padding: 2px 8px; border-radius: 4px; font-size: 11px;">{{ $article->category }}</span>
          </p>
        </a>
      </div>
      <div class="card-body" style="padding: 5px 20px 20px;">
        <p class="ml5 lh1-5 mt10" style="color: #475569;">{{ $article->summary }}</p>
      </div>
    </div>
  @empty
    <div style="text-align: center; padding: 50px 20px; color: #64748b;">
      <p style="font-size: 18px;">Belum ada berita dalam kategori ini.</p>
    </div>
  @endforelse

</div>
@endsection
