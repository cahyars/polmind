@extends('layouts.admin')

@section('title', 'Slider Beranda')
@section('page_title', 'Kelola Slider Banner Beranda')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
  <!-- Add New Slide Card -->
  <div>
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-plus-circle" style="color: #2563eb; margin-right: 6px;"></i> Tambah Slide Banner Baru</div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label class="form-label" for="image">Unggah Gambar Slide <span style="color:#ef4444;">*</span></label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" required onchange="previewSlide(this)">
            <div class="form-hint">Disarankan gambar landscape rasio 16:9 atau 21:9 resolusi tinggi. Maksimal 4MB.</div>

            <div id="slidePreviewBox" style="display: none; margin-top: 10px;">
              <img id="slidePreview" src="" alt="Pratinjau" style="width: 100%; height: 160px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border);">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="title">Deskripsi / Judul Banner (Alt Text)</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Contoh: Inaugurasi Mahasiswa Baru...">
          </div>

          <div class="form-group">
            <label class="form-label" for="link">Link Tujuan (Opsional)</label>
            <input type="text" id="link" name="link" class="form-control" placeholder="Contoh: /pmb atau https://...">
            <div class="form-hint">Jika banner diklik, pengunjung akan diarahkan ke halaman ini.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="order">Urutan Tampil</label>
            <input type="number" id="order" name="order" class="form-control" value="{{ $sliders->count() + 1 }}" min="1">
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
            <i class="fas fa-upload"></i> Unggah & Tambahkan Slide
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Sliders List Card -->
  <div style="grid-column: span 2;">
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-images" style="color: #102C53; margin-right: 6px;"></i> Daftar Slide Beranda ({{ $sliders->count() }})</div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 60px;">Urutan</th>
              <th style="width: 130px;">Preview</th>
              <th>Deskripsi & Link</th>
              <th>Status</th>
              <th style="text-align: right; width: 120px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($sliders as $slide)
              <tr>
                <td>
                  <form action="{{ route('admin.sliders.update', $slide->id) }}" method="POST" style="display:flex; align-items:center; gap:4px;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="title" value="{{ $slide->title }}">
                    <input type="hidden" name="link" value="{{ $slide->link }}">
                    @if($slide->is_active) <input type="hidden" name="is_active" value="1"> @endif
                    <input type="number" name="order" value="{{ $slide->order }}" style="width: 50px; padding: 4px; border: 1px solid var(--border); border-radius: 4px; font-size: 13px;" onchange="this.form.submit()">
                  </form>
                </td>
                <td>
                  <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" style="width: 120px; height: 60px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;">
                </td>
                <td>
                  <div style="font-weight: 600; font-size: 13px; color: #1e293b;">{{ $slide->title ?: '(Tanpa Judul)' }}</div>
                  @if($slide->link)
                    <div style="font-size: 12px; color: #2563eb; margin-top: 2px;">
                      <i class="fas fa-link"></i> {{ $slide->link }}
                    </div>
                  @else
                    <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">Tidak ada link</div>
                  @endif
                </td>
                <td>
                  <form action="{{ route('admin.sliders.toggle', $slide->id) }}" method="POST">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;">
                      @if($slide->is_active)
                        <span class="badge badge-success"><i class="fas fa-check"></i> Aktif</span>
                      @else
                        <span class="badge badge-secondary">Nonaktif</span>
                      @endif
                    </button>
                  </form>
                </td>
                <td style="text-align: right; white-space: nowrap;">
                  <form action="{{ route('admin.sliders.destroy', $slide->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus slide banner ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Slide">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" style="text-align: center; color: #94a3b8; padding: 30px;">Belum ada slide banner.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  function previewSlide(input) {
    const box = document.getElementById('slidePreviewBox');
    const preview = document.getElementById('slidePreview');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        box.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
