@extends('layouts.admin')

@section('title', 'Kategori Berita')
@section('page_title', 'Kelola Kategori Berita')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
  <!-- Add New Category Form -->
  <div>
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-folder-plus" style="color: #2563eb; margin-right: 6px;"></i> Tambah Kategori Baru</div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.kategori.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label class="form-label" for="name">Nama Kategori <span style="color:#ef4444;">*</span></label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required placeholder="Contoh: Pengumuman, Beasiswa, Riset...">
          </div>

          <div class="form-group">
            <label class="form-label" for="slug">Slug (Opsional / Otomatis)</label>
            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="contoh: pengumuman">
            <div class="form-hint">Otomatis digenerate jika dikosongkan.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="description">Deskripsi Singkat</label>
            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Keterangan singkat mengenai kategori ini...">{{ old('description') }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
            <i class="fas fa-plus"></i> Simpan Kategori
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Categories Table List -->
  <div style="grid-column: span 2;">
    <div class="card">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-tags" style="color: #102C53; margin-right: 6px;"></i> Daftar Kategori Berita ({{ $categories->count() }})</div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 50px;">No</th>
              <th>Nama Kategori</th>
              <th>Slug</th>
              <th>Jumlah Berita</th>
              <th>Deskripsi</th>
              <th style="text-align: right; width: 120px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($categories as $index => $cat)
              <tr>
                <td style="color: #94a3b8; font-size: 13px;">{{ $index + 1 }}</td>
                <td>
                  <strong style="color: #1e293b;">{{ $cat->name }}</strong>
                </td>
                <td>
                  <code style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px; color: #475569; font-size: 12px;">{{ $cat->slug }}</code>
                </td>
                <td>
                  <span class="badge badge-info">{{ $cat->beritas_count }} berita</span>
                </td>
                <td style="color: #64748b; font-size: 13px;">
                  {{ $cat->description ?: '-' }}
                </td>
                <td style="text-align: right; white-space: nowrap;">
                  <!-- Edit trigger button -->
                  <button type="button" class="btn btn-sm btn-primary" onclick="openEditModal({{ $cat->id }}, '{{ addslashes($cat->name) }}', '{{ addslashes($cat->slug) }}', '{{ addslashes($cat->description ?? '') }}')" title="Edit Kategori">
                    <i class="fas fa-pen-to-square"></i>
                  </button>

                  <form action="{{ route('admin.kategori.destroy', $cat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Berita di kategori ini akan dipindahkan ke kategori default.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Kategori">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" style="text-align: center; color: #94a3b8; padding: 30px;">Belum ada kategori berita.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
  <div style="background: #fff; width: 100%; max-width: 500px; border-radius: 12px; padding: 24px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
      <h3 style="font-size: 17px; font-weight: 700; color: var(--primary);">Edit Kategori Berita</h3>
      <button type="button" onclick="closeEditModal()" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #94a3b8;">✕</button>
    </div>

    <form id="editForm" method="POST" action="">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label class="form-label" for="edit_name">Nama Kategori <span style="color:#ef4444;">*</span></label>
        <input type="text" id="edit_name" name="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label class="form-label" for="edit_slug">Slug <span style="color:#ef4444;">*</span></label>
        <input type="text" id="edit_slug" name="slug" class="form-control" required>
      </div>

      <div class="form-group">
        <label class="form-label" for="edit_description">Deskripsi</label>
        <textarea id="edit_description" name="description" class="form-control" rows="3"></textarea>
      </div>

      <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px;">
        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Perbarui</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Auto slug for Add form
  const nameInput = document.getElementById('name');
  const slugInput = document.getElementById('slug');

  nameInput.addEventListener('input', function() {
    if (!slugInput.dataset.manual) {
      slugInput.value = this.value
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
    }
  });
  slugInput.addEventListener('input', function() {
    this.dataset.manual = 'true';
  });

  // Modal handlers
  function openEditModal(id, name, slug, desc) {
    const modal = document.getElementById('editModal');
    const form = document.getElementById('editForm');
    form.action = `/admin/kategori/${id}`;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_slug').value = slug;
    document.getElementById('edit_description').value = desc;
    modal.style.display = 'flex';
  }

  function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
  }
</script>
@endsection
