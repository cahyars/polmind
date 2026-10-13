@extends('layouts.admin')

@section('title', 'Kelola Keunikan & Keunggulan')
@section('page_title', 'Kelola Keunikan & Keunggulan Kampus')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

  <!-- Bar Atas: Navigasi Cepat & Aksi -->
  <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; background: #ffffff; padding: 16px 20px; border-radius: 10px; border: 1px solid var(--border);">
    <div style="display: flex; align-items: center; gap: 10px;">
      <div style="width: 40px; height: 40px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 18px;">
        <i class="fas fa-award"></i>
      </div>
      <div>
        <h2 style="font-size: 16px; font-weight: 700; color: var(--primary); margin: 0;">Kelola Konten Halaman Keunikan</h2>
        <p style="font-size: 13px; color: var(--text-muted); margin: 0;">Sesuaikan blok bernomor 01-03, kartu karir, foto kegiatan industri, dan poin pembelajaran.</p>
      </div>
    </div>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
      <a href="{{ route('keunikan') }}" target="_blank" class="btn btn-secondary" style="font-size: 13px;">
        <i class="fas fa-external-link-alt"></i> Pratinjau Halaman Publik
      </a>
      <button type="button" class="btn btn-primary" onclick="openAddBlockModal()" style="font-size: 13px;">
        <i class="fas fa-plus-circle"></i> Tambah Blok (01, 02, ...)
      </button>
      <button type="button" class="btn" onclick="openAddCareerModal()" style="font-size: 13px; background: #102C53; color: #ffffff;">
        <i class="fas fa-plus"></i> Tambah Kartu Karir
      </button>
    </div>
  </div>

  <!-- Pengaturan Header & Judul Halaman -->
  <div class="card">
    <div class="card-header" style="cursor: pointer;" onclick="toggleCardBody('settingsCardBody', 'settingsToggleIcon')">
      <div class="card-title" style="display: flex; align-items: center; gap: 8px;">
        <i class="fas fa-heading" style="color: #2563eb;"></i>
        <span>Pengaturan Judul & Teks Halaman</span>
      </div>
      <i class="fas fa-chevron-down" id="settingsToggleIcon" style="color: var(--text-muted); transition: transform 0.2s;"></i>
    </div>
    <div class="card-body" id="settingsCardBody">
      <form action="{{ route('admin.keunikan.settings') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
          <div class="form-group">
            <label class="form-label" for="keunikan_page_title">Judul Utama Halaman <span style="color:#ef4444;">*</span></label>
            <input type="text" id="keunikan_page_title" name="keunikan_page_title" class="form-control" value="{{ old('keunikan_page_title', $settings['keunikan_page_title']) }}" required placeholder="Contoh: KEUNIKAN DAN KEUNGGULAN">
            <div class="form-hint">Ditampilkan paling atas sebagai judul H1 halaman.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="keunikan_page_subtitle">Sub-Judul Halaman</label>
            <input type="text" id="keunikan_page_subtitle" name="keunikan_page_subtitle" class="form-control" value="{{ old('keunikan_page_subtitle', $settings['keunikan_page_subtitle']) }}" placeholder="Contoh: Mengapa Memilih Politeknik Mitra Industri?">
            <div class="form-hint">Ditampilkan di bawah judul utama sebagai pengantar menarik.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="keunikan_career_title">Judul Bagian Karir <span style="color:#ef4444;">*</span></label>
            <input type="text" id="keunikan_career_title" name="keunikan_career_title" class="form-control" value="{{ old('keunikan_career_title', $settings['keunikan_career_title']) }}" required placeholder="Contoh: Bagian Karir & Internasionalisasi">
            <div class="form-hint">Judul section untuk 4 kartu grid karir & internasionalisasi.</div>
          </div>
        </div>

        <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Pengaturan Teks
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- BAGIAN 1: BLOK KEUNGGULAN (01, 02, 03...) -->
  <div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
      <div class="card-title">
        <i class="fas fa-layer-group" style="color: #102C53; margin-right: 6px;"></i>
        Blok Keunggulan Berurutan ({{ $blocks->count() }} Blok)
      </div>
      <button type="button" class="btn btn-primary" onclick="openAddBlockModal()" style="font-size: 12px; padding: 6px 12px;">
        <i class="fas fa-plus"></i> Tambah Blok Baru
      </button>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th style="width: 70px;">Urutan</th>
            <th style="width: 80px;">Nomor</th>
            <th style="width: 140px;">Foto Kegiatan</th>
            <th>Judul & Poin Checklist</th>
            <th style="width: 100px;">Tata Letak</th>
            <th style="width: 90px;">Status</th>
            <th style="text-align: right; width: 110px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($blocks as $index => $block)
            <tr>
              <td>
                <form action="{{ route('admin.keunikan.update', $block->id) }}" method="POST" style="display:flex; align-items:center; gap:4px;">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="title" value="{{ $block->title }}">
                  <input type="hidden" name="badge_number" value="{{ $block->badge_number }}">
                  <input type="hidden" name="subtitle" value="{{ $block->subtitle }}">
                  <input type="hidden" name="description" value="{{ $block->description }}">
                  @if($block->is_active) <input type="hidden" name="is_active" value="1"> @endif
                  <input type="number" name="order" value="{{ $block->order }}" style="width: 50px; padding: 4px; border: 1px solid var(--border); border-radius: 4px; font-size: 13px;" onchange="this.form.submit()" title="Ubah urutan langsung">
                </form>
              </td>
              <td>
                <span style="display: inline-block; padding: 4px 10px; background: #e0f2fe; color: #0369a1; border-radius: 6px; font-weight: 800; font-size: 13px;">
                  {{ $block->badge_number ?: sprintf('%02d', $block->order) }}
                </span>
              </td>
              <td>
                <div style="width: 120px; height: 75px; border-radius: 8px; overflow: hidden; border: 1px solid #cbd5e1; background: #f1f5f9;">
                  <img src="{{ $block->image_url }}" alt="{{ $block->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
              </td>
              <td>
                <div style="font-weight: 700; font-size: 14px; color: var(--primary); margin-bottom: 6px;">
                  {{ $block->title }}
                </div>
                @if(count($block->points) > 0)
                  <ul style="margin: 0; padding-left: 18px; font-size: 12px; color: var(--text-muted); line-height: 1.5;">
                    @foreach($block->points as $p)
                      <li>{{ Str::limit($p, 100) }}</li>
                    @endforeach
                  </ul>
                @else
                  <div style="font-size: 12px; color: #94a3b8; font-style: italic;">(Belum ada poin checklist)</div>
                @endif
              </td>
              <td>
                <span class="badge {{ $loop->odd ? 'badge-info' : 'badge-secondary' }}" style="font-size: 11px;">
                  {{ $loop->odd ? 'Teks Kiri - Foto Kanan' : 'Foto Kiri - Teks Kanan' }}
                </span>
              </td>
              <td>
                <form action="{{ route('admin.keunikan.toggle', $block->id) }}" method="POST">
                  @csrf
                  <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;">
                    @if($block->is_active)
                      <span class="badge badge-success"><i class="fas fa-check"></i> Aktif</span>
                    @else
                      <span class="badge badge-danger"><i class="fas fa-eye-slash"></i> Nonaktif</span>
                    @endif
                  </button>
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; gap: 6px;">
                  <button type="button" class="btn btn-secondary" style="padding: 5px 9px; font-size: 12px;" onclick="openEditBlockModal({{ json_encode($block) }})" title="Edit Data">
                    <i class="fas fa-pen"></i>
                  </button>
                  <form action="{{ route('admin.keunikan.destroy', $block->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus blok {{ addslashes($block->title) }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary" style="padding: 5px 9px; font-size: 12px; color: #ef4444; background: #fef2f2; border: 1px solid #fecaca;" title="Hapus Blok">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-muted);">
                <i class="fas fa-inbox" style="font-size: 32px; color: #cbd5e1; margin-bottom: 8px; display: block;"></i>
                Belum ada data blok keunggulan. Klik tombol "Tambah Blok Baru" di atas.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- BAGIAN 2: BAGIAN KARIR & INTERNASIONALISASI -->
  <div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
      <div class="card-title">
        <i class="fas fa-graduation-cap" style="color: #102C53; margin-right: 6px;"></i>
        Kartu Karir &amp; Internasionalisasi ({{ $careers->count() }} Kartu)
      </div>
      <button type="button" class="btn" onclick="openAddCareerModal()" style="font-size: 12px; padding: 6px 12px; background: #102C53; color: #ffffff;">
        <i class="fas fa-plus"></i> Tambah Kartu Karir
      </button>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th style="width: 70px;">Urutan</th>
            <th style="width: 70px;">Ikon</th>
            <th>Judul Kartu</th>
            <th>Sub-Judul / Keterangan</th>
            <th style="width: 90px;">Status</th>
            <th style="text-align: right; width: 110px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($careers as $career)
            <tr>
              <td>
                <form action="{{ route('admin.keunikan.update', $career->id) }}" method="POST" style="display:flex; align-items:center; gap:4px;">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="title" value="{{ $career->title }}">
                  <input type="hidden" name="subtitle" value="{{ $career->subtitle }}">
                  <input type="hidden" name="description" value="{{ $career->description }}">
                  <input type="hidden" name="icon" value="{{ $career->icon }}">
                  @if($career->is_active) <input type="hidden" name="is_active" value="1"> @endif
                  <input type="number" name="order" value="{{ $career->order }}" style="width: 50px; padding: 4px; border: 1px solid var(--border); border-radius: 4px; font-size: 13px;" onchange="this.form.submit()" title="Ubah urutan langsung">
                </form>
              </td>
              <td>
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #102C53; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                  <i class="{{ $career->icon ?: 'fas fa-briefcase' }}"></i>
                </div>
              </td>
              <td>
                <div style="font-weight: 700; font-size: 14px; color: var(--primary);">
                  {{ $career->title }}
                </div>
                <div style="font-size: 11px; color: #64748b; font-family: monospace; margin-top: 2px;">
                  {{ $career->icon }}
                </div>
              </td>
              <td>
                <div style="font-size: 13px; color: #334155;">
                  {{ $career->subtitle ?: '-' }}
                </div>
                @if($career->description)
                  <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">
                    {{ $career->description }}
                  </div>
                @endif
              </td>
              <td>
                <form action="{{ route('admin.keunikan.toggle', $career->id) }}" method="POST">
                  @csrf
                  <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;">
                    @if($career->is_active)
                      <span class="badge badge-success"><i class="fas fa-check"></i> Aktif</span>
                    @else
                      <span class="badge badge-danger"><i class="fas fa-eye-slash"></i> Nonaktif</span>
                    @endif
                  </button>
                </form>
              </td>
              <td style="text-align: right;">
                <div style="display: inline-flex; gap: 6px;">
                  <button type="button" class="btn btn-secondary" style="padding: 5px 9px; font-size: 12px;" onclick="openEditCareerModal({{ json_encode($career) }})" title="Edit Data">
                    <i class="fas fa-pen"></i>
                  </button>
                  <form action="{{ route('admin.keunikan.destroy', $career->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kartu {{ addslashes($career->title) }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary" style="padding: 5px 9px; font-size: 12px; color: #ef4444; background: #fef2f2; border: 1px solid #fecaca;" title="Hapus Kartu">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">
                <i class="fas fa-inbox" style="font-size: 32px; color: #cbd5e1; margin-bottom: 8px; display: block;"></i>
                Belum ada data kartu karir. Klik tombol "Tambah Kartu Karir" di atas.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- ========================================== -->
<!-- MODAL TAMBAH BLOK KEUNGGULAN (01, 02...)   -->
<!-- ========================================== -->
<div id="addBlockModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 999; overflow-y: auto; align-items: center; justify-content: center; padding: 20px;">
  <div style="background: #ffffff; width: 100%; max-width: 600px; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); overflow: hidden;">
    <div style="padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
      <h3 style="font-size: 16px; font-weight: 700; color: var(--primary); margin: 0;">Tambah Blok Keunggulan Baru</h3>
      <button type="button" onclick="closeAddBlockModal()" style="background: none; border: none; font-size: 20px; color: #94a3b8; cursor: pointer;">&times;</button>
    </div>
    <form action="{{ route('admin.keunikan.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="type" value="block">

      <div style="padding: 24px; max-height: calc(85vh - 120px); overflow-y: auto;">
        <div style="display: grid; grid-template-columns: 120px 1fr; gap: 16px;">
          <div class="form-group">
            <label class="form-label" for="add_badge_number">Nomor Urut</label>
            <input type="text" id="add_badge_number" name="badge_number" class="form-control" placeholder="01" value="{{ sprintf('%02d', $blocks->count() + 1) }}">
            <div class="form-hint">Contoh: 01, 02</div>
          </div>
          <div class="form-group">
            <label class="form-label" for="add_title">Judul Blok Keunggulan <span style="color:#ef4444;">*</span></label>
            <input type="text" id="add_title" name="title" class="form-control" placeholder="Contoh: Project-Based Learning & TEFA" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="add_image">Unggah Foto Kegiatan / Industri</label>
          <input type="file" id="add_image" name="image" class="form-control" accept="image/*" onchange="previewBlockImage(this, 'add_preview_img', 'add_preview_box')">
          <div class="form-hint">Format PNG, WebP, JPG. Rekomendasi rasio 4:3 atau 16:9, resolusi jernih. Maksimal 5MB.</div>

          <div id="add_preview_box" style="display: none; margin-top: 10px; border-radius: 8px; overflow: hidden; border: 1px dashed #cbd5e1; max-height: 200px; text-align: center; background: #f8fafc;">
            <img id="add_preview_img" src="" alt="Pratinjau Foto" style="max-height: 200px; max-width: 100%; object-fit: cover;">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="add_description">Poin-Poin Checklist (Satu Poin per Baris) <span style="color:#ef4444;">*</span></label>
          <textarea id="add_description" name="description" class="form-control" rows="5" placeholder="Tuliskan setiap poin dalam baris baru:
Kuliah lebih fokus Project-Based Learning (Teaching Factory), tidak banyak di dalam ruang kelas.
TEFA dan PjBL sejak semester awal.
Project-project-nya berasal dari perusahaan/industri, dan real project." required></textarea>
          <div class="form-hint"><i class="fas fa-info-circle"></i> Setiap baris baru otomatis ditampilkan dengan ikon centang checklist modern pada tampilan publik.</div>
        </div>

        <div class="form-group">
          <label class="form-label" for="add_order">Urutan Tampil</label>
          <input type="number" id="add_order" name="order" class="form-control" value="{{ $blocks->count() + 1 }}" min="1">
        </div>
      </div>

      <div style="padding: 16px 24px; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 10px; background: #f8fafc;">
        <button type="button" class="btn btn-secondary" onclick="closeAddBlockModal()">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Blok</button>
      </div>
    </form>
  </div>
</div>

<!-- ========================================== -->
<!-- MODAL EDIT BLOK KEUNGGULAN (01, 02...)     -->
<!-- ========================================== -->
<div id="editBlockModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 999; overflow-y: auto; align-items: center; justify-content: center; padding: 20px;">
  <div style="background: #ffffff; width: 100%; max-width: 600px; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); overflow: hidden;">
    <div style="padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
      <h3 style="font-size: 16px; font-weight: 700; color: var(--primary); margin: 0;">Edit Blok Keunggulan</h3>
      <button type="button" onclick="closeEditBlockModal()" style="background: none; border: none; font-size: 20px; color: #94a3b8; cursor: pointer;">&times;</button>
    </div>
    <form id="editBlockForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div style="padding: 24px; max-height: calc(85vh - 120px); overflow-y: auto;">
        <div style="display: grid; grid-template-columns: 120px 1fr; gap: 16px;">
          <div class="form-group">
            <label class="form-label" for="edit_badge_number">Nomor Urut</label>
            <input type="text" id="edit_badge_number" name="badge_number" class="form-control" placeholder="01">
            <div class="form-hint">Contoh: 01, 02</div>
          </div>
          <div class="form-group">
            <label class="form-label" for="edit_title">Judul Blok Keunggulan <span style="color:#ef4444;">*</span></label>
            <input type="text" id="edit_title" name="title" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Foto Kegiatan Saat Ini</label>
          <div style="margin-bottom: 10px; border-radius: 8px; overflow: hidden; border: 1px solid #cbd5e1; max-height: 160px; text-align: center; background: #f8fafc;">
            <img id="edit_current_img" src="" alt="Foto Saat Ini" style="max-height: 160px; max-width: 100%; object-fit: cover;">
          </div>

          <label class="form-label" for="edit_image">Ganti Foto (Biarkan kosong jika tidak ingin ganti)</label>
          <input type="file" id="edit_image" name="image" class="form-control" accept="image/*" onchange="previewBlockImage(this, 'edit_preview_img', 'edit_preview_box')">

          <div id="edit_preview_box" style="display: none; margin-top: 10px; border-radius: 8px; overflow: hidden; border: 1px dashed #cbd5e1; max-height: 160px; text-align: center; background: #f8fafc;">
            <img id="edit_preview_img" src="" alt="Pratinjau Foto Baru" style="max-height: 160px; max-width: 100%; object-fit: cover;">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_description">Poin-Poin Checklist (Satu Poin per Baris) <span style="color:#ef4444;">*</span></label>
          <textarea id="edit_description" name="description" class="form-control" rows="6" required></textarea>
          <div class="form-hint"><i class="fas fa-info-circle"></i> Setiap baris baru otomatis ditampilkan sebagai satu poin centang checklist.</div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label class="form-label" for="edit_order">Urutan Tampil</label>
            <input type="number" id="edit_order" name="order" class="form-control" min="1" required>
          </div>
          <div class="form-group" style="display: flex; flex-direction: column; justify-content: center;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; margin-top: 16px;">
              <input type="checkbox" id="edit_is_active" name="is_active" value="1" style="width: 18px; height: 18px;">
              <span style="font-weight: 600; font-size: 14px; color: var(--primary);">Tampilkan di Website (Aktif)</span>
            </label>
          </div>
        </div>
      </div>

      <div style="padding: 16px 24px; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 10px; background: #f8fafc;">
        <button type="button" class="btn btn-secondary" onclick="closeEditBlockModal()">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Perbarui Blok</button>
      </div>
    </form>
  </div>
</div>

<!-- ========================================== -->
<!-- MODAL TAMBAH KARTU KARIR                   -->
<!-- ========================================== -->
<div id="addCareerModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 999; overflow-y: auto; align-items: center; justify-content: center; padding: 20px;">
  <div style="background: #ffffff; width: 100%; max-width: 520px; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); overflow: hidden;">
    <div style="padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
      <h3 style="font-size: 16px; font-weight: 700; color: var(--primary); margin: 0;">Tambah Kartu Karir Baru</h3>
      <button type="button" onclick="closeAddCareerModal()" style="background: none; border: none; font-size: 20px; color: #94a3b8; cursor: pointer;">&times;</button>
    </div>
    <form action="{{ route('admin.keunikan.store') }}" method="POST">
      @csrf
      <input type="hidden" name="type" value="career">

      <div style="padding: 24px; max-height: calc(85vh - 120px); overflow-y: auto;">
        <div class="form-group">
          <label class="form-label" for="add_career_title">Judul Kartu <span style="color:#ef4444;">*</span></label>
          <input type="text" id="add_career_title" name="title" class="form-control" placeholder="Contoh: Magang di Industri" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="add_career_icon">Ikon Kartu (FontAwesome)</label>
          <div style="display: flex; gap: 10px; align-items: center;">
            <div id="add_icon_preview" style="width: 44px; height: 44px; border-radius: 10px; background: #102C53; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
              <i class="fas fa-briefcase"></i>
            </div>
            <input type="text" id="add_career_icon" name="icon" class="form-control" value="fas fa-briefcase" oninput="updateIconPreview('add_career_icon', 'add_icon_preview')" placeholder="fas fa-briefcase">
          </div>
          <div style="display: flex; gap: 6px; flex-wrap: wrap; margin-top: 8px;">
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('add_career_icon', 'add_icon_preview', 'fas fa-briefcase')"><i class="fas fa-briefcase"></i> Magang</button>
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('add_career_icon', 'add_icon_preview', 'fas fa-file-lines')"><i class="fas fa-file-lines"></i> Skripsi</button>
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('add_career_icon', 'add_icon_preview', 'fas fa-handshake')"><i class="fas fa-handshake"></i> Kerja</button>
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('add_career_icon', 'add_icon_preview', 'fas fa-globe')"><i class="fas fa-globe"></i> Global</button>
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('add_career_icon', 'add_icon_preview', 'fas fa-award')"><i class="fas fa-award"></i> Prestasi</button>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="add_career_subtitle">Sub-Judul / Keterangan Singkat</label>
          <textarea id="add_career_subtitle" name="subtitle" class="form-control" rows="2" placeholder="Contoh: Mahasiswa akan bisa magang di industri yang selama ini menjadi customers mereka."></textarea>
        </div>

        <div class="form-group">
          <label class="form-label" for="add_career_order">Urutan Tampil</label>
          <input type="number" id="add_career_order" name="order" class="form-control" value="{{ $careers->count() + 1 }}" min="1">
        </div>
      </div>

      <div style="padding: 16px 24px; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 10px; background: #f8fafc;">
        <button type="button" class="btn btn-secondary" onclick="closeAddCareerModal()">Batal</button>
        <button type="submit" class="btn" style="background: #102C53; color: #fff;"><i class="fas fa-save"></i> Simpan Kartu</button>
      </div>
    </form>
  </div>
</div>

<!-- ========================================== -->
<!-- MODAL EDIT KARTU KARIR                     -->
<!-- ========================================== -->
<div id="editCareerModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 999; overflow-y: auto; align-items: center; justify-content: center; padding: 20px;">
  <div style="background: #ffffff; width: 100%; max-width: 520px; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); overflow: hidden;">
    <div style="padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
      <h3 style="font-size: 16px; font-weight: 700; color: var(--primary); margin: 0;">Edit Kartu Karir</h3>
      <button type="button" onclick="closeEditCareerModal()" style="background: none; border: none; font-size: 20px; color: #94a3b8; cursor: pointer;">&times;</button>
    </div>
    <form id="editCareerForm" method="POST">
      @csrf
      @method('PUT')

      <div style="padding: 24px; max-height: calc(85vh - 120px); overflow-y: auto;">
        <div class="form-group">
          <label class="form-label" for="edit_career_title">Judul Kartu <span style="color:#ef4444;">*</span></label>
          <input type="text" id="edit_career_title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_career_icon">Ikon Kartu (FontAwesome)</label>
          <div style="display: flex; gap: 10px; align-items: center;">
            <div id="edit_icon_preview" style="width: 44px; height: 44px; border-radius: 10px; background: #102C53; color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
              <i class="fas fa-briefcase"></i>
            </div>
            <input type="text" id="edit_career_icon" name="icon" class="form-control" oninput="updateIconPreview('edit_career_icon', 'edit_icon_preview')">
          </div>
          <div style="display: flex; gap: 6px; flex-wrap: wrap; margin-top: 8px;">
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('edit_career_icon', 'edit_icon_preview', 'fas fa-briefcase')"><i class="fas fa-briefcase"></i> Magang</button>
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('edit_career_icon', 'edit_icon_preview', 'fas fa-file-lines')"><i class="fas fa-file-lines"></i> Skripsi</button>
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('edit_career_icon', 'edit_icon_preview', 'fas fa-handshake')"><i class="fas fa-handshake"></i> Kerja</button>
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('edit_career_icon', 'edit_icon_preview', 'fas fa-globe')"><i class="fas fa-globe"></i> Global</button>
            <button type="button" class="btn" style="padding: 4px 8px; font-size: 11px; background: #f1f5f9; border: 1px solid #cbd5e1;" onclick="setIconValue('edit_career_icon', 'edit_icon_preview', 'fas fa-award')"><i class="fas fa-award"></i> Prestasi</button>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_career_subtitle">Sub-Judul / Keterangan Singkat</label>
          <textarea id="edit_career_subtitle" name="subtitle" class="form-control" rows="2"></textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label class="form-label" for="edit_career_order">Urutan Tampil</label>
            <input type="number" id="edit_career_order" name="order" class="form-control" min="1" required>
          </div>
          <div class="form-group" style="display: flex; flex-direction: column; justify-content: center;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; margin-top: 16px;">
              <input type="checkbox" id="edit_career_is_active" name="is_active" value="1" style="width: 18px; height: 18px;">
              <span style="font-weight: 600; font-size: 14px; color: var(--primary);">Tampilkan di Website (Aktif)</span>
            </label>
          </div>
        </div>
      </div>

      <div style="padding: 16px 24px; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 10px; background: #f8fafc;">
        <button type="button" class="btn btn-secondary" onclick="closeEditCareerModal()">Batal</button>
        <button type="submit" class="btn" style="background: #102C53; color: #fff;"><i class="fas fa-save"></i> Perbarui Kartu</button>
      </div>
    </form>
  </div>
</div>

@push('scripts')
<script>
  function toggleCardBody(bodyId, iconId) {
    const body = document.getElementById(bodyId);
    const icon = document.getElementById(iconId);
    if (body.style.display === 'none') {
      body.style.display = 'block';
      icon.style.transform = 'rotate(0deg)';
    } else {
      body.style.display = 'none';
      icon.style.transform = 'rotate(-90deg)';
    }
  }

  // Preview Image Helper
  function previewBlockImage(input, imgId, boxId) {
    const box = document.getElementById(boxId);
    const img = document.getElementById(imgId);
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        img.src = e.target.result;
        box.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Icon Preview Helpers
  function updateIconPreview(inputId, previewId) {
    const iconClass = document.getElementById(inputId).value || 'fas fa-star';
    const preview = document.getElementById(previewId);
    preview.innerHTML = '<i class="' + iconClass + '"></i>';
  }

  function setIconValue(inputId, previewId, val) {
    document.getElementById(inputId).value = val;
    updateIconPreview(inputId, previewId);
  }

  // Modals - Blok Keunggulan
  function openAddBlockModal() {
    document.getElementById('addBlockModal').style.display = 'flex';
  }
  function closeAddBlockModal() {
    document.getElementById('addBlockModal').style.display = 'none';
  }

  function openEditBlockModal(block) {
    const form = document.getElementById('editBlockForm');
    form.action = '/admin/keunikan/' + block.id;

    document.getElementById('edit_badge_number').value = block.badge_number || '';
    document.getElementById('edit_title').value = block.title || '';
    document.getElementById('edit_description').value = block.description || '';
    document.getElementById('edit_order').value = block.order || 1;
    document.getElementById('edit_is_active').checked = !!block.is_active;

    // Image preview
    const currentImg = document.getElementById('edit_current_img');
    currentImg.src = block.image_url || '/assets/images-new/images10.jpg';
    document.getElementById('edit_preview_box').style.display = 'none';
    document.getElementById('edit_image').value = '';

    document.getElementById('editBlockModal').style.display = 'flex';
  }
  function closeEditBlockModal() {
    document.getElementById('editBlockModal').style.display = 'none';
  }

  // Modals - Kartu Karir
  function openAddCareerModal() {
    document.getElementById('addCareerModal').style.display = 'flex';
  }
  function closeAddCareerModal() {
    document.getElementById('addCareerModal').style.display = 'none';
  }

  function openEditCareerModal(career) {
    const form = document.getElementById('editCareerForm');
    form.action = '/admin/keunikan/' + career.id;

    document.getElementById('edit_career_title').value = career.title || '';
    document.getElementById('edit_career_icon').value = career.icon || 'fas fa-briefcase';
    document.getElementById('edit_career_subtitle').value = career.subtitle || '';
    document.getElementById('edit_career_order').value = career.order || 1;
    document.getElementById('edit_career_is_active').checked = !!career.is_active;

    updateIconPreview('edit_career_icon', 'edit_icon_preview');

    document.getElementById('editCareerModal').style.display = 'flex';
  }
  function closeEditCareerModal() {
    document.getElementById('editCareerModal').style.display = 'none';
  }

  // Close modals when clicking outside
  window.addEventListener('click', function(e) {
    ['addBlockModal', 'editBlockModal', 'addCareerModal', 'editCareerModal'].forEach(id => {
      const modal = document.getElementById(id);
      if (e.target === modal) {
        modal.style.display = 'none';
      }
    });
  });
</script>
@endpush
@endsection
