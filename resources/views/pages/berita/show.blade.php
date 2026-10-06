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

@push('styles')
<style>
/* ========================================================
   PAGE TOP SPACING (Mencegah tertutup / mepet oleh navbar fixed)
   ======================================================== */
#news-page-detail {
  margin-top: 170px !important;
  margin-bottom: 60px !important;
}

@media (max-width: 991px) {
  #news-page-detail {
    margin-top: 155px !important;
    margin-bottom: 50px !important;
  }
}

@media (max-width: 767px) {
  #news-page-detail {
    margin-top: 135px !important;
    margin-bottom: 40px !important;
  }
}

@media (max-width: 480px) {
  #news-page-detail {
    margin-top: 125px !important;
  }
}

.top-bar {
  display: flex !important;
  justify-content: space-between !important;
  align-items: center !important;
  flex-wrap: wrap !important;
  gap: 12px !important;
  margin-bottom: 1.5rem !important;
  margin-top: 0 !important;
}

/* ========================================================
   EMBEDDED NEWS SHARE STYLES (IMMUNE TO CACHE ISSUES)
   ======================================================== */
.news-meta-bar {
  display: flex !important;
  justify-content: space-between !important;
  align-items: center !important;
  flex-wrap: wrap !important;
  gap: 12px !important;
  margin: 15px 0 20px !important;
  padding-bottom: 14px !important;
  border-bottom: 1px solid #e2e8f0 !important;
}

.news-meta-info {
  color: #64748b !important;
  font-size: 14px !important;
  display: flex !important;
  align-items: center !important;
  flex-wrap: wrap !important;
  gap: 8px !important;
}

.news-meta-category {
  text-transform: capitalize !important;
  background: #e0e7ff !important;
  color: #3730a3 !important;
  padding: 3px 10px !important;
  border-radius: 9999px !important;
  font-size: 12px !important;
  font-weight: 600 !important;
}

.news-meta-share {
  display: flex !important;
  align-items: center !important;
  gap: 8px !important;
}

.news-meta-share-label {
  font-size: 13px !important;
  font-weight: 600 !important;
  color: #64748b !important;
  display: flex !important;
  align-items: center !important;
  gap: 5px !important;
}

.mini-share-btn {
  width: 36px !important;
  height: 36px !important;
  border-radius: 50% !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  text-decoration: none !important;
  border: none !important;
  cursor: pointer !important;
  transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
  color: #ffffff !important;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important;
  padding: 0 !important;
  outline: none !important;
}

.mini-share-btn svg {
  display: block !important;
  transition: transform 0.2s ease !important;
}

.mini-share-btn:hover {
  transform: translateY(-2px) scale(1.05) !important;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.18) !important;
}

.mini-share-btn--wa { background: #25D366 !important; }
.mini-share-btn--fb { background: #1877F2 !important; }
.mini-share-btn--x  { background: #000000 !important; }
.mini-share-btn--copy { background: #102C53 !important; }

.mini-share-btn.copied {
  background: #10b981 !important;
}

/* ========================================================
   FULL SHARE CARD AT ARTICLE BOTTOM
   ======================================================== */
.news-share-box {
  margin: 35px 0 25px !important;
  padding: 24px 28px !important;
  background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%) !important;
  border: 1px solid #e2e8f0 !important;
  border-radius: 16px !important;
  box-shadow: 0 10px 25px -5px rgba(16, 44, 83, 0.05), 0 4px 6px -2px rgba(16, 44, 83, 0.02) !important;
}

.news-share-heading {
  display: flex !important;
  align-items: center !important;
  gap: 14px !important;
  margin-bottom: 18px !important;
}

.news-share-icon-wrap {
  width: 44px !important;
  height: 44px !important;
  border-radius: 12px !important;
  background: linear-gradient(135deg, #102C53 0%, #1e3a8a 100%) !important;
  color: #ffffff !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  flex-shrink: 0 !important;
  box-shadow: 0 4px 10px rgba(16, 44, 83, 0.25) !important;
}

.news-share-heading-title {
  margin: 0 !important;
  font-size: 17px !important;
  font-weight: 700 !important;
  color: #102C53 !important;
}

.news-share-heading-sub {
  margin: 3px 0 0 !important;
  font-size: 13.5px !important;
  color: #64748b !important;
}

.news-share-buttons {
  display: flex !important;
  flex-wrap: wrap !important;
  gap: 12px !important;
}

.share-btn {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 10px !important;
  padding: 11px 20px !important;
  border-radius: 10px !important;
  font-size: 14px !important;
  font-weight: 600 !important;
  text-decoration: none !important;
  border: none !important;
  cursor: pointer !important;
  transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
  color: #ffffff !important;
  min-height: 44px !important;
  outline: none !important;
}

.share-btn svg {
  display: block !important;
  flex-shrink: 0 !important;
}

.share-btn:hover {
  transform: translateY(-2px) !important;
  color: #ffffff !important;
  text-decoration: none !important;
}

.share-btn--wa {
  background: #25D366 !important;
  box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3) !important;
}
.share-btn--wa:hover {
  background: #20bd5a !important;
  box-shadow: 0 8px 18px rgba(37, 211, 102, 0.45) !important;
}

.share-btn--fb {
  background: #1877F2 !important;
  box-shadow: 0 4px 12px rgba(24, 119, 242, 0.3) !important;
}
.share-btn--fb:hover {
  background: #1465d6 !important;
  box-shadow: 0 8px 18px rgba(24, 119, 242, 0.45) !important;
}

.share-btn--x {
  background: #000000 !important;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
}
.share-btn--x:hover {
  background: #1a1a1a !important;
  box-shadow: 0 8px 18px rgba(0, 0, 0, 0.45) !important;
}

.share-btn--copy {
  background: #102C53 !important;
  box-shadow: 0 4px 12px rgba(16, 44, 83, 0.3) !important;
}
.share-btn--copy:hover {
  background: #0b203c !important;
  box-shadow: 0 8px 18px rgba(16, 44, 83, 0.45) !important;
}

.share-btn.copied {
  background: #10b981 !important;
  box-shadow: 0 4px 14px rgba(16, 185, 129, 0.4) !important;
}

/* ========================================================
   FLOATING TOAST
   ======================================================== */
#news-toast {
  position: fixed !important;
  bottom: 28px !important;
  left: 50% !important;
  transform: translateX(-50%) translateY(120px) !important;
  background: #0f172a !important;
  color: #ffffff !important;
  padding: 12px 24px !important;
  border-radius: 9999px !important;
  font-size: 14px !important;
  font-weight: 500 !important;
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.35) !important;
  z-index: 999999 !important;
  opacity: 0 !important;
  transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
  pointer-events: none !important;
  display: flex !important;
  align-items: center !important;
  gap: 10px !important;
  border: 1px solid rgba(255, 255, 255, 0.1) !important;
}

#news-toast.show {
  transform: translateX(-50%) translateY(0) !important;
  opacity: 1 !important;
}

/* ========================================================
   NEWS HERO IMAGE & CONTENT FORMATTING
   ======================================================== */
.news-image-wrapper {
  position: relative !important;
  width: 100% !important;
  min-height: 260px !important;
  max-height: 640px !important;
  overflow: hidden !important;
  border-radius: 14px !important;
  margin: 20px auto 28px !important;
  background: #0b1329 !important;
  box-shadow: 0 10px 30px -10px rgba(16, 44, 83, 0.16) !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
}

.news-image-backdrop {
  position: absolute !important;
  inset: -25px !important;
  background-size: cover !important;
  background-position: center !important;
  filter: blur(28px) brightness(0.55) saturate(1.2) !important;
  opacity: 0.75 !important;
  transform: scale(1.08) !important;
  pointer-events: none !important;
}

.news-image-wrapper img.news-image {
  position: relative !important;
  z-index: 2 !important;
  max-width: 100% !important;
  max-height: 640px !important;
  width: auto !important;
  height: auto !important;
  object-fit: contain !important;
  display: block !important;
  margin: 0 auto !important;
  box-shadow: 0 6px 25px rgba(0, 0, 0, 0.25) !important;
  border-radius: 8px !important;
}

.news-content {
  font-size: 16.5px !important;
  color: #1e293b !important;
  line-height: 1.85 !important;
  margin-top: 25px !important;
}

.news-content p {
  margin-bottom: 22px !important;
  line-height: 1.85 !important;
  font-size: 16.5px !important;
  color: #1e293b !important;
}

.news-content ul,
.news-content .news-bullet-list {
  margin: 16px 0 24px 28px !important;
  padding-left: 8px !important;
  display: flex !important;
  flex-direction: column !important;
  gap: 12px !important;
  list-style-type: disc !important;
}

.news-content ul li,
.news-content .news-bullet-list li {
  font-size: 16px !important;
  line-height: 1.75 !important;
  color: #1e293b !important;
  padding-left: 4px !important;
}

.news-content ol {
  margin: 16px 0 24px 28px !important;
  padding-left: 8px !important;
  display: flex !important;
  flex-direction: column !important;
  gap: 12px !important;
  list-style-type: decimal !important;
}

.news-content ol li {
  font-size: 16px !important;
  line-height: 1.75 !important;
  color: #1e293b !important;
}

.news-content strong,
.news-content b {
  color: #102C53 !important;
  font-weight: 700 !important;
}

@media (max-width: 640px) {
  .news-meta-bar {
    flex-direction: column !important;
    align-items: flex-start !important;
    gap: 12px !important;
  }

  .news-image-wrapper {
    min-height: 220px !important;
    max-height: 480px !important;
  }

  .news-image-wrapper img.news-image {
    max-height: 480px !important;
  }

  .news-share-box {
    padding: 18px 16px !important;
  }

  .news-share-buttons {
    display: grid !important;
    grid-template-columns: 1fr 1fr !important;
    gap: 10px !important;
    width: 100% !important;
  }

  .share-btn {
    width: 100% !important;
    padding: 10px 8px !important;
    font-size: 13px !important;
    gap: 6px !important;
  }
}
</style>
@endpush

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

  <!-- Meta Info & Top Quick Share Bar -->
  <div class="news-meta-bar">
    <div class="news-meta-info">
      <span>
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 4px; color: #94a3b8;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        {{ $article->author ?: 'Redaksi Polmind' }}
      </span>
      <span style="color: #cbd5e1;">•</span>
      <span>
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 4px; color: #94a3b8;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        {{ $article->formatted_date }}
      </span>
      @if($article->category)
        <span style="color: #cbd5e1;">•</span>
        <span class="news-meta-category">{{ $article->category }}</span>
      @endif
    </div>

    <!-- Quick Mini Share Buttons -->
    <div class="news-meta-share">
      <span class="news-meta-share-label">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
        Bagikan:
      </span>
      <!-- WhatsApp Mini -->
      <a href="{{ $waShareUrl }}" target="_blank" rel="noopener noreferrer" class="mini-share-btn mini-share-btn--wa" title="Bagikan ke WhatsApp" aria-label="Bagikan ke WhatsApp">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.074-1.112-.059-.413-.133-1.077-.384-1.924-.764-1.226-.549-2.072-1.748-2.133-1.83-.061-.082-.497-.661-.497-1.261 0-.6.313-.896.425-1.018.112-.122.244-.153.326-.153.082 0 .163.002.234.006.074.004.174-.028.272.207.102.244.347.848.378.91.031.061.051.133.01.214-.041.082-.061.133-.122.204-.061.071-.129.159-.184.214-.061.061-.125.127-.054.249.071.122.316.522.678.845.466.415.859.544.981.605.122.061.194.051.265-.031.071-.082.306-.356.388-.478.082-.122.163-.102.275-.061.112.041.714.337.837.398.122.061.204.092.235.143.03.051.03.296-.114.701zM12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2.05 22l4.984-1.307C8.47 21.56 10.177 22 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18c-1.63 0-3.15-.49-4.42-1.33l-.32-.21-2.96.78.79-2.88-.23-.35A7.95 7.95 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/></svg>
      </a>
      <!-- Facebook Mini -->
      <a href="{{ $fbShareUrl }}" target="_blank" rel="noopener noreferrer" class="mini-share-btn mini-share-btn--fb" title="Bagikan ke Facebook" aria-label="Bagikan ke Facebook">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
      </a>
      <!-- X Mini -->
      <a href="{{ $xShareUrl }}" target="_blank" rel="noopener noreferrer" class="mini-share-btn mini-share-btn--x" title="Bagikan ke X (Twitter)" aria-label="Bagikan ke X">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
      </a>
      <!-- Copy Mini -->
      <button type="button" class="mini-share-btn mini-share-btn--copy" onclick="copyNewsLink(this, '{{ $articleUrl }}')" title="Salin Link Berita" aria-label="Salin Link">
        <svg class="icon-link" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
        <svg class="icon-check" style="display:none;" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
      </button>
    </div>
  </div>

  @if($article->image)
    <div class="news-image-wrapper">
      <div class="news-image-backdrop" style="background-image: url('{{ $article->image_url }}');"></div>
      <img src="{{ $article->image_url }}"
           alt="{{ $article->title }}"
           class="news-image"
           fetchpriority="high"
           decoding="async" />
    </div>
  @endif

  <div class="news-content" style="font-size: 16.5px; color: #1e293b; line-height: 1.85; margin-top: 25px;">
    {!! $article->formatted_content !!}
  </div>

  <div class="news-source" style="margin-top: 30px; font-style: italic; color: #64748b; font-size: 14px;">
    Sumber: Media Polmind
  </div>

  <!-- Dedicated Share Box at Bottom -->
  <div class="news-share-box">
    <div class="news-share-heading">
      <div class="news-share-icon-wrap">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
      </div>
      <div>
        <h4 class="news-share-heading-title">Bagikan Berita Ini</h4>
        <p class="news-share-heading-sub">Bantu sebarkan informasi resmi dan terkini Politeknik Mitra Industri</p>
      </div>
    </div>
    <div class="news-share-buttons">
      <!-- WhatsApp -->
      <a href="{{ $waShareUrl }}" target="_blank" rel="noopener noreferrer" class="share-btn share-btn--wa" title="Bagikan ke WhatsApp">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.074-1.112-.059-.413-.133-1.077-.384-1.924-.764-1.226-.549-2.072-1.748-2.133-1.83-.061-.082-.497-.661-.497-1.261 0-.6.313-.896.425-1.018.112-.122.244-.153.326-.153.082 0 .163.002.234.006.074.004.174-.028.272.207.102.244.347.848.378.91.031.061.051.133.01.214-.041.082-.061.133-.122.204-.061.071-.129.159-.184.214-.061.061-.125.127-.054.249.071.122.316.522.678.845.466.415.859.544.981.605.122.061.194.051.265-.031.071-.082.306-.356.388-.478.082-.122.163-.102.275-.061.112.041.714.337.837.398.122.061.204.092.235.143.03.051.03.296-.114.701zM12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2.05 22l4.984-1.307C8.47 21.56 10.177 22 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18c-1.63 0-3.15-.49-4.42-1.33l-.32-.21-2.96.78.79-2.88-.23-.35A7.95 7.95 0 0 1 4 12c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8z"/></svg>
        <span>WhatsApp</span>
      </a>

      <!-- Facebook -->
      <a href="{{ $fbShareUrl }}" target="_blank" rel="noopener noreferrer" class="share-btn share-btn--fb" title="Bagikan ke Facebook">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        <span>Facebook</span>
      </a>

      <!-- X -->
      <a href="{{ $xShareUrl }}" target="_blank" rel="noopener noreferrer" class="share-btn share-btn--x" title="Bagikan ke X (Twitter)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        <span>X (Twitter)</span>
      </a>

      <!-- Salin Link -->
      <button type="button" class="share-btn share-btn--copy" onclick="copyNewsLink(this, '{{ $articleUrl }}')" title="Salin Tautan Berita">
        <svg class="icon-link" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
        <svg class="icon-check" style="display:none;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
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
    prompt('Salin tautan berikut:', text);
  }
  document.body.removeChild(textArea);
}

function showCopyFeedback() {
  const allCopyBtns = document.querySelectorAll('.mini-share-btn--copy, .share-btn--copy');
  allCopyBtns.forEach(b => {
    b.classList.add('copied');
    const linkIcon = b.querySelector('.icon-link');
    const checkIcon = b.querySelector('.icon-check');
    const label = b.querySelector('.copy-label');
    
    if (linkIcon) linkIcon.style.display = 'none';
    if (checkIcon) checkIcon.style.display = 'block';
    if (label) label.textContent = 'Link Tersalin!';
  });

  showToastNotification('Tautan berita berhasil disalin ke clipboard!');

  setTimeout(() => {
    allCopyBtns.forEach(b => {
      b.classList.remove('copied');
      const linkIcon = b.querySelector('.icon-link');
      const checkIcon = b.querySelector('.icon-check');
      const label = b.querySelector('.copy-label');
      
      if (linkIcon) linkIcon.style.display = 'block';
      if (checkIcon) checkIcon.style.display = 'none';
      if (label) label.textContent = 'Salin Link';
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
  toast.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"></circle><polyline points="16 12 12 8 8 12"></polyline><polyline points="12 8 12 16"></polyline></svg> <span>' + message + '</span>';
  toast.classList.add('show');
  setTimeout(() => {
    toast.classList.remove('show');
  }, 2500);
}
</script>
@endpush
