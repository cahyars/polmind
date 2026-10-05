@extends('layouts.frontend')

@section('title', $article->title . ' | Politeknik Mitra Industri')
@section('meta_description', Str::limit(strip_tags($article->summary ?: $article->content), 155))
@section('canonical', url('/beranda/berita/' . $article->slug))
@section('og_image', $article->image_url)
@section('og_type', 'article')

@section('structured_data')
<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'NewsArticle',
  'headline' => $article->title,
  'image' => [
    $article->image_url,
  ],
  'datePublished' => $article->published_date ? \Carbon\Carbon::parse($article->published_date)->toIso8601String() : $article->created_at->toIso8601String(),
  'dateModified' => $article->updated_at->toIso8601String(),
  'author' => [[
    '@type' => 'Person',
    'name' => $article->author ?: 'Redaksi Polmind',
  ]],
  'publisher' => [
    '@type' => 'Organization',
    'name' => 'Politeknik Mitra Industri',
    'logo' => [
      '@type' => 'ImageObject',
      'url' => asset('assets/images/logo.png'),
    ],
  ],
  'description' => Str::limit(strip_tags($article->summary ?: $article->content), 160),
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@php
  $articleUrl = url('/beranda/berita/' . $article->slug);
  $shareTitle = $article->title;
  $waShareUrl = 'https://api.whatsapp.com/send?text=' . rawurlencode($shareTitle . "\n\n" . $articleUrl);
  $fbShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($articleUrl);
  $xShareUrl  = 'https://twitter.com/intent/tweet?text=' . rawurlencode($shareTitle) . '&url=' . rawurlencode($articleUrl);
@endphp

@section('content')
<div class="news-container" id="news-page-detail">
  <div class="top-bar">
    <a href="javascript:history.back()" class="back-button" data-translate="news-back">← Kembali</a>
    <div class="breadcrumb">
      <a href="/beranda" style="text-decoration: none;color: #102C53;" data-translate="home">Beranda</a> /
      <a href="/beranda/berita" style="text-decoration: none;color: #102C53;" data-translate="news">Berita</a>
    </div>
  </div>

  <h1 class="news-title" style="color: #102C53;font-size:28px; line-height: 1.35; margin: 15px 0;">
    {{ $article->title }}
  </h1>

  <div class="news-meta-bar">
    <div class="news-meta-info">
      <span><i class="fa-regular fa-user" style="color: #94a3b8; margin-right: 4px;"></i> {{ $article->author ?: 'Redaksi Polmind' }}</span>
      <span style="color: #cbd5e1;">•</span>
      <span><i class="fa-regular fa-calendar" style="color: #94a3b8; margin-right: 4px;"></i> {{ $article->formatted_date }}</span>
      @if($article->category)
        <span style="color: #cbd5e1;">•</span>
        <span class="news-meta-category">{{ $article->category }}</span>
      @endif
    </div>

    <div class="news-meta-share">
      <span class="news-meta-share-label"><i class="fa-solid fa-share-nodes"></i> Bagikan:</span>
      <a href="{{ $waShareUrl }}" target="_blank" rel="noopener noreferrer" class="mini-share-btn mini-share-btn--wa" title="Bagikan ke WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
      </a>
      <a href="{{ $fbShareUrl }}" target="_blank" rel="noopener noreferrer" class="mini-share-btn mini-share-btn--fb" title="Bagikan ke Facebook">
        <i class="fa-brands fa-facebook-f"></i>
      </a>
      <a href="{{ $xShareUrl }}" target="_blank" rel="noopener noreferrer" class="mini-share-btn mini-share-btn--x" title="Bagikan ke X (Twitter)">
        <i class="fa-brands fa-x-twitter"></i>
      </a>
      <button type="button" class="mini-share-btn mini-share-btn--copy" onclick="copyNewsLink(this, '{{ $articleUrl }}')" title="Salin Tautan">
        <i class="fa-solid fa-link"></i>
      </button>
    </div>
  </div>

  @if($article->image)
    <img src="{{ $article->image_url }}"
         alt="{{ $article->title }}"
         class="news-image"
         fetchpriority="high"
         decoding="async"
         style="max-height: 480px; width: 100%; object-fit: cover; border-radius: 8px; margin: 15px auto; display: block;" />
  @endif

  <div class="news-content lh2" style="font-size: 16px; color: #1e293b; line-height: 1.8; margin-top: 25px;">
    {!! $article->content !!}
  </div>

  <div class="news-source" style="margin-top: 30px; font-style: italic; color: #64748b; font-size: 14px;">
    Sumber: Media Polmind
  </div>

  <!-- Share Box Section -->
  <div class="news-share-box">
    <div class="news-share-heading">
      <div class="news-share-icon-wrap">
        <i class="fa-solid fa-share-nodes"></i>
      </div>
      <div>
        <h4 class="news-share-heading-title">Bagikan Berita Ini</h4>
        <p class="news-share-heading-sub">Bagikan artikel informatif ini ke rekan dan media sosial Anda</p>
      </div>
    </div>
    <div class="news-share-buttons">
      <a href="{{ $waShareUrl }}" target="_blank" rel="noopener noreferrer" class="share-btn share-btn--wa" title="Bagikan ke WhatsApp">
        <i class="fa-brands fa-whatsapp" style="font-size: 18px;"></i>
        <span>WhatsApp</span>
      </a>
      <a href="{{ $fbShareUrl }}" target="_blank" rel="noopener noreferrer" class="share-btn share-btn--fb" title="Bagikan ke Facebook">
        <i class="fa-brands fa-facebook-f" style="font-size: 17px;"></i>
        <span>Facebook</span>
      </a>
      <a href="{{ $xShareUrl }}" target="_blank" rel="noopener noreferrer" class="share-btn share-btn--x" title="Bagikan ke X (Twitter)">
        <i class="fa-brands fa-x-twitter" style="font-size: 17px;"></i>
        <span>X (Twitter)</span>
      </a>
      <button type="button" class="share-btn share-btn--copy" onclick="copyNewsLink(this, '{{ $articleUrl }}')" title="Salin Tautan Berita">
        <i class="fa-solid fa-link" style="font-size: 16px;"></i>
        <span class="copy-label">Salin Link</span>
      </button>
    </div>
  </div>

  @if($related->count() > 0)
    <hr style="margin: 40px 0 25px; border: 0; border-top: 1px solid #e2e8f0;">
    <h3 style="color: #102C53; margin-bottom: 20px; font-size: 20px;">Berita Lainnya</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 15px;">
      @foreach($related as $rel)
        <div class="news-card" style="border: 1px solid #e2e8f0;">
          <a href="/beranda/berita/{{ $rel->slug }}" style="text-decoration: none;">
            <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" style="height: 140px;" loading="lazy" decoding="async">
            <div class="news-content" style="color: #102C53; padding: 12px;">
              <div class="news-title" style="font-size: 14px; margin-bottom: 6px;">{{ Str::limit($rel->title, 55) }}</div>
              <div class="news-date" style="font-size: 12px;">{{ $rel->formatted_date }}</div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection

@push('scripts')
<script>
function copyNewsLink(btn, customUrl) {
  const urlToCopy = customUrl || window.location.href;
  
  if (navigator.clipboard && window.isSecureContext) {
    navigator.clipboard.writeText(urlToCopy).then(() => {
      showCopyFeedback();
    }).catch(() => {
      fallbackCopy(urlToCopy);
    });
  } else {
    fallbackCopy(urlToCopy);
  }
}

function fallbackCopy(text) {
  const textArea = document.createElement('textarea');
  textArea.value = text;
  textArea.style.position = 'fixed';
  textArea.style.left = '-999999px';
  document.body.appendChild(textArea);
  textArea.focus();
  textArea.select();
  try {
    document.execCommand('copy');
    showCopyFeedback();
  } catch (err) {
    prompt('Salin link berikut:', text);
  }
  document.body.removeChild(textArea);
}

function showCopyFeedback() {
  const allCopyBtns = document.querySelectorAll('.mini-share-btn--copy, .share-btn--copy');
  allCopyBtns.forEach(b => {
    b.classList.add('copied');
    const label = b.querySelector('.copy-label');
    const icon = b.querySelector('i');
    if (label) label.textContent = 'Link Disalin!';
    if (icon) icon.className = 'fa-solid fa-check';
  });

  showToastNotification('Tautan berita berhasil disalin ke clipboard!');

  setTimeout(() => {
    allCopyBtns.forEach(b => {
      b.classList.remove('copied');
      const label = b.querySelector('.copy-label');
      const icon = b.querySelector('i');
      if (label) label.textContent = 'Salin Link';
      if (icon) icon.className = 'fa-solid fa-link';
    });
  }, 2500);
}

function showToastNotification(message) {
  let toast = document.getElementById('news-toast');
  if (!toast) {
    toast = document.createElement('div');
    toast.id = 'news-toast';
    document.body.appendChild(toast);
  }
  toast.innerHTML = '<i class="fa-solid fa-circle-check" style="color:#22c55e; font-size:16px;"></i> ' + message;
  toast.classList.add('show');
  setTimeout(() => {
    toast.classList.remove('show');
  }, 2500);
}
</script>
@endpush
