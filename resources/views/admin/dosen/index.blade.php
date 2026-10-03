@extends('layouts.admin')

@section('title', 'Data Dosen')
@section('page_title', 'Kelola Daftar Dosen & Expert')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
  <!-- Add Dosen Form -->
  <div>
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-user-plus" style="color: #2563eb; margin-right: 6px;"></i> Tambah Dosen / Expert Baru</div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label class="form-label" for="name">Nama Lengkap & Gelar <span style="color:#ef4444;">*</span></label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="Contoh: Surya Insano, S.T., M.Eng.">
          </div>

          <div class="form-group">
            <label class="form-label" for="category">Kategori Dosen <span style="color:#ef4444;">*</span></label>
            <select id="category" name="category" class="form-control" required>
              <option value="internal">Dosen Internal Kampus</option>
              <option value="industri">Expert Industri</option>
              <option value="instruktur">Instruktur</option>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label" for="position">Jabatan / Prodi / Perusahaan</label>
            <input type="text" id="position" name="position" class="form-control" placeholder="Contoh: Dosen TRPL atau Executive Senior PT...">
          </div>

          <div class="form-group">
            <label class="form-label" for="photo">Foto Dosen</label>
            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            <div class="form-hint">Disarankan foto formal pas foto rasio 1:1. Maksimal 2MB.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="order">Urutan Tampil</label>
            <input type="number" id="order" name="order" class="form-control" value="{{ $lecturers->count() + 1 }}" min="1">
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
            <i class="fas fa-save"></i> Simpan Data Dosen
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Dosen List -->
  <div style="grid-column: span 2;">
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-chalkboard-user" style="color: #102C53; margin-right: 6px;"></i> Daftar Dosen ({{ $lecturers->count() }})</div>
        <a href="/daftar_dosen" target="_blank" class="btn btn-sm btn-secondary">
          <i class="fas fa-eye"></i> Lihat di Web
        </a>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 50px;">Foto</th>
              <th>Nama & Gelar</th>
              <th>Jabatan / Prodi</th>
              <th>Kategori</th>
              <th style="width: 60px;">Urutan</th>
              <th style="text-align: right; width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($lecturers as $dosen)
              <tr>
                <td>
                  <img src="{{ $dosen->photo_url }}" alt="{{ $dosen->name }}" style="width: 44px; height: 44px; object-fit: cover; border-radius: 50%; border: 1px solid var(--border);">
                </td>
                <td>
                  <div style="font-weight: 600; color: #1e293b;">{{ $dosen->name }}</div>
                </td>
                <td style="color: #64748b; font-size: 13px;">{{ $dosen->position }}</td>
                <td>
                  @if($dosen->category == 'internal')
                    <span class="badge badge-info">Internal</span>
                  @elseif($dosen->category == 'industri')
                    <span class="badge badge-warning">Industri</span>
                  @else
                    <span class="badge badge-secondary">Instruktur</span>
                  @endif
                </td>
                <td>{{ $dosen->order }}</td>
                <td style="text-align: right; white-space: nowrap;">
                  <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data dosen ini?')">
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
                <td colspan="6" style="text-align: center; color: #94a3b8; padding: 30px;">Belum ada data dosen.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
