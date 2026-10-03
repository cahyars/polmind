@extends('layouts.frontend')

@section('title', 'Daftar Dosen - Politeknik Mitra Industri')
@section('canonical', 'https://polmind.ac.id/daftar_dosen')

@section('content')
<div class="container-dosen mb40" style="margin-top:140px;">
  <h2 class="judul-dosen-grid mb20" data-translate="internal-lecturers">Dosen Internal</h2>

  <div class="grid-dosen-wrapper">
    @foreach($dosenInternal as $dosen)
      <div class="kartu-dosen-grid">
        <img src="{{ $dosen->photo_url }}" alt="{{ $dosen->name }}" class="foto-dosen-bulat">
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
        <img src="{{ $dosen->photo_url }}" alt="{{ $dosen->name }}" class="foto-dosen-bulat">
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
        <img src="{{ $dosen->photo_url }}" alt="{{ $dosen->name }}" class="foto-dosen-bulat">
        <div class="nama-dosen">{!! nl2br(e($dosen->name)) !!}</div>
        <div class="info-dosen">{{ $dosen->position }}</div>
      </div>
    @endforeach
  </div>
</div>
@endif
@endsection
