@extends('layouts.frontend')

@section('title', 'Profil - Politeknik Mitra Industri')
@section('canonical', 'https://polmind.ac.id/profil')

@section('content')
<picture>
  <source id="src-profil-sp" media="(max-width: 991px)" srcset="{{ asset('assets/images/m_profil.png') }}">
  <img id="img-profil" src="{{ asset($banner) }}" data-translate="profil-banner-alt" alt="Politeknik Mitra Industri menerapkan 5 nilai dan budaya industri 6S" style="display: block; margin-top: 95px; width: 100%; height: auto; position: relative; top: 3px;">
</picture>

<div class="container baseColor">
  <p class="fs24" style="text-align:center; margin-bottom:40px;" data-translate="profil-decree">{{ $decree }}</p>
  <h2 class="colorLight center" data-translate="profil-vision-mission">Visi & Misi</h2>
  <div class="text-center mt20">
    <p class="fs24 mb10 b-600"><i class="fa-solid fa-eye"></i> <span data-translate="profil-vision">Visi</span></p>
    <p class="fs18 center whitesmoke lh1-5" data-translate="profil-vision-text">"{{ $vision }}"</p>
  </div>
  <hr class="mt20">
  <div class="text-center mt20">
    <p class="fs24 b-600"><i class="fa-solid fa-rocket"></i> <span data-translate="profil-mission">Misi</span></p>
    <div class="container">
      <ol class="fs18 whitesmoke ml20 lh1-5">
        @foreach($missions as $idx => $misi)
          <li data-translate="profil-m{{ $idx + 1 }}">{{ $misi }}</li>
        @endforeach
      </ol>
    </div>
  </div>
</div>

<div class="container" id="jajaran">
  <h2><span class="featured" data-translate="profil-founders"> Jajaran Pendiri </span> & <i data-translate="profil-experts">Experts</i></h2>
  <p class="mt15 ml10 mb15 lh1-5" data-translate="profil-desc">Politeknik Mitra Industri didirikan oleh jajaran pimpinan dan <i>expert</i> dari Industri, bersama Praktisi Pendidikan Vokasi (ex Dirjen Vokasi)</p>

  <div class="team-container">
    @foreach($founders as $founder)
      <div class="team-card">
        <img src="{{ $founder->photo_url }}" alt="{{ $founder->name }}">
        <h3>{{ $founder->name }}</h3>
        <p>{!! nl2br(e($founder->role)) !!}</p>
      </div>
    @endforeach
  </div>
</div>
@endsection
