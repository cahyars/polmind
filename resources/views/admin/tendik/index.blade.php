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
                  <button type="button" class="btn btn-sm btn-primary" onclick="openEditModal({{ $item->id }}, '{{ addslashes($item->name) }}', '{{ addslashes($item->position ?? '') }}', {{ $item->order }}, '{{ $item->photo_url }}')" title="Edit Data Tendik">
                    <i class="fas fa-pen-to-square"></i>
                  </button>

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

<!-- Edit Tendik Modal -->
<div id="editTendikModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
  <div style="background: #fff; width: 100%; max-width: 520px; border-radius: 12px; padding: 24px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
      <h3 style="font-size: 17px; font-weight: 700; color: var(--primary);">Edit Data Tenaga Kependidikan</h3>
      <button type="button" onclick="closeEditModal()" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #94a3b8;">✕</button>
    </div>

    <form id="editTendikForm" method="POST" action="" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label class="form-label" for="edit_name">Nama Lengkap &amp; Gelar <span style="color:#ef4444;">*</span></label>
        <input type="text" id="edit_name" name="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label class="form-label" for="edit_position">Jabatan / Bagian</label>
        <input type="text" id="edit_position" name="position" class="form-control">
      </div>

      <div class="form-group">
        <label class="form-label" for="edit_photo">Ganti Foto Tendik</label>
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
          <img id="edit_photo_preview" src="" alt="Foto Tendik" style="width: 44px; height: 44px; object-fit: cover; border-radius: 50%; border: 1px solid var(--border);">
          <span style="font-size: 12px; color: #64748b;">Foto saat ini</span>
        </div>
        <input type="file" id="edit_photo" name="photo" class="form-control" accept="image/*">
        <div class="form-hint">Biarkan kosong jika tidak ingin mengubah foto.</div>
      </div>

      <div class="form-group">
        <label class="form-label" for="edit_order">Urutan Tampil <span style="color:#ef4444;">*</span></label>
        <input type="number" id="edit_order" name="order" class="form-control" required min="1">
      </div>

      <div style="margin-top: 24px; display: flex; justify-content: flex-end; gap: 10px;">
        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Perbarui Data</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openEditModal(id, name, position, order, photoUrl) {
    const modal = document.getElementById('editTendikModal');
    const form = document.getElementById('editTendikForm');
    form.action = `/admin/tendik/${id}`;

    document.getElementById('edit_name').value = name;
    document.getElementById('edit_position').value = position;
    document.getElementById('edit_order').value = order;
    document.getElementById('edit_photo_preview').src = photoUrl;

    modal.style.display = 'flex';
  }

  function closeEditModal() {
    document.getElementById('editTendikModal').style.display = 'none';
  }

  window.addEventListener('click', function(e) {
    const modal = document.getElementById('editTendikModal');
    if (e.target === modal) {
      closeEditModal();
    }
  });
</script>
@endsection
