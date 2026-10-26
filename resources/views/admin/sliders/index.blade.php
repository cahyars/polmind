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
            <label class="form-label" for="caption">Teks Slider (Overlay Teks Dinamis)</label>
            <textarea id="caption" name="caption" class="form-control" rows="2" placeholder="Contoh: Didirikan oleh *Expert* dan Profesional Industri">{{ old('caption') }}</textarea>
            <div class="form-hint" style="line-height: 1.45; margin-top: 6px;">
              <i class="fas fa-magic" style="color: #2563eb;"></i> <strong>Fitur Cerdas:</strong> Cukup isi kolom ini jika mengunggah <em>foto mentahan tanpa teks</em>. Teks akan tampil melayang rapi dengan bayangan di atas foto. <strong>Kosongkan kolom ini jika foto sudah memiliki tulisan/teks bawaan di dalam gambarnya.</strong> Gunakan <code>*kata*</code> untuk cetak miring (<em>italic</em>).
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="title">Judul / Keterangan Banner (Alt Text SEO)</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Contoh: Kegiatan Mahasiswa Bersama Expert Industri">
            <div class="form-hint">Digunakan untuk aksesibilitas &amp; optimasi mesin pencari Google (Alt Text).</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="link">Link Tujuan (Opsional)</label>
            <input type="text" id="link" name="link" class="form-control" value="{{ old('link') }}" placeholder="Contoh: /pmb atau https://...">
            <div class="form-hint">Jika banner diklik, pengunjung akan diarahkan ke tautan ini.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="order">Urutan Tampil</label>
            <input type="number" id="order" name="order" class="form-control" value="{{ old('order', $sliders->count() + 1) }}" min="1">
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
              <th>Teks Slider & Detail</th>
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
                    <input type="hidden" name="from_quick_order" value="1">
                    <input type="hidden" name="title" value="{{ $slide->title }}">
                    <input type="hidden" name="link" value="{{ $slide->link }}">
                    <input type="hidden" name="is_active" value="{{ $slide->is_active ? 1 : 0 }}">
                    <input type="number" name="order" value="{{ $slide->order }}" style="width: 50px; padding: 4px; border: 1px solid var(--border); border-radius: 4px; font-size: 13px;" onchange="this.form.submit()" title="Ubah urutan langsung">
                  </form>
                </td>
                <td>
                  <div style="position: relative; width: 120px; height: 60px; border-radius: 6px; overflow: hidden; border: 1px solid #cbd5e1; background: #0f172a;">
                    <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @if($slide->has_dynamic_caption)
                      <span style="position: absolute; bottom: 2px; left: 2px; right: 2px; background: rgba(0,0,0,0.7); color: #fff; font-size: 9px; padding: 1px 4px; border-radius: 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                        <i class="fas fa-font"></i> Teks Dinamis
                      </span>
                    @endif
                  </div>
                </td>
                <td>
                  @if($slide->has_dynamic_caption)
                    <div style="margin-bottom: 4px;">
                      <span class="badge badge-info" style="font-size: 10px; font-weight: 700; padding: 2px 7px;">
                        <i class="fas fa-font"></i> Teks Dinamis (Overlay)
                      </span>
                    </div>
                    <div style="font-weight: 700; font-size: 14px; color: #102C53; background: #f8fafc; padding: 6px 10px; border-radius: 6px; border: 1px solid #e2e8f0; margin-bottom: 6px; line-height: 1.4;">
                      {!! $slide->formatted_caption !!}
                    </div>
                  @else
                    <div style="margin-bottom: 4px;">
                      <span class="badge badge-secondary" style="font-size: 10px; padding: 2px 7px;">
                        <i class="fas fa-image"></i> Teks Bawaan Gambar (Foto Matang)
                      </span>
                    </div>
                  @endif

                  @if($slide->title)
                    <div style="font-size: 12px; color: #64748b; margin-bottom: 2px;">
                      <strong>Alt:</strong> {{ $slide->title }}
                    </div>
                  @endif

                  @if($slide->link)
                    <div style="font-size: 12px; color: #2563eb;">
                      <i class="fas fa-link"></i> {{ $slide->link }}
                    </div>
                  @else
                    <div style="font-size: 11px; color: #94a3b8;">Tidak ada link</div>
                  @endif
                </td>
                <td>
                  <form action="{{ route('admin.sliders.toggle', $slide->id) }}" method="POST">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;" title="Klik untuk ubah status">
                      @if($slide->is_active)
                        <span class="badge badge-success"><i class="fas fa-check"></i> Aktif</span>
                      @else
                        <span class="badge badge-secondary"><i class="fas fa-eye-slash"></i> Nonaktif</span>
                      @endif
                    </button>
                  </form>
                </td>
                <td style="text-align: right; white-space: nowrap;">
                  <div style="display: inline-flex; gap: 6px; align-items: center; justify-content: flex-end;">
                    <button type="button" class="btn btn-sm btn-primary" onclick="openEditSliderModal(@js([
                      'id' => $slide->id,
                      'title' => $slide->title,
                      'caption' => $slide->caption,
                      'link' => $slide->link,
                      'order' => $slide->order,
                      'is_active' => (bool)$slide->is_active,
                      'image_url' => $slide->image_url,
                    ]))" title="Edit Slide">
                      <i class="fas fa-pen-to-square"></i>
                    </button>

                    <form action="{{ route('admin.sliders.destroy', $slide->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus slide banner ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" title="Hapus Slide">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </div>
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

<!-- Modal Edit Slide Banner -->
<div id="editSliderModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center; padding: 20px; overflow-y: auto;">
  <div style="background: #fff; width: 100%; max-width: 580px; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.2); overflow: hidden; margin: auto;">
    <div style="padding: 16px 20px; background: #f8fafc; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
      <h3 style="font-size: 16px; font-weight: 700; color: #102C53; margin: 0;">
        <i class="fas fa-pen-to-square" style="color: #2563eb; margin-right: 6px;"></i> Edit Slide Banner
      </h3>
      <button type="button" onclick="closeEditSliderModal()" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #64748b; line-height: 1;">&times;</button>
    </div>
    <form id="editSliderForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div style="padding: 20px; max-height: calc(85vh - 120px); overflow-y: auto;">
        
        <!-- Pratinjau Gambar Saat Ini & Opsi Ganti Gambar -->
        <div class="form-group">
          <label class="form-label">Gambar Slide Saat Ini</label>
          <div style="margin-bottom: 12px; border-radius: 8px; overflow: hidden; border: 1px solid #cbd5e1; background: #0f172a; text-align: center;">
            <img id="edit_current_preview" src="" alt="Gambar Saat Ini" style="width: 100%; max-height: 200px; object-fit: cover; display: block;">
          </div>

          <label class="form-label" for="edit_image">Ganti Gambar Slide (Opsional)</label>
          <input type="file" id="edit_image" name="image" class="form-control" accept="image/*" onchange="previewSlideEdit(this)">
          <div class="form-hint">Biarkan kosong jika tidak ingin mengganti gambar. Rekomendasi landscape 16:9 / 21:9 resolusi tinggi, maks 4MB.</div>

          <div id="editSlidePreviewBox" style="display: none; margin-top: 10px;">
            <div style="font-size: 12px; font-weight: 600; color: #2563eb; margin-bottom: 4px;">
              <i class="fas fa-eye"></i> Pratinjau Gambar Baru:
            </div>
            <img id="editSlidePreview" src="" alt="Pratinjau Baru" style="width: 100%; height: 160px; object-fit: cover; border-radius: 8px; border: 2px dashed #2563eb;">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_caption">Teks Slider (Overlay Teks Dinamis)</label>
          <textarea id="edit_caption" name="caption" class="form-control" rows="2" placeholder="Contoh: Didirikan oleh *Expert* dan Profesional Industri"></textarea>
          <div class="form-hint" style="line-height: 1.45; margin-top: 6px;">
            <i class="fas fa-magic" style="color: #2563eb;"></i> <strong>Fitur Cerdas:</strong> Isi jika gambar adalah <em>foto mentahan tanpa teks</em>. <strong>Kosongkan</strong> jika gambar sudah memiliki teks bawaan di dalam gambarnya. Gunakan <code>*kata*</code> untuk cetak miring (<em>italic</em>).
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_title">Judul / Keterangan Banner (Alt Text SEO)</label>
          <input type="text" id="edit_title" name="title" class="form-control" placeholder="Contoh: Kegiatan Mahasiswa Bersama Expert Industri">
          <div class="form-hint">Digunakan untuk aksesibilitas &amp; optimasi mesin pencari Google (Alt Text).</div>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_link">Link Tujuan (Opsional)</label>
          <input type="text" id="edit_link" name="link" class="form-control" placeholder="Contoh: /pmb atau https://...">
          <div class="form-hint">Jika diisi, pengunjung yang mengklik banner akan diarahkan ke link ini.</div>
        </div>

        <div style="display: grid; grid-template-columns: 140px 1fr; gap: 16px; align-items: start;">
          <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label" for="edit_order">Urutan Tampil <span style="color:#ef4444;">*</span></label>
            <input type="number" id="edit_order" name="order" class="form-control" required min="1">
          </div>

          <div class="form-group" style="margin-bottom: 0; padding-top: 26px;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; user-select: none;">
              <input type="checkbox" id="edit_is_active" name="is_active" value="1" style="width: 18px; height: 18px; cursor: pointer;">
              <span style="font-size: 14px; font-weight: 600; color: #1e293b;">Aktif (Tampilkan di Beranda)</span>
            </label>
          </div>
        </div>

      </div>
      <div style="padding: 14px 20px; background: #f8fafc; border-top: 1px solid #e2e8f0; display: flex; justify-content: flex-end; gap: 10px;">
        <button type="button" class="btn btn-secondary" onclick="closeEditSliderModal()">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
      </div>
    </form>
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
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      box.style.display = 'none';
      preview.src = '';
    }
  }

  function previewSlideEdit(input) {
    const box = document.getElementById('editSlidePreviewBox');
    const preview = document.getElementById('editSlidePreview');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        box.style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      box.style.display = 'none';
      preview.src = '';
    }
  }

  function openEditSliderModal(slider) {
    const modal = document.getElementById('editSliderModal');
    const form = document.getElementById('editSliderForm');
    form.action = '/admin/sliders/' + slider.id;

    document.getElementById('edit_title').value = slider.title || '';
    document.getElementById('edit_caption').value = slider.caption || '';
    document.getElementById('edit_link').value = slider.link || '';
    document.getElementById('edit_order').value = slider.order || 1;
    document.getElementById('edit_is_active').checked = Boolean(slider.is_active);

    const currentImg = document.getElementById('edit_current_preview');
    currentImg.src = slider.image_url || '';

    // Reset file input dan box preview gambar baru
    document.getElementById('edit_image').value = '';
    document.getElementById('editSlidePreviewBox').style.display = 'none';
    document.getElementById('editSlidePreview').src = '';

    modal.style.display = 'flex';
  }

  function closeEditSliderModal() {
    document.getElementById('editSliderModal').style.display = 'none';
  }

  window.addEventListener('click', function(e) {
    const modal = document.getElementById('editSliderModal');
    if (e.target === modal) {
      closeEditSliderModal();
    }
  });

  window.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeEditSliderModal();
    }
  });

  @if(isset($editSlider))
  document.addEventListener('DOMContentLoaded', function() {
    openEditSliderModal(@js([
      'id' => $editSlider->id,
      'title' => $editSlider->title,
      'caption' => $editSlider->caption,
      'link' => $editSlider->link,
      'order' => $editSlider->order,
      'is_active' => (bool)$editSlider->is_active,
      'image_url' => $editSlider->image_url,
    ]));
  });
  @endif
</script>
@endsection
