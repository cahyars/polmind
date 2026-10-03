@extends('layouts.admin')

@section('title', 'Kelola Informasi PMB')
@section('page_title', 'Kelola Seluruh Informasi Penerimaan Mahasiswa Baru (PMB)')

@section('content')
<div style="display: flex; flex-direction: column; gap: 20px;">

  <!-- Header Action Bar -->
  <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; background: #ffffff; padding: 18px 24px; border-radius: 12px; border: 1px solid var(--border); box-shadow: 0 2px 6px rgba(0,0,0,0.03);">
    <div>
      <h3 style="font-size: 16px; font-weight: 700; color: var(--primary); margin-bottom: 4px;">
        <i class="fas fa-user-graduate" style="color: #2563eb; margin-right: 8px;"></i> Pusat Kontrol Halaman PMB
      </h3>
      <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
        Kelola teks hero, jadwal gelombang, rincian biaya, persyaratan, dan catatan penting halaman PMB secara dinamis.
      </p>
    </div>

    <div style="display: flex; gap: 10px; align-items: center;">
      <a href="{{ url('/pmb') }}" target="_blank" class="btn btn-secondary" style="font-size: 13px;">
        <i class="fas fa-eye"></i> Lihat Halaman PMB
      </a>

      <form method="POST" action="{{ route('admin.pmb.reset') }}" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin me-reset seluruh informasi PMB kembali ke data default resmi? Perubahan yang belum disimpan akan hilang.')">
        @csrf
        <button type="submit" class="btn btn-danger" style="font-size: 13px; background: #fee2e2; color: #b91c1c; border-color: #fca5a5;">
          <i class="fas fa-rotate-left"></i> Reset Default
        </button>
      </form>
    </div>
  </div>

  <!-- Navigation Tabs -->
  <div style="display: flex; gap: 8px; border-bottom: 2px solid var(--border); padding-bottom: 8px; flex-wrap: wrap;">
    <button type="button" class="tab-btn {{ !request('tab') || request('tab') == 'tab-hero' ? 'active' : '' }}" onclick="switchPmbTab(event, 'tab-hero')">
      <i class="fas fa-bullhorn"></i> Hero & Pengantar
    </button>
    <button type="button" class="tab-btn {{ request('tab') == 'tab-jadwal' ? 'active' : '' }}" onclick="switchPmbTab(event, 'tab-jadwal')">
      <i class="fas fa-calendar-alt"></i> Jadwal Gelombang
    </button>
    <button type="button" class="tab-btn {{ request('tab') == 'tab-biaya' ? 'active' : '' }}" onclick="switchPmbTab(event, 'tab-biaya')">
      <i class="fas fa-wallet"></i> Biaya & Grafik SPI
    </button>
    <button type="button" class="tab-btn {{ request('tab') == 'tab-persyaratan' ? 'active' : '' }}" onclick="switchPmbTab(event, 'tab-persyaratan')">
      <i class="fas fa-list-check"></i> Persyaratan & NB
    </button>
    <button type="button" class="tab-btn {{ request('tab') == 'tab-info' ? 'active' : '' }}" onclick="switchPmbTab(event, 'tab-info')">
      <i class="fas fa-circle-info"></i> Info Tambahan & CTA
    </button>
  </div>

  <style>
    .tab-btn {
      padding: 10px 18px;
      background: #f1f5f9;
      color: #475569;
      border: 1px solid var(--border);
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 600;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s ease;
    }
    .tab-btn.active, .tab-btn:hover {
      background: var(--primary);
      color: #fff;
      border-color: var(--primary);
    }
    .pmb-tab-panel {
      display: none;
      width: 100%;
    }
    .pmb-tab-panel.active {
      display: block;
    }
    .batch-admin-card {
      background: #ffffff;
      border: 1.5px solid var(--border);
      border-radius: 12px;
      padding: 22px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.03);
      position: relative;
    }
    .batch-admin-card.is-active-batch {
      border-color: #2563eb;
      background: #f8faff;
    }
  </style>

  <!-- =========================================================
       TAB 1: HERO & PENGANTAR PMB
       ========================================================= -->
  <div id="tab-hero" class="pmb-tab-panel {{ !request('tab') || request('tab') == 'tab-hero' ? 'active' : '' }}">
    <div class="card" style="max-width: 900px;">
      <div class="card-header">
        <div class="card-title">
          <i class="fas fa-bullhorn" style="color: #2563eb; margin-right: 8px;"></i>
          Informasi Hero Section & Pengantar PMB
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.pmb.hero') }}">
          @csrf

          <div class="form-group">
            <label class="form-label" for="pmb_hero_badge">Teks Badge Hero (Pill Merah Atas)</label>
            <input type="text" id="pmb_hero_badge" name="pmb_hero_badge" class="form-control" value="{{ old('pmb_hero_badge', $pmb['pmb_hero_badge']) }}" required>
            <div class="form-hint">Contoh: "PMB Gelombang I Sedang Dibuka"</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="pmb_hero_title">Judul Utama Hero (Heading)</label>
            <textarea id="pmb_hero_title" name="pmb_hero_title" class="form-control" rows="2" required>{{ old('pmb_hero_title', $pmb['pmb_hero_title']) }}</textarea>
            <div class="form-hint">Gunakan baris baru untuk memisahkan baris judul.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="pmb_hero_subtitle">Deskripsi / Subtitle Hero</label>
            <textarea id="pmb_hero_subtitle" name="pmb_hero_subtitle" class="form-control" rows="3" required>{{ old('pmb_hero_subtitle', $pmb['pmb_hero_subtitle']) }}</textarea>
          </div>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
            <div class="form-group">
              <label class="form-label" for="pmb_register_url">URL / Tautan Pendaftaran SPMB Online</label>
              <input type="url" id="pmb_register_url" name="pmb_register_url" class="form-control" value="{{ old('pmb_register_url', $pmb['pmb_register_url']) }}" required>
            </div>

            <div class="form-group">
              <label class="form-label" for="pmb_academic_year">Tahun Akademik PMB</label>
              <input type="text" id="pmb_academic_year" name="pmb_academic_year" class="form-control" value="{{ old('pmb_academic_year', $pmb['pmb_academic_year']) }}" required>
              <div class="form-hint">Contoh: "2026/2027"</div>
            </div>
          </div>

          <hr style="margin: 24px 0; border: 0; border-top: 1px solid var(--border);">

          <div class="form-group">
            <label class="form-label" for="pmb_page_title">Judul Konten Halaman</label>
            <input type="text" id="pmb_page_title" name="pmb_page_title" class="form-control" value="{{ old('pmb_page_title', $pmb['pmb_page_title']) }}" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="pmb_intro_text">Paragraf Pengantar PMB</label>
            <textarea id="pmb_intro_text" name="pmb_intro_text" class="form-control" rows="4" required>{{ old('pmb_intro_text', $pmb['pmb_intro_text']) }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Hero & Pengantar PMB
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- =========================================================
       TAB 2: JADWAL GELOMBANG PMB
       ========================================================= -->
  <div id="tab-jadwal" class="pmb-tab-panel {{ request('tab') == 'tab-jadwal' ? 'active' : '' }}">
    <form method="POST" action="{{ route('admin.pmb.jadwal') }}">
      @csrf

      <div style="background: #ffffff; padding: 20px 24px; border-radius: 12px; border: 1px solid var(--border); margin-bottom: 20px;">
        <h4 style="font-size: 15px; font-weight: 700; color: var(--primary); margin-bottom: 8px;">
          <i class="fas fa-toggle-on" style="color: #2563eb; margin-right: 6px;"></i> Pilih Gelombang yang Sedang Aktif Saat Ini
        </h4>
        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 15px;">
          Gelombang yang dipilih sebagai <strong>Aktif</strong> akan diberi border sorotan khusus, tombol pendaftaran langsung, dan menjadi default tab.
        </p>

        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
          @foreach($pmb['batches_list'] as $batch)
            <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
              <input type="radio" name="active_batch_id" value="{{ $batch['id'] }}" {{ !empty($batch['is_active']) ? 'checked' : '' }} style="width: 18px; height: 18px;">
              <span>{{ $batch['name'] }}</span>
            </label>
          @endforeach
        </div>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(460px, 1fr)); gap: 20px; margin-bottom: 24px;">
        @foreach($pmb['batches_list'] as $batch)
          @php $id = $batch['id']; @endphp
          <div class="batch-admin-card {{ !empty($batch['is_active']) ? 'is-active-batch' : '' }}">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; border-bottom: 1px solid var(--border); padding-bottom: 12px;">
              <div style="font-size: 16px; font-weight: 700; color: var(--primary);">
                <i class="fas fa-layer-group" style="color: #0284c7; margin-right: 6px;"></i> {{ $batch['name'] }}
                @if(!empty($batch['is_active']))
                  <span style="font-size: 11px; background: #2563eb; color: #fff; padding: 2px 8px; border-radius: 20px; margin-left: 8px;">AKTIF SEKARANG</span>
                @endif
              </div>

              <div>
                <select name="batches[{{ $id }}][status]" class="form-control" style="font-size: 12px; padding: 4px 8px; width: auto;">
                  <option value="buka" {{ ($batch['status'] ?? '') == 'buka' ? 'selected' : '' }}>🟢 BUKA</option>
                  <option value="upcoming" {{ ($batch['status'] ?? '') == 'upcoming' ? 'selected' : '' }}>⚪ Akan Datang</option>
                  <option value="tutup" {{ ($batch['status'] ?? '') == 'tutup' ? 'selected' : '' }}>🔴 Tutup</option>
                </select>
              </div>
            </div>

            <input type="hidden" name="batches[{{ $id }}][name]" value="{{ $batch['name'] }}">

            <div class="form-group">
              <label class="form-label" style="font-size: 12px;">Tahapan Aktif / Sedang Berjalan di Stepper</label>
              <select name="batches[{{ $id }}][active_step]" class="form-control" style="font-size: 13px;">
                <option value="0" {{ ($batch['active_step'] ?? 0) == 0 ? 'selected' : '' }}>Belum Berjalan (Semua Abu-abu)</option>
                <option value="1" {{ ($batch['active_step'] ?? 0) == 1 ? 'selected' : '' }}>Tahap 1: Pendaftaran (Sedang Berjalan)</option>
                <option value="2" {{ ($batch['active_step'] ?? 0) == 2 ? 'selected' : '' }}>Tahap 2: Ujian Seleksi (Sedang Berjalan / Aktif)</option>
                <option value="3" {{ ($batch['active_step'] ?? 0) == 3 ? 'selected' : '' }}>Tahap 3: Pengumuman (Sedang Berjalan)</option>
                <option value="4" {{ ($batch['active_step'] ?? 0) == 4 ? 'selected' : '' }}>Tahap 4: Daftar Ulang (Sedang Berjalan)</option>
              </select>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
              <div class="form-group">
                <label class="form-label" style="font-size: 12px;">1. Tanggal Pendaftaran</label>
                <input type="text" name="batches[{{ $id }}][date_reg]" class="form-control" value="{{ $batch['date_reg'] ?? '' }}" required style="font-size: 13px;">
              </div>

              <div class="form-group">
                <label class="form-label" style="font-size: 12px;">2. Tanggal Ujian Seleksi</label>
                <input type="text" name="batches[{{ $id }}][date_exam]" class="form-control" value="{{ $batch['date_exam'] ?? '' }}" required style="font-size: 13px;">
              </div>

              <div class="form-group">
                <label class="form-label" style="font-size: 12px;">3. Tanggal Pengumuman</label>
                <input type="text" name="batches[{{ $id }}][date_announcement]" class="form-control" value="{{ $batch['date_announcement'] ?? '' }}" required style="font-size: 13px;">
              </div>

              <div class="form-group">
                <label class="form-label" style="font-size: 12px;">4. Tanggal Daftar Ulang</label>
                <input type="text" name="batches[{{ $id }}][date_rereg]" class="form-control" value="{{ $batch['date_rereg'] ?? '' }}" required style="font-size: 13px;">
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <button type="submit" class="btn btn-primary" style="padding: 12px 28px;">
        <i class="fas fa-save"></i> Simpan Seluruh Jadwal Gelombang
      </button>
    </form>
  </div>

  <!-- =========================================================
       TAB 3: BIAYA PERKULIAHAN & GRAFIK SPI
       ========================================================= -->
  <div id="tab-biaya" class="pmb-tab-panel {{ request('tab') == 'tab-biaya' ? 'active' : '' }}">
    <form method="POST" action="{{ route('admin.pmb.biaya') }}">
      @csrf

      <!-- KONTROL STATUS COMING SOON BIAYA -->
      <div class="card" style="margin-bottom: 24px; border: 2px solid {{ !empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1' ? '#f59e0b' : '#10b981' }};">
        <div class="card-header" style="background: {{ !empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1' ? '#fffbeb' : '#f0fdf4' }}; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
          <div class="card-title" style="color: {{ !empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1' ? '#b45309' : '#15803d' }}; margin: 0;">
            <i class="fas fa-eye-slash" style="margin-right: 8px;"></i>
            Status Tampilan Biaya Perkuliahan di Website
          </div>
          @if(!empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1')
            <span style="font-size: 12px; font-weight: 700; background: #fef3c7; color: #b45309; padding: 5px 12px; border-radius: 20px; border: 1px solid #fde68a;">
              <i class="fas fa-clock"></i> MODE COMING SOON AKTIF
            </span>
          @else
            <span style="font-size: 12px; font-weight: 700; background: #dcfce7; color: #15803d; padding: 5px 12px; border-radius: 20px; border: 1px solid #bbf7d0;">
              <i class="fas fa-check-circle"></i> PUBLIKASI PENUH AKTIF
            </span>
          @endif
        </div>
        <div class="card-body">
          <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 15px;">
            Gunakan opsi ini jika biaya perkuliahan belum ditetapkan oleh pimpinan sehingga nominal belum boleh dipublikasikan ke publik.
          </p>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 16px; margin-bottom: 18px;">
            <label style="display: flex; gap: 12px; padding: 14px 18px; border-radius: 10px; border: 2px solid {{ !empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1' ? '#f59e0b' : '#cbd5e1' }}; background: {{ !empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1' ? '#fffbeb' : '#ffffff' }}; cursor: pointer; transition: all 0.2s ease;">
              <input type="radio" name="pmb_fee_coming_soon" value="1" {{ !empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1' ? 'checked' : '' }} style="width: 18px; height: 18px; margin-top: 2px;">
              <div>
                <div style="font-weight: 700; color: #b45309; font-size: 14.5px;">
                  <i class="fas fa-hourglass-half"></i> Opsi Coming Soon (Sembunyikan Rincian Biaya)
                </div>
                <div style="font-size: 12.5px; color: #64748b; margin-top: 5px; line-height: 1.5;">
                  <strong>Pilihan ini menyembunyikan nominal biaya dan grafik SPI</strong> di website publik, lalu menggantinya dengan banner elegan bahwa biaya sedang dalam proses penetapan pimpinan. (Jadwal pendaftaran tetap tampil normal).
                </div>
              </div>
            </label>

            <label style="display: flex; gap: 12px; padding: 14px 18px; border-radius: 10px; border: 2px solid {{ empty($pmb['pmb_fee_coming_soon']) || $pmb['pmb_fee_coming_soon'] == '0' ? '#10b981' : '#cbd5e1' }}; background: {{ empty($pmb['pmb_fee_coming_soon']) || $pmb['pmb_fee_coming_soon'] == '0' ? '#f0fdf4' : '#ffffff' }}; cursor: pointer; transition: all 0.2s ease;">
              <input type="radio" name="pmb_fee_coming_soon" value="0" {{ empty($pmb['pmb_fee_coming_soon']) || $pmb['pmb_fee_coming_soon'] == '0' ? 'checked' : '' }} style="width: 18px; height: 18px; margin-top: 2px;">
              <div>
                <div style="font-weight: 700; color: #15803d; font-size: 14.5px;">
                  <i class="fas fa-check-double"></i> Publikasikan Lengkap (Tampilkan Rincian Biaya)
                </div>
                <div style="font-size: 12.5px; color: #64748b; margin-top: 5px; line-height: 1.5;">
                  Tampilkan seluruh 4 kartu biaya gelombang, nominal formulir, SPI normal & beasiswa, UKT semesteran, serta grafik SPI ke publik.
                </div>
              </div>
            </label>
          </div>

          <!-- Form Kustomisasi Banner Coming Soon -->
          <div id="box-cs-settings" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 18px; margin-top: 10px;">
            <h5 style="font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 14px;">
              <i class="fas fa-pen-to-square" style="color: #f59e0b; margin-right: 6px;"></i> Pengaturan Teks Banner "Coming Soon" di Halaman Depan
            </h5>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="pmb_fee_coming_soon_badge">Teks Badge Header</label>
                <input type="text" id="pmb_fee_coming_soon_badge" name="pmb_fee_coming_soon_badge" class="form-control" value="{{ old('pmb_fee_coming_soon_badge', $pmb['pmb_fee_coming_soon_badge'] ?? 'Segera Diumumkan / Coming Soon') }}">
              </div>

              <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="pmb_fee_coming_soon_title">Judul Banner Coming Soon</label>
                <input type="text" id="pmb_fee_coming_soon_title" name="pmb_fee_coming_soon_title" class="form-control" value="{{ old('pmb_fee_coming_soon_title', $pmb['pmb_fee_coming_soon_title'] ?? 'Informasi Biaya Perkuliahan Akan Segera Diumumkan') }}">
              </div>
            </div>

            <div class="form-group" style="margin-top: 14px; margin-bottom: 0;">
              <label class="form-label" for="pmb_fee_coming_soon_desc">Deskripsi Pemberitahuan</label>
              <textarea id="pmb_fee_coming_soon_desc" name="pmb_fee_coming_soon_desc" class="form-control" rows="2">{{ old('pmb_fee_coming_soon_desc', $pmb['pmb_fee_coming_soon_desc'] ?? 'Rincian pembiayaan studi (SPI & UKT) untuk Tahun Akademik 2026/2027 saat ini sedang dalam proses penetapan oleh pimpinan institusi Politeknik Mitra Industri. Calon mahasiswa dipersilakan melakukan pendaftaran terlebih dahulu mengikuti jadwal gelombang yang telah dibuka.') }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="card" style="margin-bottom: 24px;">
        <div class="card-header">
          <div class="card-title">
            <i class="fas fa-info-circle" style="color: #2563eb; margin-right: 6px;"></i>
            Ketentuan Umum & Teks Pemberitahuan Biaya
          </div>
        </div>
        <div class="card-body">
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: 16px;">
            <div class="form-group">
              <label class="form-label" for="pmb_fee_subtitle">Subjudul Bagian Biaya Perkuliahan</label>
              <textarea id="pmb_fee_subtitle" name="pmb_fee_subtitle" class="form-control" rows="2" required>{{ old('pmb_fee_subtitle', $pmb['pmb_fee_subtitle']) }}</textarea>
            </div>

            <div class="form-group">
              <label class="form-label" for="pmb_fee_notice">Teks Kotak Hijau Penegasan Pembayaran di Kartu Biaya</label>
              <textarea id="pmb_fee_notice" name="pmb_fee_notice" class="form-control" rows="2" required>{{ old('pmb_fee_notice', $pmb['pmb_fee_notice']) }}</textarea>
              <div class="form-hint">Penegasan bahwa SPI & UKT dibayarkan setelah pendaftar dinyatakan diterima/lolos.</div>
            </div>
          </div>

          <div style="margin-top: 10px;">
            <label class="form-label">Pilih Gelombang yang Diberikan Pita "Rekomendasi":</label>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
              @foreach($pmb['fees_list'] as $fee)
                <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
                  <input type="radio" name="recommended_fee_id" value="{{ $fee['id'] }}" {{ !empty($fee['is_recommended']) ? 'checked' : '' }} style="width: 18px; height: 18px;">
                  <span>{{ $fee['name'] }}</span>
                </label>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- Kartu Biaya 4 Gelombang -->
      <h4 style="font-size: 16px; font-weight: 700; color: var(--primary); margin-bottom: 14px;">
        <i class="fas fa-table" style="color: #0284c7; margin-right: 6px;"></i> Rincian Nominal Biaya per Gelombang
      </h4>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(460px, 1fr)); gap: 20px; margin-bottom: 24px;">
        @foreach($pmb['fees_list'] as $fee)
          @php $id = $fee['id']; @endphp
          <div class="card" style="border: 1px solid var(--border);">
            <div class="card-header" style="background: var(--primary); color: #fff; padding: 12px 18px; display: flex; justify-content: space-between; align-items: center;">
              <span style="font-size: 15px; font-weight: 700;">{{ $fee['name'] }}</span>
              <input type="hidden" name="fees[{{ $id }}][name]" value="{{ $fee['name'] }}">
              
              <div style="display: flex; align-items: center; gap: 8px;">
                <label style="font-size: 11px; margin: 0; color: #cbd5e1;">Badge:</label>
                <input type="text" name="fees[{{ $id }}][saving_badge]" value="{{ $fee['saving_badge'] ?? '' }}" placeholder="Misal: Hemat 50%" style="font-size: 11px; padding: 3px 8px; border-radius: 4px; border: 1px solid #fff; background: rgba(255,255,255,0.15); color: #fff; width: 100px;">
              </div>
            </div>

            <div class="card-body" style="padding: 18px;">
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <div class="form-group">
                  <label class="form-label" style="font-size: 12px;">Biaya Formulir Pendaftaran</label>
                  <input type="text" name="fees[{{ $id }}][form_fee]" class="form-control" value="{{ $fee['form_fee'] ?? 'Rp 300.000' }}" style="font-size: 13px;" required>
                </div>

                <div class="form-group">
                  <label class="form-label" style="font-size: 12px;">Total Biaya (Awal)</label>
                  <input type="text" name="fees[{{ $id }}][total_fee]" class="form-control" value="{{ $fee['total_fee'] ?? 'Rp 13.800.000' }}" style="font-size: 13px; font-weight: 700; color: #b91c1c;" required>
                </div>
              </div>

              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <div class="form-group">
                  <label class="form-label" style="font-size: 12px;">SPI Normal (Coret)</label>
                  <input type="text" name="fees[{{ $id }}][spi_original]" class="form-control" value="{{ $fee['spi_original'] ?? 'Rp 15.000.000' }}" style="font-size: 13px;" required>
                </div>

                <div class="form-group">
                  <label class="form-label" style="font-size: 12px;">SPI Beasiswa (Yang Dibayar)</label>
                  <input type="text" name="fees[{{ $id }}][spi_discounted]" class="form-control" value="{{ $fee['spi_discounted'] ?? 'Rp 7.500.000' }}" style="font-size: 13px; font-weight: 700;" required>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label" style="font-size: 12px;">Keterangan Periode Pembayaran SPI</label>
                <input type="text" name="fees[{{ $id }}][spi_note]" class="form-control" value="{{ $fee['spi_note'] ?? 'Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)' }}" style="font-size: 12.5px;" required>
              </div>

              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <div class="form-group">
                  <label class="form-label" style="font-size: 12px;">Biaya UKT per Semester</label>
                  <input type="text" name="fees[{{ $id }}][ukt_fee]" class="form-control" value="{{ $fee['ukt_fee'] ?? 'Rp 6.000.000' }}" style="font-size: 13px;" required>
                </div>

                <div class="form-group">
                  <label class="form-label" style="font-size: 12px;">Label Nominal di Grafik SPI</label>
                  <input type="text" name="fees[{{ $id }}][chart_value]" class="form-control" value="{{ $fee['chart_value'] ?? 'Rp 7,5 Jt' }}" style="font-size: 13px;" required>
                </div>
              </div>

              <div class="form-group" style="display: none;">
                <input type="hidden" name="fees[{{ $id }}][ukt_note]" value="{{ $fee['ukt_note'] ?? 'Dibayarkan setelah lolos seleksi (per Semester)' }}">
                <input type="hidden" name="fees[{{ $id }}][chart_height]" value="{{ $fee['chart_height'] ?? '60' }}">
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Pengaturan Grafik SPI -->
      <div class="card" style="margin-bottom: 24px;">
        <div class="card-header">
          <div class="card-title">
            <i class="fas fa-chart-simple" style="color: #2563eb; margin-right: 6px;"></i>
            Pengaturan Teks Diagram Grafik SPI
          </div>
        </div>
        <div class="card-body">
          <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 16px;">
            <div class="form-group">
              <label class="form-label" for="pmb_chart_title">Judul Grafik SPI</label>
              <input type="text" id="pmb_chart_title" name="pmb_chart_title" class="form-control" value="{{ old('pmb_chart_title', $pmb['pmb_chart_title']) }}" required>
            </div>

            <div class="form-group">
              <label class="form-label" for="pmb_chart_desc">Teks Keterangan di Bawah Judul Grafik</label>
              <input type="text" id="pmb_chart_desc" name="pmb_chart_desc" class="form-control" value="{{ old('pmb_chart_desc', $pmb['pmb_chart_desc']) }}" required>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary" style="padding: 12px 28px;">
        <i class="fas fa-save"></i> Simpan Biaya Perkuliahan & Grafik
      </button>
    </form>
  </div>

  <!-- =========================================================
       TAB 4: PERSYARATAN & CATATAN PENTING (NB)
       ========================================================= -->
  <div id="tab-persyaratan" class="pmb-tab-panel {{ request('tab') == 'tab-persyaratan' ? 'active' : '' }}">
    <div class="card" style="max-width: 900px;">
      <div class="card-header">
        <div class="card-title">
          <i class="fas fa-list-check" style="color: #2563eb; margin-right: 6px;"></i>
          Persyaratan Administrasi & Catatan Penting (NB)
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.pmb.persyaratan') }}">
          @csrf

          <div class="form-group">
            <label class="form-label" for="pmb_requirements">
              Daftar Persyaratan Administrasi
            </label>
            <textarea id="pmb_requirements" name="pmb_requirements" class="form-control" rows="8" required>{{ old('pmb_requirements', $pmb['pmb_requirements']) }}</textarea>
            <div class="form-hint">Tuliskan <strong>1 persyaratan per baris</strong>. Setiap baris otomatis menjadi checklist item bercentang pada website.</div>
          </div>

          <hr style="margin: 25px 0; border: 0; border-top: 1px solid var(--border);">

          <div class="form-group">
            <label class="form-label" for="pmb_notes">
              Poin Catatan Penting (NB Alert Box)
            </label>
            <textarea id="pmb_notes" name="pmb_notes" class="form-control" rows="8" required>{{ old('pmb_notes', $pmb['pmb_notes']) }}</textarea>
            <div class="form-hint">Tuliskan <strong>1 poin catatan per baris</strong>. Setiap baris otomatis diberi nomor urut di kotak peringatan resmi PMB.</div>
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Persyaratan & Catatan NB
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- =========================================================
       TAB 5: INFO TAMBAHAN & CTA
       ========================================================= -->
  <div id="tab-info" class="pmb-tab-panel {{ request('tab') == 'tab-info' ? 'active' : '' }}">
    <div class="card" style="max-width: 900px;">
      <div class="card-header">
        <div class="card-title">
          <i class="fas fa-circle-info" style="color: #2563eb; margin-right: 6px;"></i>
          Informasi Perkuliahan & Banner Penutup (Bottom CTA)
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.pmb.info') }}">
          @csrf

          <h4 style="font-size: 14.5px; font-weight: 700; color: var(--primary); margin-bottom: 14px;">
            <i class="fas fa-calendar-check" style="color: #059669; margin-right: 6px;"></i> Kotak Info 1: Awal Perkuliahan
          </h4>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
              <label class="form-label" for="pmb_class_start_date">Tanggal Awal Perkuliahan</label>
              <input type="text" id="pmb_class_start_date" name="pmb_class_start_date" class="form-control" value="{{ old('pmb_class_start_date', $pmb['pmb_class_start_date']) }}" required>
            </div>

            <div class="form-group">
              <label class="form-label" for="pmb_class_start_sub">Keterangan Semester / Periode</label>
              <input type="text" id="pmb_class_start_sub" name="pmb_class_start_sub" class="form-control" value="{{ old('pmb_class_start_sub', $pmb['pmb_class_start_sub']) }}" required>
            </div>
          </div>

          <h4 style="font-size: 14.5px; font-weight: 700; color: var(--primary); margin: 20px 0 14px;">
            <i class="fas fa-graduation-cap" style="color: #b45309; margin-right: 6px;"></i> Kotak Info 2: Program & Jenjang yang Terbuka
          </h4>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
              <label class="form-label" for="pmb_open_programs_title">Tingkat Jenjang Pendidikan</label>
              <input type="text" id="pmb_open_programs_title" name="pmb_open_programs_title" class="form-control" value="{{ old('pmb_open_programs_title', $pmb['pmb_open_programs_title']) }}" required>
            </div>

            <div class="form-group">
              <label class="form-label" for="pmb_open_programs_sub">Daftar Program Studi</label>
              <input type="text" id="pmb_open_programs_sub" name="pmb_open_programs_sub" class="form-control" value="{{ old('pmb_open_programs_sub', $pmb['pmb_open_programs_sub']) }}" required>
            </div>
          </div>

          <hr style="margin: 25px 0; border: 0; border-top: 1px solid var(--border);">

          <h4 style="font-size: 14.5px; font-weight: 700; color: var(--primary); margin-bottom: 14px;">
            <i class="fas fa-paper-plane" style="color: #2563eb; margin-right: 6px;"></i> Banner Penutup & Tombol Pendaftaran Bawah
          </h4>

          <div class="form-group">
            <label class="form-label" for="pmb_cta_title">Judul Banner Penutup</label>
            <input type="text" id="pmb_cta_title" name="pmb_cta_title" class="form-control" value="{{ old('pmb_cta_title', $pmb['pmb_cta_title']) }}" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="pmb_cta_desc">Deskripsi Banner Penutup</label>
            <textarea id="pmb_cta_desc" name="pmb_cta_desc" class="form-control" rows="3" required>{{ old('pmb_cta_desc', $pmb['pmb_cta_desc']) }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Info Tambahan & Banner Penutup
          </button>
        </form>
      </div>
    </div>
  </div>

</div>

<script>
  function switchPmbTab(event, tabId) {
    if (event) event.preventDefault();

    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelectorAll('.pmb-tab-panel').forEach(panel => panel.classList.remove('active'));

    const clickedBtn = event ? event.currentTarget : null;
    if (clickedBtn) clickedBtn.classList.add('active');

    const targetPanel = document.getElementById(tabId);
    if (targetPanel) targetPanel.classList.add('active');

    // Update URL query string without reloading
    const url = new URL(window.location);
    url.searchParams.set('tab', tabId);
    window.history.replaceState({}, '', url);
  }
</script>
@endsection
