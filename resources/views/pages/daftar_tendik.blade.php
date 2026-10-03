@extends('layouts.frontend')

@section('title', 'Daftar Tenaga Kependidikan | Politeknik Mitra Industri')
@section('meta_description', 'Daftar staf dan tenaga kependidikan profesional yang mendukung operasional akademik di Politeknik Mitra Industri (Polmind) MM2100.')
@section('canonical', 'https://polmind.ac.id/daftar_tendik')

@section('content')
<!-- Primary Heading for SEO -->
<h1 style="position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); border:0;">Daftar Tenaga Kependidikan Politeknik Mitra Industri</h1>

<div class="container-dosen mb40" style="margin-top:140px; min-height: 60vh;">
  <h2 class="judul-dosen-grid mb20" data-translate="internal-staff">Tenaga Kependidikan</h2>

  <div class="grid-dosen-wrapper">
    @foreach($tendik as $item)
      <div class="kartu-dosen-grid">
        <img src="{{ $item->photo_url }}" alt="{{ $item->name }}" class="foto-dosen-bulat" loading="lazy" decoding="async">
        <div class="nama-dosen">{!! nl2br(e($item->name)) !!}</div>
        <div class="info-dosen">{{ $item->position }}</div>
      </div>
    @endforeach
  </div>
</div>
@endsection
