@extends('layouts.admin')

@section('title', 'Konten Website')
@section('page_title', 'Kelola Konten & Pengaturan Website')

@section('content')
<div style="display: flex; gap: 20px; flex-wrap: wrap;">
  <!-- Section Navigation Tabs -->
  <div style="width: 100%;">
    <div style="display: flex; gap: 10px; border-bottom: 2px solid var(--border); padding-bottom: 12px; margin-bottom: 24px; flex-wrap: wrap;">
      <button type="button" class="tab-btn active" onclick="openTab(event, 'tab-sambutan')">
        <i class="fas fa-user-tie"></i> Sambutan Direktur
      </button>
      <button type="button" class="tab-btn" onclick="openTab(event, 'tab-pmb')">
        <i class="fas fa-bullhorn"></i> Banner & Info PMB
      </button>
      <button type="button" class="tab-btn" onclick="openTab(event, 'tab-profil')">
        <i class="fas fa-landmark"></i> Profil & Visi Misi
      </button>
      <button type="button" class="tab-btn" onclick="openTab(event, 'tab-kontak')">
        <i class="fas fa-address-book"></i> Kontak & Informasi Umum
      </button>
    </div>
  </div>

  <style>
    .tab-btn {
      padding: 10px 18px;
      background: #f1f5f9;
      color: #475569;
      border: 1px solid var(--border);
      border-radius: 8px;
      font-size: 14px;
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
    .tab-content {
      display: none;
      width: 100%;
    }
    .tab-content.active {
      display: block;
    }
  </style>

  <!-- TAB 1: SAMBUTAN DIREKTUR -->
  <div id="tab-sambutan" class="tab-content active">
    <div class="card" style="max-width: 840px;">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-user-tie" style="color: #0284c7; margin-right: 6px;"></i> Pengaturan Sambutan Direktur di Beranda</div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.konten.sambutan') }}" enctype="multipart/form-data">
          @csrf

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
            <div class="form-group">
              <label class="form-label" for="director_name">Nama Direktur Beserta Gelar</label>
              <input type="text" id="director_name" name="director_name" class="form-control" value="{{ old('director_name', $settings['director_name'] ?? '') }}" required>
            </div>

            <div class="form-group">
              <label class="form-label" for="director_title">Jabatan</label>
              <input type="text" id="director_title" name="director_title" class="form-control" value="{{ old('director_title', $settings['director_title'] ?? '') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="director_photo">Foto Direktur</label>
            @if(!empty($settings['director_photo']))
              <div style="margin-bottom: 10px;">
                <img src="{{ asset($settings['director_photo']) }}" alt="Foto Direktur" style="height: 120px; border-radius: 8px; border: 1px solid var(--border);">
              </div>
            @endif
            <input type="file" id="director_photo" name="director_photo" class="form-control" accept="image/*">
            <div class="form-hint">Disarankan foto transparan PNG atau portrait rapi. Kosongkan bila tidak mengganti.</div>
          </div>

          <div class="form-group">
            <label class="form-label" for="director_message">Teks Sambutan Direktur</label>
            <textarea id="director_message" name="director_message" class="form-control" rows="6" required>{{ old('director_message', $settings['director_message'] ?? '') }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Sambutan Direktur
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- TAB 2: BANNER & PMB -->
  <div id="tab-pmb" class="tab-content">
    <div class="card" style="max-width: 840px;">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-bullhorn" style="color: #059669; margin-right: 6px;"></i> Pengaturan Informasi & Pendaftaran PMB</div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.konten.pmb') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label class="form-label" for="pmb_cta_text">Teks Tombol / Pengumuman Pendaftaran di Beranda</label>
            <input type="text" id="pmb_cta_text" name="pmb_cta_text" class="form-control" value="{{ old('pmb_cta_text', $settings['pmb_cta_text'] ?? '') }}" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="pmb_cta_link">Link Tujuan Pendaftaran</label>
            <input type="text" id="pmb_cta_link" name="pmb_cta_link" class="form-control" value="{{ old('pmb_cta_link', $settings['pmb_cta_link'] ?? '/pmb') }}" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="pmb_banner_image">Banner "Why Polmind" (Di atas teks pendaftaran)</label>
            @if(!empty($settings['pmb_banner_image']))
              <div style="margin-bottom: 10px;">
                <img src="{{ asset($settings['pmb_banner_image']) }}" alt="Banner Why Polmind" style="max-height: 100px; border-radius: 8px; border: 1px solid var(--border);">
              </div>
            @endif
            <input type="file" id="pmb_banner_image" name="pmb_banner_image" class="form-control" accept="image/*">
          </div>

          <hr style="margin: 25px 0; border: 0; border-top: 1px solid var(--border);">

          <div class="form-group">
            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 14px; font-weight: 700; color: #1e293b;">
              <input type="checkbox" name="pmb_popup_enabled" value="1" {{ ($settings['pmb_popup_enabled'] ?? '0') == '1' ? 'checked' : '' }} style="width: 18px; height: 18px;">
              Aktifkan Popup Promo PMB Saat Halaman Pertama Kali Dibuka
            </label>
          </div>

          <div class="form-group">
            <label class="form-label" for="pmb_popup_image">Gambar Flyer Popup PMB</label>
            @if(!empty($settings['pmb_popup_image']))
              <div style="margin-bottom: 10px;">
                <img src="{{ asset($settings['pmb_popup_image']) }}" alt="Popup PMB" style="max-height: 150px; border-radius: 8px; border: 1px solid var(--border);">
              </div>
            @endif
            <input type="file" id="pmb_popup_image" name="pmb_popup_image" class="form-control" accept="image/*">
            <div class="form-hint" style="margin-top: 6px; font-size: 12px; color: #64748b;">
              💡 <strong>Tips:</strong> Popup ini muncul otomatis saat pengunjung membuka website. Untuk langsung menguji atau melihat tampilannya, buka:
              <a href="{{ url('/beranda?popup=1') }}" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: underline;">
                Uji Tampilan Popup di Website ↗
              </a>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Pengaturan PMB
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- TAB 3: PROFIL & VISI MISI -->
  <div id="tab-profil" class="tab-content">
    <div class="card" style="max-width: 840px;">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-landmark" style="color: #7c3aed; margin-right: 6px;"></i> Pengaturan Visi, Misi & SK Pendirian Kampus</div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.konten.profil') }}">
          @csrf

          <div class="form-group">
            <label class="form-label" for="profil_decree">Teks Dasar Hukum / SK Pendirian</label>
            <input type="text" id="profil_decree" name="profil_decree" class="form-control" value="{{ old('profil_decree', $settings['profil_decree'] ?? '') }}" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="profil_vision">Visi Kampus</label>
            <textarea id="profil_vision" name="profil_vision" class="form-control" rows="3" required>{{ old('profil_vision', $settings['profil_vision'] ?? '') }}</textarea>
          </div>

          <div class="form-group">
            <label class="form-label" for="profil_missions">Poin-poin Misi Kampus</label>
            <textarea id="profil_missions" name="profil_missions" class="form-control" rows="6" required>{{ old('profil_missions', $settings['profil_missions'] ?? '') }}</textarea>
            <div class="form-hint">Tulis satu poin misi per baris (tekan Enter untuk poin berikutnya).</div>
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Visi & Misi
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- TAB 4: KONTAK & INFORMASI UMUM -->
  <div id="tab-kontak" class="tab-content">
    <div class="card" style="max-width: 840px;">
      <div class="card-header">
        <div class="card-title"><i class="fas fa-address-book" style="color: #ea580c; margin-right: 6px;"></i> Identitas Website, Kontak & Media Sosial</div>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.konten.general') }}">
          @csrf

          <div class="form-group">
            <label class="form-label" for="site_title">Nama / Judul Website (Header)</label>
            <input type="text" id="site_title" name="site_title" class="form-control" value="{{ old('site_title', $settings['site_title'] ?? 'POLITEKNIK MITRA INDUSTRI') }}" required>
          </div>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
            <div class="form-group">
              <label class="form-label" for="contact_email">Email Resmi Polmind</label>
              <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email'] ?? 'info@polmind.ac.id') }}" required>
            </div>

            <div class="form-group">
              <label class="form-label" for="contact_phone">Nomor Telepon</label>
              <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings['contact_phone'] ?? '+62 821-1329-6897') }}" required>
            </div>
          </div>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
            <div class="form-group">
              <label class="form-label" for="contact_whatsapp">Nomor WhatsApp (Angka saja dengan awalan kode negara)</label>
              <input type="text" id="contact_whatsapp" name="contact_whatsapp" class="form-control" value="{{ old('contact_whatsapp', $settings['contact_whatsapp'] ?? '6282113296897') }}" required placeholder="6282113296897">
              <div class="form-hint">Digunakan untuk tombol melayang WhatsApp dan tautan pesan langsung.</div>
            </div>

            <div class="form-group">
              <label class="form-label" for="contact_address">Alamat Singkat (Area)</label>
              <input type="text" id="contact_address" name="contact_address" class="form-control" value="{{ old('contact_address', $settings['contact_address'] ?? 'Kawasan Industri MM2100') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="gmaps_iframe">Kode Embed Google Maps (Iframe)</label>
            <textarea id="gmaps_iframe" name="gmaps_iframe" class="form-control" rows="3">{{ old('gmaps_iframe', $settings['gmaps_iframe'] ?? '') }}</textarea>
          </div>

          <div class="form-group">
            <label class="form-label" for="footer_copyright">Teks Hak Cipta di Footer</label>
            <input type="text" id="footer_copyright" name="footer_copyright" class="form-control" value="{{ old('footer_copyright', $settings['footer_copyright'] ?? '© 2025 Yayasan Mitra Global Mandiri') }}" required>
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Kontak & Pengaturan Umum
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function openTab(evt, tabName) {
    const contents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < contents.length; i++) {
      contents[i].classList.remove("active");
    }
    const buttons = document.getElementsByClassName("tab-btn");
    for (let i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove("active");
    }
    document.getElementById(tabName).classList.add("active");
    evt.currentTarget.classList.add("active");
  }

  // Handle hash in URL if direct link
  if (window.location.hash) {
    const hash = window.location.hash.substring(1);
    if (hash === 'sambutan') document.querySelector('[onclick*="tab-sambutan"]').click();
    if (hash === 'pmb') document.querySelector('[onclick*="tab-pmb"]').click();
    if (hash === 'profil') document.querySelector('[onclick*="tab-profil"]').click();
    if (hash === 'kontak') document.querySelector('[onclick*="tab-kontak"]').click();
  }
</script>
@endsection
