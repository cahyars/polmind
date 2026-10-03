@extends('layouts.frontend')

@section('title', 'Daftar Dosen & Praktisi Industri | Politeknik Mitra Industri')
@section('meta_description', 'Profil dan daftar dosen pengajar internal, praktisi dan expert industri, serta instruktur laboratorium di Politeknik Mitra Industri (Polmind) MM2100.')
@section('canonical', 'https://polmind.ac.id/daftar_dosen')

@section('content')
<!-- Primary Heading for SEO -->
<h1 style="position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); border:0;">Daftar Dosen dan Praktisi Industri Politeknik Mitra Industri</h1>

<div class="container-dosen mb40" style="margin-top:140px;">
  <h2 class="judul-dosen-grid mb20" data-translate="internal-lecturers">Dosen Internal</h2>

  <div class="grid-dosen-wrapper">
    @foreach($dosenInternal as $dosen)
      <div class="kartu-dosen-grid">
        <img src="{{ $dosen->photo_url }}" alt="{{ $dosen->name }}" class="foto-dosen-bulat" loading="lazy" decoding="async">
        <div class="nama-dosen">{!! nl2br(e($dosen->name)) !!}</div>
        <div class="info-dosen">{{ $dosen->position }}</div>
      </div>
    @endforeach
  </div>
</div>

<div class="container-dosen">
  <h2 class="judul-dosen-grid mb20"><i>Expert</i> <span data-translate="industry">Industri</span></h2>

  <div class="grid-dosen-wrapper">
    @foreach($dosenIndustri as $dosen)
      <div class="kartu-dosen-grid">
        <img src="{{ $dosen->photo_url }}" alt="{{ $dosen->name }}" class="foto-dosen-bulat" loading="lazy" decoding="async">
        <div class="nama-dosen">{!! nl2br(e($dosen->name)) !!}</div>
        <div class="info-dosen">{{ $dosen->position }}</div>
      </div>
    @endforeach
  </div>
</div>

@if($instruktur->count() > 0)
<div class="container-dosen" style="margin-bottom: 60px;">
  <h2 class="judul-dosen-grid mb20">Instruktur</h2>

  <div class="grid-dosen-wrapper">
    @foreach($instruktur as $dosen)
      <div class="kartu-dosen-grid">
        <img src="{{ $dosen->photo_url }}" alt="{{ $dosen->name }}" class="foto-dosen-bulat" loading="lazy" decoding="async">
        <div class="nama-dosen">{!! nl2br(e($dosen->name)) !!}</div>
        <div class="info-dosen">{{ $dosen->position }}</div>
      </div>
    @endforeach
  </div>
</div>
@endif
@endsection
