<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Administrator — Politeknik Mitra Industri</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon-cerah.ico') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: linear-gradient(135deg, #091a33 0%, #102C53 50%, #1b3e76 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .login-card {
      background: #ffffff;
      border-radius: 16px;
      width: 100%;
      max-width: 440px;
      padding: 38px 32px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    }
    .brand-header {
      text-align: center;
      margin-bottom: 28px;
    }
    .brand-header img {
      height: 52px;
      margin-bottom: 12px;
    }
    .brand-header h1 {
      font-size: 20px;
      font-weight: 800;
      color: #102C53;
      letter-spacing: -0.5px;
    }
    .brand-header p {
      font-size: 13px;
      color: #64748b;
      margin-top: 4px;
    }
    .form-group {
      margin-bottom: 18px;
    }
    .form-label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #334155;
      margin-bottom: 6px;
    }
    .input-wrapper {
      position: relative;
    }
    .input-wrapper i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #94a3b8;
      font-size: 15px;
    }
    .form-control {
      width: 100%;
      padding: 12px 14px 12px 40px;
      font-size: 14px;
      font-family: inherit;
      border: 1px solid #cbd5e1;
      border-radius: 10px;
      transition: all 0.2s ease;
    }
    .form-control:focus {
      outline: none;
      border-color: #2563eb;
      box-shadow: 0 0 0 4px rgba(37,99,235,0.12);
    }
    .remember-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 22px;
      font-size: 13px;
      color: #475569;
    }
    .remember-row label {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
    }
    .btn-submit {
      width: 100%;
      padding: 12px;
      background: #102C53;
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      transition: background 0.2s ease, transform 0.1s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .btn-submit:hover {
      background: #1b3e76;
    }
    .btn-submit:active {
      transform: scale(0.99);
    }
    .alert-error {
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #991b1b;
      padding: 12px 14px;
      border-radius: 8px;
      font-size: 13px;
      margin-bottom: 18px;
    }
    .alert-info {
      background: #eff6ff;
      border: 1px solid #bfdbfe;
      color: #1e40af;
      padding: 12px 14px;
      border-radius: 8px;
      font-size: 13px;
      margin-bottom: 18px;
    }
    .login-footer {
      text-align: center;
      margin-top: 24px;
      font-size: 12px;
      color: #94a3b8;
    }
    .demo-credentials {
      margin-top: 18px;
      padding: 12px;
      background: #f8fafc;
      border: 1px dashed #cbd5e1;
      border-radius: 8px;
      font-size: 12px;
      color: #475569;
    }
  </style>
</head>

<body>
  <div class="login-card">
    <div class="brand-header">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Polmind Logo" onerror="this.src='{{ asset('assets/images/logoFooter.png') }}'">
      <h1>Portal Admin Website</h1>
      <p>Politeknik Mitra Industri</p>
    </div>

    @if(session('info'))
      <div class="alert-info">
        <i class="fas fa-info-circle"></i> {{ session('info') }}
      </div>
    @endif

    @if($errors->any())
      <div class="alert-error">
        <i class="fas fa-circle-exclamation"></i> {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf

      <div class="form-group">
        <label class="form-label" for="email">Email Administrator</label>
        <div class="input-wrapper">
          <i class="fas fa-envelope"></i>
          <input type="email" id="email" name="email" class="form-control" value="{{ old('email', 'admin@polmind.ac.id') }}" required autofocus placeholder="admin@polmind.ac.id">
        </div>
      </div>

      <div class="form-group">
        <label class="form-label" for="password">Password</label>
        <div class="input-wrapper">
          <i class="fas fa-lock"></i>
          <input type="password" id="password" name="password" class="form-control" value="admin123" required placeholder="••••••••">
        </div>
      </div>

      <div class="remember-row">
        <label>
          <input type="checkbox" name="remember" checked> Ingat saya
        </label>
        <a href="/" style="color:#2563eb; text-decoration:none; font-size:12px;">Ke Website →</a>
      </div>

      <button type="submit" class="btn-submit">
        <span>Masuk ke Panel Admin</span>
        <i class="fas fa-arrow-right"></i>
      </button>

      <div class="demo-credentials">
        <strong><i class="fas fa-key"></i> Akun Login Default:</strong><br>
        Email: <code>admin@polmind.ac.id</code><br>
        Password: <code>admin123</code>
      </div>
    </form>

    <div class="login-footer">
      &copy; {{ date('Y') }} Politeknik Mitra Industri. All rights reserved.
    </div>
  </div>
</body>
</html>
