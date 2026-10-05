<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Panel') — Politeknik Mitra Industri</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon-cerah.ico') }}">

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --primary: #102C53;
      --primary-dark: #091a33;
      --primary-light: #1b3e76;
      --accent: #2563eb;
      --accent-hover: #1d4ed8;
      --bg: #f8fafc;
      --card-bg: #ffffff;
      --text: #0f172a;
      --text-muted: #64748b;
      --border: #e2e8f0;
      --sidebar-w: 260px;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--bg);
      color: var(--text);
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: var(--sidebar-w);
      background: var(--primary);
      color: #fff;
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      transition: transform 0.3s ease;
    }

    .sidebar-brand {
      padding: 24px 20px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .sidebar-brand img {
      height: 38px;
      width: auto;
      object-fit: contain;
    }
    .sidebar-brand .brand-text {
      font-size: 15px;
      font-weight: 700;
      line-height: 1.2;
      color: #fff;
    }
    .sidebar-brand .badge-admin {
      font-size: 10px;
      background: #3b82f6;
      color: #fff;
      padding: 2px 6px;
      border-radius: 4px;
      display: inline-block;
      margin-top: 4px;
      letter-spacing: 0.5px;
    }

    .sidebar-menu {
      list-style: none;
      padding: 20px 12px;
      flex: 1;
      overflow-y: auto;
    }
    .menu-header {
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #94a3b8;
      padding: 12px 12px 6px;
      font-weight: 700;
    }
    .menu-item a {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 11px 14px;
      color: #cbd5e1;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      border-radius: 8px;
      margin-bottom: 4px;
      transition: all 0.2s ease;
    }
    .menu-item a:hover {
      background: rgba(255,255,255,0.08);
      color: #fff;
    }
    .menu-item.active a {
      background: #2563eb;
      color: #fff;
      font-weight: 600;
    }
    .menu-item a i {
      width: 20px;
      font-size: 15px;
      text-align: center;
    }

    .sidebar-footer {
      padding: 16px 20px;
      border-top: 1px solid rgba(255,255,255,0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .user-info-brief {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .user-avatar-small {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: #3b82f6;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 14px;
    }
    .user-name-small {
      font-size: 13px;
      font-weight: 600;
      color: #fff;
      max-width: 130px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    /* Main Area */
    .main-wrapper {
      margin-left: var(--sidebar-w);
      flex: 1;
      display: flex;
      flex-direction: column;
      min-width: 0;
    }

    .top-navbar {
      height: 64px;
      background: var(--card-bg);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px;
      position: sticky;
      top: 0;
      z-index: 90;
    }

    .toggle-sidebar-btn {
      display: none;
      background: none;
      border: none;
      font-size: 20px;
      color: var(--text);
      cursor: pointer;
    }

    .top-actions {
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .btn-view-site {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 14px;
      background: #f1f5f9;
      color: #334155;
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      border-radius: 6px;
      border: 1px solid var(--border);
      transition: all 0.2s ease;
    }
    .btn-view-site:hover {
      background: #e2e8f0;
      color: var(--primary);
    }
    .btn-logout {
      background: none;
      border: none;
      color: #ef4444;
      font-size: 14px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-weight: 600;
      padding: 8px 12px;
      border-radius: 6px;
      transition: background 0.2s ease;
    }
    .btn-logout:hover {
      background: #fee2e2;
    }

    /* Content Area */
    .content-body {
      padding: 28px;
      flex: 1;
    }

    /* Alert / Flash Message */
    .alert {
      padding: 14px 18px;
      border-radius: 8px;
      margin-bottom: 22px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 14px;
      font-weight: 500;
    }
    .alert-success {
      background: #ecfdf5;
      color: #065f46;
      border: 1px solid #a7f3d0;
    }
    .alert-danger {
      background: #fef2f2;
      color: #991b1b;
      border: 1px solid #fecaca;
    }
    .alert-info {
      background: #eff6ff;
      color: #1e40af;
      border: 1px solid #bfdbfe;
    }

    /* Cards */
    .card {
      background: var(--card-bg);
      border-radius: 10px;
      border: 1px solid var(--border);
      box-shadow: 0 1px 3px rgba(0,0,0,0.03);
      margin-bottom: 24px;
    }
    .card-header {
      padding: 18px 24px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 12px;
    }
    .card-title {
      font-size: 16px;
      font-weight: 700;
      color: var(--primary);
    }
    .card-body {
      padding: 24px;
    }

    /* Buttons */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 9px 18px;
      font-size: 14px;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.2s ease;
      border: none;
    }
    .btn-primary {
      background: var(--accent);
      color: #fff;
    }
    .btn-primary:hover {
      background: var(--accent-hover);
    }
    .btn-secondary {
      background: #64748b;
      color: #fff;
    }
    .btn-secondary:hover {
      background: #475569;
    }
    .btn-danger {
      background: #ef4444;
      color: #fff;
    }
    .btn-danger:hover {
      background: #dc2626;
    }
    .btn-sm {
      padding: 6px 12px;
      font-size: 12px;
      border-radius: 6px;
    }

    /* Forms */
    .form-group {
      margin-bottom: 20px;
    }
    .form-label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #334155;
      margin-bottom: 7px;
    }
    .form-control {
      width: 100%;
      padding: 10px 14px;
      font-size: 14px;
      font-family: inherit;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: #fff;
      color: var(--text);
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .form-control:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
    }
    .form-hint {
      font-size: 12px;
      color: var(--text-muted);
      margin-top: 5px;
    }

    /* Tables */
    .table-responsive {
      overflow-x: auto;
    }
    .table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
      text-align: left;
    }
    .table th {
      background: #f8fafc;
      color: #475569;
      font-weight: 600;
      padding: 12px 16px;
      border-bottom: 1px solid var(--border);
      white-space: nowrap;
    }
    .table td {
      padding: 14px 16px;
      border-bottom: 1px solid var(--border);
      vertical-align: middle;
    }
    .table tbody tr:hover {
      background: #f8fafc;
    }

    /* Badges */
    .badge {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 600;
    }
    .badge-success { background: #dcfce7; color: #15803d; }
    .badge-warning { background: #fef3c7; color: #b45309; }
    .badge-info { background: #e0e7ff; color: #3730a3; }
    .badge-secondary { background: #f1f5f9; color: #475569; }

    /* Responsive */
    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.open {
        transform: translateX(0);
      }
      .main-wrapper {
        margin-left: 0;
      }
      .toggle-sidebar-btn {
        display: block;
      }
    }
  </style>
  @stack('styles')
</head>

<body>
  <!-- Sidebar -->
  <aside class="sidebar" id="adminSidebar">
    <div class="sidebar-brand">
      <img src="{{ asset('assets/images/logoFooter.png') }}" alt="Polmind Logo">
      <div>
        <div class="brand-text">POLMIND</div>
        <span class="badge-admin" style="background: {{ Auth::user()->isAdmin() ? '#3b82f6' : '#059669' }};">{{ Auth::user()->isAdmin() ? 'ADMINISTRATOR' : 'HUMAS / OPERATOR' }}</span>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="menu-header">Menu Utama</li>
      <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}">
          <i class="fas fa-gauge"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="menu-header">Kelola Konten</li>
      <li class="menu-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
        <a href="{{ route('admin.berita.index') }}">
          <i class="fas fa-newspaper"></i>
          <span>Kelola Berita</span>
        </a>
      </li>

      <li class="menu-item {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
        <a href="{{ route('admin.kategori.index') }}">
          <i class="fas fa-tags"></i>
          <span>Kategori Berita</span>
        </a>
      </li>

      @if(Auth::user()->isAdmin())
      <li class="menu-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
        <a href="{{ route('admin.sliders.index') }}">
          <i class="fas fa-images"></i>
          <span>Slider Beranda</span>
        </a>
      </li>

      <li class="menu-item {{ request()->routeIs('admin.pmb.*') ? 'active' : '' }}">
        <a href="{{ route('admin.pmb.index') }}">
          <i class="fas fa-user-graduate"></i>
          <span>Kelola PMB</span>
        </a>
      </li>

      <li class="menu-item {{ request()->routeIs('admin.konten.*') ? 'active' : '' }}">
        <a href="{{ route('admin.konten.index') }}">
          <i class="fas fa-sliders"></i>
          <span>Konten Website</span>
        </a>
      </li>

      <li class="menu-header">Civitas Akademika</li>
      <li class="menu-item {{ request()->routeIs('admin.dosen.*') ? 'active' : '' }}">
        <a href="{{ route('admin.dosen.index') }}">
          <i class="fas fa-chalkboard-user"></i>
          <span>Data Dosen</span>
        </a>
      </li>

      <li class="menu-item {{ request()->routeIs('admin.tendik.*') ? 'active' : '' }}">
        <a href="{{ route('admin.tendik.index') }}">
          <i class="fas fa-user-tie"></i>
          <span>Data Tendik</span>
        </a>
      </li>

      <li class="menu-header">Pengaturan Sistem</li>
      <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}">
          <i class="fas fa-users-gear"></i>
          <span>Kelola Pengguna</span>
        </a>
      </li>
      @endif

      <li class="menu-header">Situs</li>
      <li class="menu-item">
        <a href="{{ url('/') }}" target="_blank">
          <i class="fas fa-arrow-up-right-from-square"></i>
          <span>Lihat Website</span>
        </a>
      </li>
    </ul>

    <div class="sidebar-footer">
      <div class="user-info-brief">
        <div class="user-avatar-small" style="background: {{ Auth::user()->isAdmin() ? '#2563eb' : '#059669' }};">
          <i class="fas {{ Auth::user()->isAdmin() ? 'fa-user-shield' : 'fa-bullhorn' }}"></i>
        </div>
        <div>
          <div class="user-name-small">{{ Auth::user()->name ?? 'Admin' }}</div>
          <div style="font-size:11px; color:#94a3b8;">{{ Auth::user()->role_label }}</div>
        </div>
      </div>
    </div>
  </aside>

  <!-- Main Content Area -->
  <div class="main-wrapper">
    <header class="top-navbar">
      <button type="button" class="toggle-sidebar-btn" id="toggleSidebar">
        <i class="fas fa-bars"></i>
      </button>

      <div>
        <h2 style="font-size: 18px; font-weight: 700; color: var(--primary);">@yield('page_title', 'Admin Panel')</h2>
      </div>

      <div class="top-actions">
        <a href="{{ url('/') }}" target="_blank" class="btn-view-site">
          <i class="fas fa-globe"></i>
          <span>Buka Website</span>
        </a>

        <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
          @csrf
          <button type="submit" class="btn-logout" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
            <i class="fas fa-arrow-right-from-bracket"></i>
            <span>Logout</span>
          </button>
        </form>
      </div>
    </header>

    <div class="content-body">
      @if(session('success'))
        <div class="alert alert-success">
          <div><i class="fas fa-check-circle" style="margin-right:8px;"></i> {{ session('success') }}</div>
          <span style="cursor:pointer;" onclick="this.parentElement.remove()">✕</span>
        </div>
      @endif

      @if(session('info'))
        <div class="alert alert-info">
          <div><i class="fas fa-info-circle" style="margin-right:8px;"></i> {{ session('info') }}</div>
          <span style="cursor:pointer;" onclick="this.parentElement.remove()">✕</span>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger">
          <div><i class="fas fa-exclamation-circle" style="margin-right:8px;"></i> {{ session('error') }}</div>
          <span style="cursor:pointer;" onclick="this.parentElement.remove()">✕</span>
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger">
          <div>
            <strong><i class="fas fa-exclamation-triangle" style="margin-right:8px;"></i> Terdapat kesalahan pada input:</strong>
            <ul style="margin-left: 20px; margin-top: 6px;">
              @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
              @endforeach
            </ul>
          </div>
          <span style="cursor:pointer;" onclick="this.parentElement.remove()">✕</span>
        </div>
      @endif

      @yield('content')
    </div>
  </div>

  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('adminSidebar');
    if (toggleBtn && sidebar) {
      toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open');
      });
    }
  </script>
  @stack('scripts')
</body>
</html>
