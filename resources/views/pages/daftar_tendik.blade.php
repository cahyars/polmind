@extends('layouts.frontend')

@section('title', 'Daftar Tenaga Kependidikan - Politeknik Mitra Industri')
@section('canonical', 'https://polmind.ac.id/daftar_tendik')

@section('content')
<div class="container-dosen mb40" style="margin-top:140px; min-height: 60vh;">
  <h2 class="judul-dosen-grid mb20" data-translate="internal-staff">Tenaga Kependidikan</h2>

  <div class="grid-dosen-wrapper">
    @foreach($tendik as $item)
      <div class="kartu-dosen-grid">
        <img src="{{ $item->photo_url }}" alt="{{ $item->name }}" class="foto-dosen-bulat">
        <div class="nama-dosen">{!! nl2br(e($item->name)) !!}</div>
        <div class="info-dosen">{{ $item->position }}</div>
      </div>
    @endforeach
  </div>
</div>
@endsection
