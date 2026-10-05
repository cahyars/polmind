@extends('layouts.admin')

@section('title', 'Tambah Berita Baru')
@section('page_title', 'Tulis Berita Baru')

@section('content')
<div class="card" style="max-width: 900px; margin: 0 auto;">
  <div class="card-header">
    <div class="card-title">Form Berita Baru</div>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-secondary">
      <i class="fas fa-arrow-left"></i> Kembali ke Daftar
    </a>
  </div>

  <div class="card-body">
    <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label class="form-label" for="title">Judul Berita <span style="color:#ef4444;">*</span></label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required placeholder="Masukkan judul berita lengkap...">
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
        <div class="form-group">
          <label class="form-label" for="slug">Slug URL (Opsional / Otomatis)</label>
          <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="judul-berita-otomatis">
          <div class="form-hint">Otomatis dibuat dari judul jika dikosongkan.</div>
        </div>

        <div class="form-group">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 7px;">
            <label class="form-label" for="category" style="margin-bottom: 0;">Kategori Berita <span style="color:#ef4444;">*</span></label>
            <button type="button" class="btn btn-sm btn-secondary" onclick="toggleNewCategoryBox()" style="padding: 3px 8px; font-size: 11px; background: #e0e7ff; color: #3730a3; border: none;">
              <i class="fas fa-plus"></i> Kategori Baru
            </button>
          </div>

          <select id="category" name="category" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $cat)
              <option value="{{ $cat->slug }}" {{ old('category', 'umum') == $cat->slug ? 'selected' : '' }}>
                {{ $cat->name }}
              </option>
            @endforeach
          </select>

          <!-- Inline Box Tambah Kategori Baru -->
          <div id="newCategoryBox" style="display: none; margin-top: 10px; background: #f8fafc; border: 1px dashed #93c5fd; padding: 12px; border-radius: 8px;">
            <label class="form-label" style="font-size: 12px; color: #1e40af;">Buat & Pilih Kategori Baru:</label>
            <div style="display: flex; gap: 8px;">
              <input type="text" id="quickCategoryInput" name="new_category_name" class="form-control" placeholder="Nama kategori baru..." style="padding: 7px 10px; font-size: 13px;">
              <button type="button" class="btn btn-sm btn-primary" onclick="submitQuickCategory()" style="white-space: nowrap; padding: 7px 12px;">
                <i class="fas fa-check"></i> Tambahkan
              </button>
            </div>
            <div id="quickCatStatus" style="font-size: 11px; margin-top: 5px;"></div>
          </div>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
        <div class="form-group">
          <label class="form-label" for="author">Penulis / Administrator <span style="color:#ef4444;">*</span></label>
          <input type="text" id="author" name="author" class="form-control" value="{{ old('author', 'Administrator') }}" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="published_date">Tanggal Publikasi <span style="color:#ef4444;">*</span></label>
          <input type="date" id="published_date" name="published_date" class="form-control" value="{{ old('published_date', date('Y-m-d')) }}" required>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label" for="image">Gambar Utama Berita</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*" onchange="previewImage(this)">
        <div class="form-hint">Format yang didukung: JPG, PNG, WEBP. Maksimal 3MB.</div>

        <div id="imagePreviewContainer" style="display: none; margin-top: 12px;">
          <img id="imagePreview" src="" alt="Pratinjau Gambar" style="max-height: 200px; border-radius: 8px; border: 1px solid var(--border);">
        </div>
      </div>

      <div class="form-group">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px; flex-wrap: wrap; gap: 8px;">
          <label class="form-label" for="summary" style="margin-bottom: 0;">
            Ringkasan Singkat (Lead / Excerpt)
          </label>
          <div style="display: flex; align-items: center; gap: 8px;">
            <span style="font-size: 11.5px; color: #2563eb; background: #eff6ff; padding: 2px 8px; border-radius: 4px; font-weight: 600; border: 1px solid #dbeafe;">
              <i class="fas fa-magic"></i> Otomatis dari Paragraf Pertama
            </span>
            <button type="button" class="btn btn-sm btn-secondary" onclick="autoExtractSummary(true)" style="font-size: 11px; padding: 2px 8px;" title="Ambil ulang teks dari paragraf pertama isi berita">
              <i class="fas fa-arrows-rotate"></i> Sinkronkan
            </button>
          </div>
        </div>
        <textarea id="summary" name="summary" class="form-control" rows="3" placeholder="Ringkasan otomatis terisi dari potongan paragraf pertama isi berita...">{{ old('summary') }}</textarea>
        <div class="form-hint">Otomatis terisi dari potongan paragraf pertama isi berita lengkap di bawah (bisa Anda edit jika diinginkan, atau biarkan terisi otomatis).</div>
      </div>

      <div class="form-group">
        <label class="form-label" for="content">Isi Berita Lengkap <span style="color:#ef4444;">*</span></label>
        <!-- Editor Toolbar -->
        <div style="background: #f1f5f9; border: 1px solid var(--border); border-bottom: none; border-radius: 8px 8px 0 0; padding: 6px 10px; display: flex; gap: 6px; flex-wrap: wrap; align-items: center;">
          <button type="button" class="btn btn-sm btn-secondary" onclick="insertTag('b')" title="Tebal (Bold)"><i class="fas fa-bold"></i></button>
          <button type="button" class="btn btn-sm btn-secondary" onclick="insertTag('i')" title="Miring (Italic)"><i class="fas fa-italic"></i></button>
          <button type="button" class="btn btn-sm btn-secondary" onclick="insertHeading()" title="Sub-Judul (H3)"><i class="fas fa-heading"></i></button>
          <button type="button" class="btn btn-sm btn-secondary" onclick="insertParagraph()" title="Paragraf Baru (&lt;p&gt;)"><i class="fas fa-paragraph"></i></button>
          <button type="button" class="btn btn-sm btn-secondary" onclick="insertList()" title="Daftar (List)"><i class="fas fa-list-ul"></i></button>
          <button type="button" class="btn btn-sm btn-secondary" onclick="insertQuote()" title="Kutipan (Quote)"><i class="fas fa-quote-left"></i></button>
          <div style="margin-left: auto;">
            <button type="button" class="btn btn-sm" onclick="autoFormatEditor()" style="font-weight: 600; color: #1d4ed8; background: #eff6ff; border: 1px solid #bfdbfe; display: flex; align-items: center; gap: 6px;" title="Rapikan teks menjadi format paragraf dan daftar poin otomatis">
              <i class="fas fa-wand-magic-sparkles"></i> Rapikan Format Paragraf & Bullets
            </button>
          </div>
        </div>
        <textarea id="content" name="content" class="form-control" rows="12" style="border-radius: 0 0 8px 8px; font-family: monospace; font-size: 14px; line-height: 1.6;" required placeholder="Ketik atau paste isi berita di sini...">{{ old('content') }}</textarea>
        <div class="form-hint" style="margin-top: 6px; font-size: 12px; color: #64748b;">
          💡 <strong>Tips Penulisan:</strong> Tekan <em>Enter 2x</em> untuk memisahkan antar paragraf. Beri tanda hubung (<code>- </code>) di awal baris untuk daftar poin, atau klik tombol <strong style="color: #2563eb;">"Rapikan Format Paragraf & Bullets"</strong> di atas.
        </div>
      </div>

      <div class="form-group" style="margin-top: 10px;">
        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 14px; font-weight: 600;">
          <input type="checkbox" name="is_published" value="1" {{ old('is_published', '1') ? 'checked' : '' }} style="width: 18px; height: 18px;">
          Langsung Publikasikan Berita
        </label>
      </div>

      <div style="margin-top: 30px; display: flex; gap: 12px;">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save"></i> Simpan Berita
        </button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
          Batal
        </a>
      </div>
    </form>
  </div>
</div>

<script>
  // Auto slug generator
  const titleInput = document.getElementById('title');
  const slugInput = document.getElementById('slug');

  titleInput.addEventListener('input', function() {
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

  // Toggle inline new category box
  function toggleNewCategoryBox() {
    const box = document.getElementById('newCategoryBox');
    box.style.display = box.style.display === 'none' ? 'block' : 'none';
    if (box.style.display === 'block') {
      document.getElementById('quickCategoryInput').focus();
    }
  }

  // Quick category AJAX creator
  function submitQuickCategory() {
    const input = document.getElementById('quickCategoryInput');
    const name = input.value.trim();
    const status = document.getElementById('quickCatStatus');

    if (!name) {
      status.style.color = '#ef4444';
      status.textContent = 'Harap masukkan nama kategori.';
      return;
    }

    status.style.color = '#3b82f6';
    status.textContent = 'Menyimpan kategori...';

    fetch('{{ route("admin.kategori.store") }}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ name: name })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success && data.category) {
        // Add option to select
        const select = document.getElementById('category');
        const opt = document.createElement('option');
        opt.value = data.category.slug;
        opt.textContent = data.category.name;
        opt.selected = true;
        select.appendChild(opt);

        status.style.color = '#10b981';
        status.innerHTML = `<i class="fas fa-check"></i> Kategori "${data.category.name}" berhasil dibuat & dipilih!`;
        input.value = '';
        setTimeout(() => {
          document.getElementById('newCategoryBox').style.display = 'none';
          status.textContent = '';
        }, 1500);
      } else {
        status.style.color = '#ef4444';
        status.textContent = data.message || 'Gagal menambahkan kategori.';
      }
    })
    .catch(err => {
      status.style.color = '#ef4444';
      status.textContent = 'Terjadi kesalahan jaringan atau validasi.';
    });
  }

  // Image preview
  function previewImage(input) {
    const previewContainer = document.getElementById('imagePreviewContainer');
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        previewContainer.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Auto extract summary from first paragraph of content
  const contentInput = document.getElementById('content');
  const summaryInput = document.getElementById('summary');

  function extractFirstParagraph(text) {
    if (!text) return '';

    // Check for <p>...</p> tag
    const pMatch = text.match(/<p[^>]*>([\s\S]*?)<\/p>/i);
    let pText = '';
    if (pMatch && pMatch[1]) {
      const temp = document.createElement('div');
      temp.innerHTML = pMatch[1];
      pText = (temp.textContent || temp.innerText || '').trim();
    }

    if (!pText) {
      // Split by double linebreaks or newlines
      const clean = text.replace(/<[^>]*>/g, ' ');
      const paras = clean.split(/\n\s*\n/);
      for (let p of paras) {
        const trimmed = p.trim().replace(/\s+/g, ' ');
        if (trimmed) {
          pText = trimmed;
          break;
        }
      }
    }

    if (!pText) {
      pText = text.replace(/<[^>]*>/g, ' ').trim().replace(/\s+/g, ' ');
    }

    pText = pText.replace(/\s+/g, ' ');
    if (pText.length > 200) {
      return pText.substring(0, 197).trim() + '...';
    }
    return pText;
  }

  function autoExtractSummary(force = false) {
    const extracted = extractFirstParagraph(contentInput.value);
    if (extracted && (force || !summaryInput.dataset.manual || summaryInput.value.trim() === '')) {
      summaryInput.value = extracted;
    }
  }

  contentInput.addEventListener('input', function() {
    if (!summaryInput.dataset.manual || summaryInput.value.trim() === '') {
      autoExtractSummary(false);
    }
  });

  contentInput.addEventListener('paste', function() {
    setTimeout(() => {
      if (!summaryInput.dataset.manual || summaryInput.value.trim() === '') {
        autoExtractSummary(false);
      }
    }, 50);
  });

  summaryInput.addEventListener('input', function() {
    if (this.value.trim() !== '') {
      this.dataset.manual = 'true';
    } else {
      delete this.dataset.manual;
      autoExtractSummary(false);
    }
  });

  // Quick formatting helpers
  function insertTag(tag) {
    const textarea = document.getElementById('content');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value.substring(start, end);
    const replacement = `<${tag}>${text}</${tag}>`;
    textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
    textarea.dispatchEvent(new Event('input'));
  }

  function insertHeading() {
    const textarea = document.getElementById('content');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value.substring(start, end) || 'Sub Judul';
    const replacement = `\n<h3>${text}</h3>\n`;
    textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
    textarea.dispatchEvent(new Event('input'));
  }

  function insertParagraph() {
    const textarea = document.getElementById('content');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value.substring(start, end) || 'Teks paragraf...';
    const replacement = `\n<p>\n  ${text}\n</p>\n`;
    textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
    textarea.dispatchEvent(new Event('input'));
  }

  function insertList() {
    const textarea = document.getElementById('content');
    const replacement = `\n<ul>\n  <li>Poin pertama</li>\n  <li>Poin kedua</li>\n</ul>\n`;
    textarea.value += replacement;
    textarea.dispatchEvent(new Event('input'));
  }

  function insertQuote() {
    const textarea = document.getElementById('content');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value.substring(start, end) || 'Kutipan pernyataan...';
    const replacement = `\n<blockquote>${text}</blockquote>\n`;
    textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
    textarea.dispatchEvent(new Event('input'));
  }

  function autoFormatEditor() {
    const textarea = document.getElementById('content');
    let text = textarea.value.trim();
    if (!text) {
      alert('Tulis atau paste isi berita terlebih dahulu.');
      return;
    }

    const normalized = text.replace(/\r\n/g, '\n').replace(/\r/g, '\n');
    const blocks = normalized.split(/\n\s*\n/);
    const result = [];
    let currentList = [];

    for (let block of blocks) {
      block = block.trim();
      if (!block) continue;

      if (/^<(p|ul|ol|table|blockquote|h[1-6]|div)\b/i.test(block)) {
        if (currentList.length > 0) {
          result.push('<ul class="news-bullet-list">\n' + currentList.join('\n') + '\n</ul>');
          currentList = [];
        }
        result.push(block);
        continue;
      }

      const lines = block.split('\n').map(l => l.trim()).filter(Boolean);
      const isBulletBlock = lines.length > 0 && lines.every(l => /^([-*•]|\d+[\.)])\s+/.test(l));

      if (isBulletBlock) {
        for (let line of lines) {
          let cleaned = line.replace(/^([-*•]|\d+[\.)])\s+/, '');
          let colonMatch = cleaned.match(/^([^:]{2,80}):\s*(.*)$/);
          if (colonMatch) {
            cleaned = `<strong>${colonMatch[1]}:</strong> ${colonMatch[2]}`;
          }
          currentList.push(`  <li>${cleaned}</li>`);
        }
      } else {
        if (currentList.length > 0) {
          result.push('<ul class="news-bullet-list">\n' + currentList.join('\n') + '\n</ul>');
          currentList = [];
        }

        let colonMatch = block.match(/^([^:\n]{3,65}):\s*([\s\S]+)$/);
        if (colonMatch) {
          result.push(`<p><strong>${colonMatch[1]}:</strong> ${colonMatch[2].replace(/\n/g, '<br>')}</p>`);
        } else {
          result.push(`<p>${block.replace(/\n/g, '<br>')}</p>`);
        }
      }
    }

    if (currentList.length > 0) {
      result.push('<ul class="news-bullet-list">\n' + currentList.join('\n') + '\n</ul>');
    }

    textarea.value = result.join('\n\n');
    textarea.dispatchEvent(new Event('input'));
    autoExtractSummary(true);
  }
</script>
@endsection
