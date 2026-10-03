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

  <p class="breadcrumb center-text mb15" style="color: #64748b; font-size: 14px;">
    {{ $article->author }} | {{ $article->formatted_date }}
    @if($article->category)
      | <span style="text-transform: capitalize; background: #e0e7ff; color: #3730a3; padding: 2px 8px; border-radius: 4px; font-size: 12px;">{{ $article->category }}</span>
    @endif
  </p>

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
