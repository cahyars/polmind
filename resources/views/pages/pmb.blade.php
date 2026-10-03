@extends('layouts.frontend')

@section('title', 'PMB - Pendaftaran Mahasiswa Baru Politeknik Mitra Industri')
@section('canonical', 'https://polmind.ac.id/pmb')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pmb-redesign.css') }}?v={{ file_exists(public_path('assets/css/pmb-redesign.css')) ? filemtime(public_path('assets/css/pmb-redesign.css')) : '1.0' }}">
@endpush

@section('content')
<!-- =========================================================
     HERO SECTION
     ========================================================= -->
<section class="pmb-hero-wrapper">
  <div class="pmb-hero-card">
    <div class="pmb-hero-badge">
      <span class="pmb-badge-dot"></span>
      <span>{{ $pmb['pmb_hero_badge'] }}</span>
    </div>

    <h1 class="pmb-hero-title">
      {!! nl2br(e($pmb['pmb_hero_title'])) !!}
    </h1>

    <p class="pmb-hero-subtitle">
      {{ $pmb['pmb_hero_subtitle'] }}
    </p>

    <div class="pmb-hero-actions">
      <a href="{{ $pmb['pmb_register_url'] }}" target="_blank" class="pmb-btn-primary">
        <i class="fa-solid fa-arrow-pointer"></i> Daftar Sekarang
      </a>
      <a href="#jadwal-pmb" class="pmb-btn-secondary">
        <i class="fa-solid fa-calendar-days"></i> Selengkapnya
      </a>
    </div>
  </div>
</section>

<!-- =========================================================
     MAIN CONTENT
     ========================================================= -->
<div class="pmb-content-container" id="selengkapnya">
  <!-- Heading & Batch Filter Tabs -->
  <div class="pmb-header-section">
    <h2 class="pmb-main-title">
      {{ $pmb['pmb_page_title'] }}
    </h2>

    <p style="max-width: 860px; margin: 0 auto 25px; color: #475569; font-size: 15px; line-height: 1.7;">
      {{ $pmb['pmb_intro_text'] }}
    </p>

    <!-- Filter Tabs / Quick Jump -->
    <div class="pmb-batch-tabs">
      @foreach($pmb['batches_list'] as $batch)
        <a href="#gelombang-{{ $batch['id'] }}" class="pmb-tab-btn {{ !empty($batch['is_active']) ? 'active' : '' }}" onclick="activateBatchTab(event, 'gelombang-{{ $batch['id'] }}')">
          <span>{{ $batch['name'] }}</span>
          @if(!empty($batch['is_active']))
            <span class="pmb-tab-badge">Active</span>
          @endif
        </a>
      @endforeach
    </div>
  </div>

  <!-- =========================================================
       TIMELINE / JADWAL PMB (STEPPER CARDS)
       ========================================================= -->
  <div class="pmb-timeline-section" id="jadwal-pmb">
    @foreach($pmb['batches_list'] as $batch)
      <div class="pmb-batch-card {{ !empty($batch['is_active']) ? 'is-active' : '' }}" id="gelombang-{{ $batch['id'] }}">
        <div class="pmb-batch-header">
          <div class="pmb-batch-title-wrap">
            <h3 class="pmb-batch-title">{{ $batch['name'] }}</h3>
            @if(($batch['status'] ?? '') == 'buka')
              <span class="pmb-status-pill pmb-status-open">
                <span class="pmb-badge-dot"></span> BUKA
              </span>
            @elseif(($batch['status'] ?? '') == 'tutup')
              <span class="pmb-status-pill" style="background: #fee2e2; color: #b91c1c;">TUTUP</span>
            @else
              <span class="pmb-status-pill pmb-status-upcoming">Akan Datang</span>
            @endif
          </div>

          @if(!empty($batch['is_active']) || ($batch['status'] ?? '') == 'buka')
            <div class="pmb-batch-actions">
              <a href="{{ $pmb['pmb_register_url'] }}" target="_blank" class="pmb-btn-batch-apply">
                Daftar Sekarang
              </a>
            </div>
          @endif
        </div>

        @php
          $step = (int) ($batch['active_step'] ?? 0);
        @endphp
        <div class="pmb-stepper-track">
          <!-- Step 1: Pendaftaran -->
          <div class="pmb-step-item {{ $step > 1 ? 'is-completed' : ($step == 1 ? 'is-active-step' : '') }}">
            <div class="pmb-step-node">
              @if($step > 1) <i class="fa-solid fa-check"></i> @elseif($step == 1) <i class="fa-solid fa-pen-to-square"></i> @else 1 @endif
            </div>
            <div class="pmb-step-name" data-translate="schedule-registration">Pendaftaran</div>
            <div class="pmb-step-date">{{ $batch['date_reg'] }}</div>
          </div>

          <!-- Step 2: Ujian Seleksi -->
          <div class="pmb-step-item {{ $step > 2 ? 'is-completed' : ($step == 2 ? 'is-active-step' : '') }}">
            <div class="pmb-step-node">
              @if($step > 2) <i class="fa-solid fa-check"></i> @elseif($step == 2) <i class="fa-solid fa-pen-to-square"></i> @else 2 @endif
            </div>
            <div class="pmb-step-name" data-translate="schedule-test">Ujian Seleksi</div>
            <div class="pmb-step-date">{{ $batch['date_exam'] }}</div>
          </div>

          <!-- Step 3: Pengumuman -->
          <div class="pmb-step-item {{ $step > 3 ? 'is-completed' : ($step == 3 ? 'is-active-step' : '') }}">
            <div class="pmb-step-node">
              @if($step > 3) <i class="fa-solid fa-check"></i> @elseif($step == 3) <i class="fa-solid fa-bullhorn"></i> @else 3 @endif
            </div>
            <div class="pmb-step-name" data-translate="schedule-announcement">Pengumuman</div>
            <div class="pmb-step-date">{{ $batch['date_announcement'] }}</div>
          </div>

          <!-- Step 4: Daftar Ulang -->
          <div class="pmb-step-item {{ $step == 4 ? 'is-active-step' : '' }}">
            <div class="pmb-step-node">
              @if($step == 4) <i class="fa-solid fa-id-card"></i> @else 4 @endif
            </div>
            <div class="pmb-step-name" data-translate="schedule-rereg">Daftar Ulang</div>
            <div class="pmb-step-date">{{ $batch['date_rereg'] }}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <!-- =========================================================
       QUICK INFO (2 COLUMNS)
       ========================================================= -->
  <div class="pmb-quick-info-grid">
    <div class="pmb-info-card">
      <div class="pmb-info-icon-box">
        <i class="fa-solid fa-calendar-check"></i>
      </div>
      <div>
        <div class="pmb-info-meta-label" data-translate="pmb-quick-term-label">Awal Perkuliahan</div>
        <div class="pmb-info-meta-val">{{ $pmb['pmb_class_start_date'] }}</div>
        <div class="pmb-info-meta-sub">{{ $pmb['pmb_class_start_sub'] }}</div>
      </div>
    </div>

    <div class="pmb-info-card alt">
      <div class="pmb-info-icon-box">
        <i class="fa-solid fa-graduation-cap"></i>
      </div>
      <div>
        <div class="pmb-info-meta-label" data-translate="pmb-quick-prog-label">Program & Jalur Terbuka</div>
        <div class="pmb-info-meta-val">{{ $pmb['pmb_open_programs_title'] }}</div>
        <div class="pmb-info-meta-sub">{{ $pmb['pmb_open_programs_sub'] }}</div>
      </div>
    </div>
  </div>

  <!-- =========================================================
       PERSYARATAN ADMINISTRASI
       ========================================================= -->
  <div class="pmb-req-card">
    <div class="pmb-section-header">
      <i class="fa-solid fa-folder-open" style="color: #0b2a50; font-size: 24px;"></i>
      <h2 data-translate="pmb-req-title">Persyaratan Administrasi</h2>
    </div>

    <div class="pmb-req-grid">
      @foreach($pmb['requirements_list'] as $req)
        <div class="pmb-req-item">
          <div class="pmb-req-check"><i class="fa-solid fa-check"></i></div>
          <div class="pmb-req-text">{{ $req }}</div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- =========================================================
       BIAYA PERKULIAHAN SECTION
       ========================================================= -->
  <div class="pmb-fee-section" id="biaya-pmb">
    <div class="pmb-section-header">
      <i class="fa-solid fa-wallet" style="color: #0b2a50; font-size: 24px;"></i>
      <div>
        <h2 data-translate="pmb-fee-title">Biaya Perkuliahan</h2>
        <p style="font-size: 14px; color: #64748b; margin-top: 4px;">
          @if(!empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1')
            Informasi rincian biaya perkuliahan akan segera diperbarui setelah penetapan resmi oleh pimpinan institusi.
          @else
            {{ $pmb['pmb_fee_subtitle'] }}
          @endif
        </p>
      </div>
    </div>

    @if(!empty($pmb['pmb_fee_coming_soon']) && $pmb['pmb_fee_coming_soon'] == '1')
      <!-- COMING SOON SHOWCASE CARD -->
      <div class="pmb-cs-showcase">
        <div class="pmb-cs-icon-wrap">
          <i class="fa-solid fa-hourglass-half"></i>
        </div>

        <div class="pmb-cs-badge">
          <span class="pmb-badge-dot"></span>
          <span>{{ $pmb['pmb_fee_coming_soon_badge'] ?? 'Segera Diumumkan / Coming Soon' }}</span>
        </div>

        <h3 class="pmb-cs-title">
          {{ $pmb['pmb_fee_coming_soon_title'] ?? 'Informasi Biaya Perkuliahan Akan Segera Diumumkan' }}
        </h3>

        <p class="pmb-cs-desc">
          {{ $pmb['pmb_fee_coming_soon_desc'] ?? 'Rincian pembiayaan studi (SPI & UKT) untuk Tahun Akademik 2026/2027 saat ini sedang dalam proses penetapan oleh pimpinan institusi Politeknik Mitra Industri. Calon mahasiswa dipersilakan melakukan pendaftaran terlebih dahulu mengikuti jadwal gelombang yang telah dibuka.' }}
        </p>

        <!-- 3 Highlight Features -->
        <div class="pmb-cs-features-grid">
          <div class="pmb-cs-feature-card">
            <div class="pmb-cs-feature-icon blue">
              <i class="fa-solid fa-calendar-check"></i>
            </div>
            <div class="pmb-cs-feature-title">Jadwal Seleksi Tetap Buka</div>
            <p class="pmb-cs-feature-text">
              Pendaftaran mahasiswa baru tetap dibuka normal sesuai timeline gelombang pendaftaran yang aktif.
            </p>
          </div>

          <div class="pmb-cs-feature-card">
            <div class="pmb-cs-feature-icon green">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div class="pmb-cs-feature-title">Bayar Setelah Lolos</div>
            <p class="pmb-cs-feature-text">
              Biaya SPI dan UKT dibayarkan hanya setelah pendaftar dinyatakan resmi diterima sebagai mahasiswa baru.
            </p>
          </div>

          <div class="pmb-cs-feature-card">
            <div class="pmb-cs-feature-icon amber">
              <i class="fa-solid fa-gift"></i>
            </div>
            <div class="pmb-cs-feature-title">Beasiswa Keringanan Biaya</div>
            <p class="pmb-cs-feature-text">
              Tersedia program beasiswa keringanan biaya studi (SPI) khusus bagi pendaftar di gelombang awal.
            </p>
          </div>
        </div>

        <div class="pmb-cs-actions">
          <a href="#jadwal-pmb" class="pmb-cs-btn-schedule">
            <i class="fa-solid fa-calendar-days"></i> Lihat Jadwal Gelombang
          </a>
          @php
            $topWa = \App\Models\SiteSetting::get('contact_whatsapp', '6282113296897');
          @endphp
          <a href="https://wa.me/{{ $topWa }}?text=Halo%20Admin%20PMB%20Polmind,%20saya%20ingin%20menanyakan%20informasi%20pendaftaran%20dan%20biaya" target="_blank" class="pmb-cs-btn-contact">
            <i class="fa-brands fa-whatsapp"></i> Hubungi Panitia PMB
          </a>
        </div>
      </div>
    @else
      <!-- Grid 4 Fee Cards -->
      <div class="pmb-fee-grid">
        @foreach($pmb['fees_list'] as $fee)
          <div class="pmb-fee-card {{ !empty($fee['is_recommended']) ? 'featured' : '' }}">
            @if(!empty($fee['is_recommended']))
              <div class="pmb-ribbon-wrapper">
                <span class="pmb-ribbon" data-translate="pmb-recommended">Rekomendasi</span>
              </div>
            @endif

            <div class="pmb-fee-card-header">
              <div>
                <span>{{ $fee['name'] }}</span>
                @if(!empty($fee['saving_badge']))
                  <span class="pmb-badge-saving">{{ $fee['saving_badge'] }}</span>
                @endif
              </div>
            </div>

            <table class="pmb-fee-table">
              <thead>
                <tr>
                  <th data-translate="fee-desc">Nama Pembiayaan</th>
                  <th data-translate="amount">Nominal</th>
                  <th data-translate="period">Periode</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-translate="reg-fee">Biaya Formulir Pendaftaran</td>
                  <td>{{ $fee['form_fee'] }}</td>
                  <td data-translate="upon-registration">di awal pendaftaran</td>
                </tr>
                <tr>
                  <td>
                    <div data-translate="spi">SPI (Sumbangan Pengembangan Institusi)</div>
                  </td>
                  <td>
                    <div class="pmb-fee-original">{{ $fee['spi_original'] }}</div>
                    <div class="pmb-fee-discounted">{{ $fee['spi_discounted'] }}</div>
                  </td>
                  <td>{{ $fee['spi_note'] }}</td>
                </tr>
                <tr>
                  <td data-translate="ukt">UKT (Uang Kuliah Tunggal)</td>
                  <td>{{ $fee['ukt_fee'] }}</td>
                  <td>{{ $fee['ukt_note'] }}</td>
                </tr>
              </tbody>
            </table>

            <div class="pmb-fee-notice">
              <i class="fa-solid fa-circle-check"></i>
              <span>{{ $pmb['pmb_fee_notice'] }}</span>
            </div>

            <div class="pmb-fee-card-footer">
              <span class="pmb-fee-total-label" data-translate="pmb-total-fee">Total Biaya</span>
              <span class="pmb-fee-total-val" style="{{ !empty($fee['is_recommended']) ? 'color: #b91c1c;' : '' }}">{{ $fee['total_fee'] }}</span>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Grafik Perbandingan Biaya SPI (Bar Chart Component) -->
      <div class="pmb-chart-box">
        <div class="pmb-chart-title">
          <i class="fa-solid fa-chart-simple" style="color: #0b2a50;"></i>
          <span>{{ $pmb['pmb_chart_title'] }}</span>
        </div>
        <div class="pmb-chart-desc">
          {{ $pmb['pmb_chart_desc'] }}
        </div>

        <div class="pmb-bars-wrapper">
          @foreach($pmb['fees_list'] as $fee)
            <div class="pmb-bar-col {{ !empty($fee['is_recommended']) ? 'best' : '' }}">
              <div class="pmb-bar-val" style="{{ !empty($fee['is_recommended']) ? 'color: #b91c1c;' : '' }}">{{ $fee['chart_value'] }}</div>
              <div class="pmb-bar-fill" style="height: {{ $fee['chart_height'] }}%;"></div>
              <div class="pmb-bar-label">{{ $fee['name'] }}</div>
              @if(!empty($fee['is_recommended']))
                <span class="pmb-bar-badge" data-translate="pmb-most-affordable">Paling Hemat</span>
              @endif
            </div>
          @endforeach
        </div>
      </div>

      <!-- Alert Box / Catatan Penting -->
      <div class="pmb-alert-box">
        <div class="pmb-alert-header">
          <div class="pmb-alert-title">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <span>Catatan Penting (NB):</span>
          </div>
        </div>
        <ol class="pmb-alert-list">
          @foreach($pmb['notes_list'] as $note)
            <li>{{ $note }}</li>
          @endforeach
        </ol>
      </div>
    @endif
  </div>

  <!-- =========================================================
       BOTTOM CALL TO ACTION BANNER
       ========================================================= -->
  <div class="pmb-bottom-cta">
    <h3 class="pmb-cta-title">{{ $pmb['pmb_cta_title'] }}</h3>
    <p class="pmb-cta-desc">
      {{ $pmb['pmb_cta_desc'] }}
    </p>

    <div>
      <a href="{{ $pmb['pmb_register_url'] }}" target="_blank" class="pmb-cta-btn-main">
        <i class="fa-solid fa-graduation-cap"></i> DAFTAR POLMIND SEKARANG
      </a>
    </div>

    @php
      $topWa = \App\Models\SiteSetting::get('contact_whatsapp', '6282113296897');
      $topPhone = \App\Models\SiteSetting::get('contact_phone', '+62 821-1329-6897');
    @endphp
    <div class="pmb-wa-help">
      Jika ada pertanyaan, silakan hubungi admin kami melalui WhatsApp di <a href="https://wa.me/{{ $topWa }}" target="_blank"><i class="fa-brands fa-whatsapp"></i> {{ $topPhone }}</a>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function activateBatchTab(event, targetId) {
    if (event) event.preventDefault();
    
    // Update active tab buttons
    document.querySelectorAll('.pmb-tab-btn').forEach(btn => btn.classList.remove('active'));
    const clickedBtn = event ? event.currentTarget : null;
    if (clickedBtn) clickedBtn.classList.add('active');

    // Smooth scroll to target card with offset for fixed header
    const targetEl = document.getElementById(targetId);
    if (targetEl) {
      const headerOffset = 110;
      const elementPosition = targetEl.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });

      // Highlight target card temporarily
      targetEl.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
      targetEl.style.transform = 'scale(1.015)';
      setTimeout(() => {
        targetEl.style.transform = '';
      }, 700);
    }
  }
</script>
@endpush
