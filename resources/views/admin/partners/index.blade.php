@extends('layouts.admin')

@section('title', 'Kelola Logo Mitra')
@section('page_title', 'Kelola Logo Mitra Industri & Kampus')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
  <!-- Tambah Logo Mitra Baru -->
  <div>
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-plus-circle" style="color: #2563eb; margin-right: 6px;"></i> Tambah Mitra Baru</div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label class="form-label" for="logo">Unggah File Logo <span style="color:#ef4444;">*</span></label>
            <input type="file" id="logo" name="logo" class="form-control" accept="image/*" required onchange="previewPartnerLogo(this, 'previewImg', 'previewBox')">
            <div class="form-hint">Format PNG, WebP, JPG, atau SVG. Disarankan logo dengan background transparan. Maksimal 4MB.</div>

            <div id="previewBox" style="display: none; margin-top: 10px; padding: 12px; background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; text-align: center;">
              <img id="previewImg" src="" alt="Pratinjau Logo" style="max-height: 80px; max-width: 100%; object-fit: contain;">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="name">Nama Mitra / Perusahaan / Kampus <span style="color:#ef4444;">*</span></label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: PT Denso Indonesia" required>
            <div class="form-hint">Nama ini akan ditampilkan tepat di bawah logo pada slider website.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="website_url">Link Website Mitra (Opsional)</label>
            <input type="url" id="website_url" name="website_url" class="form-control" placeholder="https://contohperusahaan.com">
            <div class="form-hint">Jika diisi, logo pada slider dapat diklik oleh pengunjung.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="order">Urutan Tampil</label>
            <input type="number" id="order" name="order" class="form-control" value="{{ $partners->count() + 1 }}" min="1">
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
            <i class="fas fa-save"></i> Simpan Logo Mitra
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Daftar Logo Mitra -->
  <div style="grid-column: span 2;">
    <div class="card">
      <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
        <div class="card-title"><i class="fas fa-handshake" style="color: #102C53; margin-right: 6px;"></i> Daftar Mitra Industri & Kerjasama ({{ $partners->count() }})</div>
        <div style="position: relative; width: 220px;">
          <input type="text" id="partnerSearch" placeholder="Cari nama mitra..." class="form-control" style="font-size: 13px; padding: 6px 12px;" onkeyup="filterPartners()">
        </div>
      </div>
      <div class="table-responsive">
        <table class="table" id="partnerTable">
          <thead>
            <tr>
              <th style="width: 60px;">Urutan</th>
              <th style="width: 110px;">Logo</th>
              <th>Nama Mitra & Tautan</th>
              <th>Status</th>
              <th style="text-align: right; width: 120px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($partners as $p)
              <tr class="partner-row" data-name="{{ strtolower($p->name) }}">
                <td>
                  <form action="{{ route('admin.partners.update', $p->id) }}" method="POST" style="display:flex; align-items:center; gap:4px;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="name" value="{{ $p->name }}">
                    <input type="hidden" name="website_url" value="{{ $p->website_url }}">
                    @if($p->is_active) <input type="hidden" name="is_active" value="1"> @endif
                    <input type="number" name="order" value="{{ $p->order }}" style="width: 50px; padding: 4px; border: 1px solid var(--border); border-radius: 4px; font-size: 13px;" onchange="this.form.submit()" title="Ubah urutan langsung">
                  </form>
                </td>
                <td>
                  <div style="width: 90px; height: 50px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; padding: 6px;">
                    <img src="{{ $p->logo_url }}" alt="{{ $p->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                  </div>
                </td>
                <td>
                  <div style="font-weight: 600; font-size: 13px; color: #1e293b;">{{ $p->name }}</div>
                  @if($p->website_url)
                    <div style="font-size: 12px; color: #2563eb; margin-top: 3px;">
                      <a href="{{ $p->website_url }}" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                        <i class="fas fa-external-link-alt" style="font-size: 10px;"></i> {{ Str::limit($p->website_url, 35) }}
                      </a>
                    </div>
                  @else
                    <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">(Tanpa tautan)</div>
                  @endif
                </td>
                <td>
                  <form action="{{ route('admin.partners.toggle', $p->id) }}" method="POST">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;">
                      @if($p->is_active)
                        <span class="badge badge-success"><i class="fas fa-check"></i> Aktif</span>
                      @else
                        <span class="badge badge-danger"><i class="fas fa-eye-slash"></i> Nonaktif</span>
                      @endif
                    </button>
                  </form>
                </td>
                <td style="text-align: right;">
                  <div style="display: inline-flex; gap: 6px;">
                    <button type="button" class="btn btn-secondary" style="padding: 5px 10px; font-size: 12px;" onclick="openEditPartnerModal({{ json_encode($p) }})" title="Edit Data">
                      <i class="fas fa-pen"></i>
                    </button>
                    <form action="{{ route('admin.partners.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus logo mitra {{ addslashes($p->name) }}?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px; background: #ef4444; color: #fff;" title="Hapus">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" style="text-align: center; color: #94a3b8; padding: 36px;">
                  <i class="fas fa-handshake" style="font-size: 32px; margin-bottom: 12px; display: block; opacity: 0.5;"></i>
                  Belum ada data logo mitra industri.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Mitra -->
<div id="editPartnerModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center; padding: 20px;">
  <div style="background: #fff; width: 100%; max-width: 520px; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.2); overflow: hidden;">
    <div style="padding: 16px 20px; background: #f8fafc; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
      <h3 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;"><i class="fas fa-pen-to-square" style="color: #2563eb; margin-right: 6px;"></i> Edit Logo Mitra</h3>
      <button type="button" onclick="closeEditPartnerModal()" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #64748b;">&times;</button>
    </div>
    <form id="editPartnerForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div style="padding: 20px;">
        <div class="form-group">
          <label class="form-label" for="edit_name">Nama Mitra <span style="color:#ef4444;">*</span></label>
          <input type="text" id="edit_name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_website_url">Link Website</label>
          <input type="url" id="edit_website_url" name="website_url" class="form-control">
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_order">Urutan Tampil</label>
          <input type="number" id="edit_order" name="order" class="form-control" required min="1">
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_logo">Ganti File Logo (Opsional)</label>
          <input type="file" id="edit_logo" name="logo" class="form-control" accept="image/*" onchange="previewPartnerLogo(this, 'editPreviewImg', 'editPreviewBox')">
          <div class="form-hint">Biarkan kosong jika tidak ingin mengganti logo yang sekarang.</div>

          <div id="editPreviewBox" style="margin-top: 10px; padding: 10px; background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; text-align: center;">
            <img id="editPreviewImg" src="" alt="Pratinjau" style="max-height: 70px; max-width: 100%; object-fit: contain;">
          </div>
        </div>

        <div class="form-group" style="display: flex; align-items: center; gap: 8px; margin-top: 12px;">
          <input type="checkbox" id="edit_is_active" name="is_active" value="1" style="width: 18px; height: 18px; cursor: pointer;">
          <label for="edit_is_active" style="margin: 0; font-size: 14px; font-weight: 500; cursor: pointer;">Status Aktif (Tampilkan di slider publik)</label>
        </div>
      </div>
      <div style="padding: 12px 20px; background: #f8fafc; border-top: 1px solid #e2e8f0; display: flex; justify-content: flex-end; gap: 10px;">
        <button type="button" class="btn btn-secondary" onclick="closeEditPartnerModal()">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>

<script>
  function previewPartnerLogo(input, imgId, boxId) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(imgId).src = e.target.result;
        document.getElementById(boxId).style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  function openEditPartnerModal(partner) {
    const modal = document.getElementById('editPartnerModal');
    const form = document.getElementById('editPartnerForm');
    form.action = `/admin/partners/${partner.id}`;
    document.getElementById('edit_name').value = partner.name || '';
    document.getElementById('edit_website_url').value = partner.website_url || '';
    document.getElementById('edit_order').value = partner.order || 1;
    document.getElementById('edit_is_active').checked = Boolean(partner.is_active);
    
    // Set preview current logo
    const previewBox = document.getElementById('editPreviewBox');
    const previewImg = document.getElementById('editPreviewImg');
    previewImg.src = partner.logo_url || `/storage/${partner.logo}`;
    previewBox.style.display = 'block';

    modal.style.display = 'flex';
  }

  function closeEditPartnerModal() {
    document.getElementById('editPartnerModal').style.display = 'none';
  }

  function filterPartners() {
    const keyword = document.getElementById('partnerSearch').value.toLowerCase().trim();
    const rows = document.querySelectorAll('.partner-row');
    rows.forEach(row => {
      const name = row.getAttribute('data-name') || '';
      row.style.display = name.includes(keyword) ? '' : 'none';
    });
  }
</script>
@endsection
