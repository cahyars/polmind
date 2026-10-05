@extends('layouts.admin')

@section('title', 'Kelola Pengguna & Operator')
@section('page_title', 'Manajemen Pengguna & Operator')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">

  <!-- Form Tambah User / Operator -->
  <div>
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <i class="fas fa-user-plus" style="color: #2563eb; margin-right: 6px;"></i> Tambah Akun Baru
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label class="form-label" for="name">Nama Lengkap / Identitas <span style="color:#ef4444;">*</span></label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="Contoh: Tim Humas & Publikasi" value="{{ old('name') }}">
          </div>

          <div class="form-group">
            <label class="form-label" for="email">Alamat Email Login <span style="color:#ef4444;">*</span></label>
            <input type="email" id="email" name="email" class="form-control" required placeholder="Contoh: humas@polmind.ac.id" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label class="form-label" for="role">Hak Akses / Peran Akun <span style="color:#ef4444;">*</span></label>
            <select id="role" name="role" class="form-control" required>
              <option value="humas" {{ old('role', 'humas') === 'humas' ? 'selected' : '' }}>Humas / Operator (Hanya Kelola Berita)</option>
              <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator (Akses Penuh Seluruh Sistem)</option>
            </select>
            <div class="form-hint" style="color: #64748b; font-size: 12px; margin-top: 4px;">
              Akun <strong>Humas / Operator</strong> hanya dapat menambah, mengedit, dan mempublikasikan berita & kategori.
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Password Baru <span style="color:#ef4444;">*</span></label>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Minimal 6 karakter" minlength="6">
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 10px;">
            <i class="fas fa-save"></i> Buat Akun Pengguna
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- List Pengguna -->
  <div style="grid-column: span 2;">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <i class="fas fa-users-gear" style="color: #102C53; margin-right: 6px;"></i> Daftar Pengguna Terdaftar ({{ $users->count() }})
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Pengguna</th>
              <th>Peran</th>
              <th>Cakupan Akses</th>
              <th>Terdaftar</th>
              <th style="text-align: right; width: 110px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 38px; height: 38px; border-radius: 50%; background: {{ $user->isAdmin() ? '#102C53' : '#059669' }}; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; flex-shrink: 0;">
                      {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                      <div style="font-weight: 600; color: #1e293b;">
                        {{ $user->name }}
                        @if($user->id === Auth::id())
                          <span style="font-size: 11px; background: #e0f2fe; color: #0284c7; padding: 2px 6px; border-radius: 4px; margin-left: 4px; font-weight: 600;">Akun Anda</span>
                        @endif
                      </div>
                      <div style="color: #64748b; font-size: 13px;">{{ $user->email }}</div>
                    </div>
                  </div>
                </td>
                <td>
                  @if($user->isAdmin())
                    <span class="badge" style="background: #e0e7ff; color: #3730a3; font-weight: 600;">
                      <i class="fas fa-shield-halved" style="margin-right: 4px;"></i> Administrator
                    </span>
                  @else
                    <span class="badge" style="background: #dcfce7; color: #166534; font-weight: 600;">
                      <i class="fas fa-bullhorn" style="margin-right: 4px;"></i> Humas / Operator
                    </span>
                  @endif
                </td>
                <td style="font-size: 13px; color: #64748b;">
                  @if($user->isAdmin())
                    <span style="color: #1e293b; font-weight: 500;"><i class="fas fa-check-circle" style="color: #10b981; margin-right: 4px;"></i> Akses Penuh Semua Menu</span>
                  @else
                    <span style="color: #059669; font-weight: 500;"><i class="fas fa-newspaper" style="margin-right: 4px;"></i> Khusus Kelola Berita</span>
                  @endif
                </td>
                <td style="font-size: 13px; color: #64748b;">
                  {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                </td>
                <td style="text-align: right; white-space: nowrap;">
                  <!-- Tombol Edit Modal -->
                  <button type="button" class="btn btn-sm btn-secondary" onclick="openEditUserModal({{ json_encode($user) }})" title="Edit Pengguna">
                    <i class="fas fa-edit"></i>
                  </button>

                  <!-- Tombol Hapus -->
                  @if($user->id !== Auth::id())
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun {{ $user->name }}?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" title="Hapus Akun">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  @else
                    <button class="btn btn-sm btn-secondary" disabled title="Akun aktif Anda tidak dapat dihapus" style="opacity: 0.4; cursor: not-allowed;">
                      <i class="fas fa-lock"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit User -->
<div id="editUserModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
  <div style="background: #ffffff; border-radius: 14px; width: 100%; max-width: 480px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.2); overflow: hidden; animation: fadeInModal 0.2s ease;">
    <div style="padding: 18px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
      <h3 style="margin: 0; font-size: 17px; color: #102C53; font-weight: 700;">
        <i class="fas fa-user-pen" style="color: #2563eb; margin-right: 6px;"></i> Edit Akun Pengguna
      </h3>
      <button type="button" onclick="closeEditUserModal()" style="background: none; border: none; font-size: 18px; color: #64748b; cursor: pointer;">&times;</button>
    </div>

    <form id="editUserForm" method="POST" action="">
      @csrf
      @method('PUT')
      <div style="padding: 24px;">
        <div class="form-group">
          <label class="form-label" for="edit_name">Nama Lengkap <span style="color:#ef4444;">*</span></label>
          <input type="text" id="edit_name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_email">Alamat Email <span style="color:#ef4444;">*</span></label>
          <input type="email" id="edit_email" name="email" class="form-control" required>
        </div>

        <div class="form-group" id="edit_role_group">
          <label class="form-label" for="edit_role">Hak Akses / Peran</label>
          <select id="edit_role" name="role" class="form-control" required>
            <option value="humas">Humas / Operator (Hanya Kelola Berita)</option>
            <option value="admin">Administrator (Akses Penuh Seluruh Sistem)</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label" for="edit_password">Password Baru (Opsional)</label>
          <input type="password" id="edit_password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password" minlength="6">
          <div class="form-hint" style="color: #64748b; font-size: 12px; margin-top: 4px;">
            Isi hanya jika ingin mengganti password akun ini.
          </div>
        </div>
      </div>

      <div style="padding: 16px 24px; background: #f8fafc; border-top: 1px solid #e2e8f0; display: flex; justify-content: flex-end; gap: 10px;">
        <button type="button" class="btn btn-secondary" onclick="closeEditUserModal()">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
function openEditUserModal(user) {
  const modal = document.getElementById('editUserModal');
  const form = document.getElementById('editUserForm');
  
  form.action = `/admin/users/${user.id}`;
  document.getElementById('edit_name').value = user.name;
  document.getElementById('edit_email').value = user.email;
  document.getElementById('edit_role').value = user.role || 'humas';
  document.getElementById('edit_password').value = '';

  const roleSelect = document.getElementById('edit_role');
  if (user.id === {{ Auth::id() }}) {
    roleSelect.disabled = true;
  } else {
    roleSelect.disabled = false;
  }

  modal.style.display = 'flex';
}

function closeEditUserModal() {
  document.getElementById('editUserModal').style.display = 'none';
}

window.addEventListener('click', function(e) {
  const modal = document.getElementById('editUserModal');
  if (e.target === modal) {
    closeEditUserModal();
  }
});
</script>
@endpush
