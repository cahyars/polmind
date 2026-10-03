@extends('layouts.admin')

@section('title', 'Manajemen Berita')
@section('page_title', 'Kelola Berita & Informasi')

@section('content')
<div class="card">
  <div class="card-header">
    <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
      <div class="card-title">Daftar Berita ({{ $beritas->total() }})</div>
      <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Berita Baru
      </a>
    </div>

    <!-- Filters & Search -->
    <form method="GET" action="{{ route('admin.berita.index') }}" style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
      <select name="category" class="form-control" style="width: auto; padding: 7px 12px; font-size: 13px;" onchange="this.form.submit()">
        <option value="all">Semua Kategori</option>
        @foreach($categories as $cat)
          <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
        @endforeach
      </select>

      <select name="status" class="form-control" style="width: auto; padding: 7px 12px; font-size: 13px;" onchange="this.form.submit()">
        <option value="">Semua Status</option>
        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
      </select>

      <div style="position: relative;">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul..." class="form-control" style="padding: 7px 30px 7px 12px; font-size: 13px; width: 180px;">
        <button type="submit" style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #94a3b8; cursor: pointer;">
          <i class="fas fa-search"></i>
        </button>
      </div>

      @if(request()->hasAny(['category', 'status', 'q']))
        <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-secondary" style="padding: 7px 10px;" title="Reset Filter">
          <i class="fas fa-rotate-left"></i>
        </a>
      @endif
    </form>
  </div>

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 50px;">No</th>
          <th style="width: 80px;">Gambar</th>
          <th>Judul Berita</th>
          <th>Kategori</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Views</th>
          <th style="text-align: right; width: 140px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($beritas as $index => $item)
          <tr>
            <td style="color: #94a3b8; font-size: 13px;">{{ $beritas->firstItem() + $index }}</td>
            <td>
              <img src="{{ $item->image_url }}" alt="{{ $item->title }}" style="width: 64px; height: 44px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0;">
            </td>
            <td>
              <div style="font-weight: 600; color: #1e293b; line-height: 1.4; margin-bottom: 4px;">{{ $item->title }}</div>
              <div style="font-size: 12px; color: #64748b;">
                <i class="far fa-user"></i> {{ $item->author }} &nbsp;|&nbsp; 
                <span style="font-family: monospace; color: #94a3b8;">/{{ $item->slug }}</span>
              </div>
            </td>
            <td>
              <span class="badge badge-info" style="text-transform: capitalize;">{{ $item->category }}</span>
            </td>
            <td style="color: #64748b; font-size: 13px; white-space: nowrap;">{{ $item->formatted_date }}</td>
            <td>
              <form action="{{ route('admin.berita.toggle', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;" title="Klik untuk mengubah status">
                  @if($item->is_published)
                    <span class="badge badge-success"><i class="fas fa-check"></i> Published</span>
                  @else
                    <span class="badge badge-secondary"><i class="fas fa-eye-slash"></i> Draft</span>
                  @endif
                </button>
              </form>
            </td>
            <td style="color: #64748b; font-size: 13px;">{{ number_format($item->views_count) }}</td>
            <td style="text-align: right; white-space: nowrap;">
              <a href="{{ url('/beranda/berita/' . $item->slug) }}" target="_blank" class="btn btn-sm btn-secondary" title="Pratinjau di Website" style="padding: 6px 10px;">
                <i class="fas fa-arrow-up-right-from-square"></i>
              </a>
              <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit Berita" style="padding: 6px 10px;">
                <i class="fas fa-pen-to-square"></i>
              </a>
              <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" title="Hapus Berita" style="padding: 6px 10px;">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" style="text-align: center; color: #94a3b8; padding: 40px;">
              <i class="fas fa-newspaper" style="font-size: 32px; margin-bottom: 12px; display: block; color: #cbd5e1;"></i>
              Tidak ada berita yang ditemukan.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($beritas->hasPages())
    <div style="padding: 16px 24px; border-top: 1px solid var(--border);">
      {{ $beritas->links() }}
    </div>
  @endif
</div>
@endsection
