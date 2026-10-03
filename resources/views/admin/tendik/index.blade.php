@extends('layouts.admin')

@section('title', 'Data Tenaga Kependidikan')
@section('page_title', 'Kelola Tenaga Kependidikan (Tendik)')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
  <!-- Add Tendik Form -->
  <div>
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-user-plus" style="color: #2563eb; margin-right: 6px;"></i> Tambah Tendik Baru</div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.tendik.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label class="form-label" for="name">Nama Lengkap & Gelar <span style="color:#ef4444;">*</span></label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="Contoh: Nurul Salma, S.IP.">
          </div>

          <div class="form-group">
            <label class="form-label" for="position">Jabatan / Bagian</label>
            <input type="text" id="position" name="position" class="form-control" placeholder="Contoh: Admin Akademik atau Pustakawan">
          </div>

          <div class="form-group">
            <label class="form-label" for="photo">Foto</label>
            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            <div class="form-hint">Disarankan foto formal pas foto rasio 1:1. Maksimal 2MB.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="order">Urutan Tampil</label>
            <input type="number" id="order" name="order" class="form-control" value="{{ $staff->count() + 1 }}" min="1">
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
            <i class="fas fa-save"></i> Simpan Data Tendik
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Tendik List -->
  <div style="grid-column: span 2;">
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-user-tie" style="color: #102C53; margin-right: 6px;"></i> Daftar Tenaga Kependidikan ({{ $staff->count() }})</div>
        <a href="/daftar_tendik" target="_blank" class="btn btn-sm btn-secondary">
          <i class="fas fa-eye"></i> Lihat di Web
        </a>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 50px;">Foto</th>
              <th>Nama & Gelar</th>
              <th>Jabatan / Bagian</th>
              <th style="width: 60px;">Urutan</th>
              <th style="text-align: right; width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($staff as $item)
              <tr>
                <td>
                  <img src="{{ $item->photo_url }}" alt="{{ $item->name }}" style="width: 44px; height: 44px; object-fit: cover; border-radius: 50%; border: 1px solid var(--border);">
                </td>
                <td>
                  <div style="font-weight: 600; color: #1e293b;">{{ $item->name }}</div>
                </td>
                <td style="color: #64748b; font-size: 13px;">{{ $item->position }}</td>
                <td>{{ $item->order }}</td>
                <td style="text-align: right; white-space: nowrap;">
                  <form action="{{ route('admin.tendik.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data tendik ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" style="text-align: center; color: #94a3b8; padding: 30px;">Belum ada data tenaga kependidikan.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
