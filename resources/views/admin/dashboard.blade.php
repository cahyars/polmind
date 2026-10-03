@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Utama')

@section('content')
<!-- Stats Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 28px;">
  <div class="card" style="margin-bottom:0; padding: 20px; display: flex; align-items: center; gap: 18px;">
    <div style="width: 52px; height: 52px; border-radius: 12px; background: #e0e7ff; color: #3730a3; display: flex; align-items: center; justify-content: center; font-size: 22px;">
      <i class="fas fa-newspaper"></i>
    </div>
    <div>
      <div style="font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase;">Total Berita</div>
      <div style="font-size: 26px; font-weight: 800; color: #102C53;">{{ $stats['total_berita'] }}</div>
      <div style="font-size: 12px; color: #16a34a; font-weight: 500;">{{ $stats['published_berita'] }} telah dipublikasikan</div>
    </div>
  </div>

  <div class="card" style="margin-bottom:0; padding: 20px; display: flex; align-items: center; gap: 18px;">
    <div style="width: 52px; height: 52px; border-radius: 12px; background: #fef3c7; color: #b45309; display: flex; align-items: center; justify-content: center; font-size: 22px;">
      <i class="fas fa-images"></i>
    </div>
    <div>
      <div style="font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase;">Slider Beranda</div>
      <div style="font-size: 26px; font-weight: 800; color: #102C53;">{{ $stats['total_sliders'] }}</div>
      <div style="font-size: 12px; color: #64748b; font-weight: 500;">Slide banner aktif</div>
    </div>
  </div>

  <div class="card" style="margin-bottom:0; padding: 20px; display: flex; align-items: center; gap: 18px;">
    <div style="width: 52px; height: 52px; border-radius: 12px; background: #dcfce7; color: #15803d; display: flex; align-items: center; justify-content: center; font-size: 22px;">
      <i class="fas fa-users"></i>
    </div>
    <div>
      <div style="font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase;">Dosen & Tendik</div>
      <div style="font-size: 26px; font-weight: 800; color: #102C53;">{{ $stats['total_dosen'] + $stats['total_tendik'] }}</div>
      <div style="font-size: 12px; color: #64748b; font-weight: 500;">{{ $stats['total_dosen'] }} Dosen, {{ $stats['total_tendik'] }} Tendik</div>
    </div>
  </div>

  <div class="card" style="margin-bottom:0; padding: 20px; display: flex; align-items: center; gap: 18px;">
    <div style="width: 52px; height: 52px; border-radius: 12px; background: #fee2e2; color: #991b1b; display: flex; align-items: center; justify-content: center; font-size: 22px;">
      <i class="fas fa-eye"></i>
    </div>
    <div>
      <div style="font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase;">Total Views</div>
      <div style="font-size: 26px; font-weight: 800; color: #102C53;">{{ number_format($stats['total_views']) }}</div>
      <div style="font-size: 12px; color: #64748b; font-weight: 500;">Total pembaca berita</div>
    </div>
  </div>
</div>

<!-- Quick Shortcuts -->
<div class="card" style="margin-bottom: 28px;">
  <div class="card-header">
    <div class="card-title"><i class="fas fa-bolt" style="color: #f59e0b; margin-right: 6px;"></i> Akses Cepat Kelola Konten</div>
  </div>
  <div class="card-body">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 14px;">
      <a href="{{ route('admin.berita.create') }}" class="btn btn-primary" style="justify-content: center; padding: 12px;">
        <i class="fas fa-plus"></i> Tambah Berita Baru
      </a>
      <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary" style="justify-content: center; padding: 12px; background: #102C53;">
        <i class="fas fa-images"></i> Kelola Slider Beranda
      </a>
      <a href="{{ route('admin.konten.index') }}#sambutan" class="btn btn-secondary" style="justify-content: center; padding: 12px; background: #0284c7;">
        <i class="fas fa-user-tie"></i> Edit Sambutan Direktur
      </a>
      <a href="{{ route('admin.konten.index') }}#pmb" class="btn btn-secondary" style="justify-content: center; padding: 12px; background: #059669;">
        <i class="fas fa-bullhorn"></i> Update Info & Banner PMB
      </a>
    </div>
  </div>
</div>

<!-- Recent News -->
<div class="card">
  <div class="card-header">
    <div class="card-title"><i class="fas fa-clock-rotate-left" style="color: #3b82f6; margin-right: 6px;"></i> Berita Terbaru</div>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-secondary" style="background:#e2e8f0; color:#1e293b;">Lihat Semua Berita →</a>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Judul Berita</th>
          <th>Kategori</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th style="text-align: right;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($latestNews as $item)
          <tr>
            <td style="width: 70px;">
              <img src="{{ $item->image_url }}" alt="{{ $item->title }}" style="width: 60px; height: 42px; object-fit: cover; border-radius: 6px;">
            </td>
            <td>
              <div style="font-weight: 600; color: #1e293b; max-width: 400px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $item->title }}</div>
              <div style="font-size: 12px; color: #94a3b8;">Oleh: {{ $item->author }}</div>
            </td>
            <td>
              <span class="badge badge-info" style="text-transform: capitalize;">{{ $item->category }}</span>
            </td>
            <td style="color: #64748b; font-size: 13px;">{{ $item->formatted_date }}</td>
            <td>
              @if($item->is_published)
                <span class="badge badge-success"><i class="fas fa-check"></i> Published</span>
              @else
                <span class="badge badge-secondary">Draft</span>
              @endif
            </td>
            <td style="text-align: right; white-space: nowrap;">
              <a href="{{ url('/beranda/berita/' . $item->slug) }}" target="_blank" class="btn btn-sm btn-secondary" title="Lihat di Web">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit">
                <i class="fas fa-pen-to-square"></i>
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="text-align: center; color: #94a3b8; padding: 30px;">Belum ada berita.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<!-- System Info -->
<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 10px;">
  <div style="flex: 1; min-width: 250px; background: #fff; padding: 14px 18px; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 13px; color: #64748b;">
    <i class="fab fa-laravel" style="color:#ef4444; margin-right: 6px;"></i> Framework: <strong>Laravel 12.x</strong>
  </div>
  <div style="flex: 1; min-width: 250px; background: #fff; padding: 14px 18px; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 13px; color: #64748b;">
    <i class="fab fa-php" style="color:#6366f1; margin-right: 6px;"></i> PHP: <strong>{{ PHP_VERSION }}</strong>
  </div>
  <div style="flex: 1; min-width: 250px; background: #fff; padding: 14px 18px; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 13px; color: #64748b;">
    <i class="fas fa-database" style="color:#0ea5e9; margin-right: 6px;"></i> Database: <strong>MySQL (polmind_db)</strong>
  </div>
</div>
@endsection
