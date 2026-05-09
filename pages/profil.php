<?php
$page_title = "Profil - Politeknik Mitra Industri";
$canonical_url = "https://polmind.ac.id/profil";
include "inc_header.php"; ?>

<picture>
  <source id="src-profil-sp" media="(max-width: 991px)" srcset="<?= BASE_URL ?>assets/images/m_profil.png">
  <img id="img-profil" src="<?= BASE_URL ?>assets/images/b_profil.png" data-translate="profil-banner-alt" alt="Politeknik Mitra Industri menerapkan 5 nilai dan budaya industri 6S" style="display: block; margin-top: 95px; width: 100%; height: auto; position: relative; top: 3px;">
</picture>

<div class="container baseColor">
  <p class="fs24" style="text-align:center; margin-bottom:40px;" data-translate="profil-decree">Berdasarkan Keputusan Mentri DIKTI SAINTEK No 324/B/O/2025</p>
  <h2 class="colorLight center" data-translate="profil-vision-mission">Visi & Misi</h2>
  <div class="text-center mt20">
    <p class="fs24 mb10 b-600"><i class="fa-solid fa-eye"></i> <span data-translate="profil-vision">Visi</span></p>
    <p class="fs18 center whitesmoke lh1-5" data-translate="profil-vision-text">"Menjadi kampus terapan unggulan berstandar global yang menghasilkan lulusan profesional, berkarakter, dan siap kerja melalui pembelajaran kontekstual berbasis industri dan nilai-nilai luhur."</p>
  </div>
  <hr class="mt20">
  <div class="text-center mt20">
    <p class="fs24 b-600"><i class="fa-solid fa-rocket"></i> <span data-translate="profil-mission">Misi</span></p>
    <div class="container">
      <ol class="fs18 whitesmoke ml20 lh1-5">
        <li data-translate="profil-m1">Menyelenggarakan pendidikan terapan berbasis industri melalui Teaching Factory dan Project-Based Learning.</li>
        <li data-translate="profil-m2">Menyusun kurikulum bersama praktisi untuk memenuhi kebutuhan dunia kerja.</li>
        <li data-translate="profil-m3">Membentuk lulusan berkarakter, siap kerja, dan berdaya saing global.</li>
        <li data-translate="profil-m4">Menumbuhkan semangat kewirausahaan dalam lingkungan kampus.</li>
        <li data-translate="profil-m5">Membangun kemitraan strategis dengan industri nasional dan internasional.</li>
      </ol>
    </div>
  </div>
</div>

<div class="container" id="jajaran">
  <h2><span class="featured" data-translate="profil-founders"> Jajaran Pendiri </span> & <i data-translate="profil-experts">Experts</i></h2>
  <p class="mt15 ml10 mb15 lh1-5" data-translate="profil-desc">Politeknik Mitra Industri didirikan oleh jajaran pimpinan dan <i>expert</i> dari Industri, bersama Praktisi Pendidikan Vokasi (ex Dirjen Vokasi)</p>

      <div class="team-container">
        <div class="team-card">
            <img src="<?= BASE_URL ?>assets/images/profil/kobi.jpg" alt="Yoshihiro Kobi">
            <h3>Yoshihiro Kobi</h3>
            <p data-translate="profil-kobi-role">Pendiri Kawasan Industri MM2100</p>
        </div>

        <div class="team-card">
            <img src="<?= BASE_URL ?>assets/images/profil/darwoto.jpg" alt="Darwoto">
            <h3>Darwoto</h3>
            <p data-translate="profil-darwoto-role">Pengelola Kawasan Industri MM2100</p>
        </div>

        <div class="team-card">
            <img src="<?= BASE_URL ?>assets/images/profil/lispiyatmini.jpg" alt="">
            <h3>Lispiyatmini</h3>
            <p data-translate="profil-lispi-role">Jajaran Pimpinan industri dalam Kawasan Industri MM2100</p>
        </div>

        <!-- Tambah lagi 4 item untuk total 7 -->

        <div class="team-card">
            <img src="<?= BASE_URL ?>assets/images/profil/musfir.jpg" alt="Musfir">
            <h3>Musfir</h3>
            <p data-translate="profil-musfir-role">Jajaran Pimpinan industri dalam Kawasan Industri MM2100</p>
        </div>

        <div class="team-card">
            <img src="<?= BASE_URL ?>assets/images/profil/wikan.jpg" alt="Wikan Sakarinto">
            <h3>Wikan Sakarinto</h3>
            <p data-translate="profil-wikan-role">Direktur Politeknik Mitra Industri<br>Dirjen Vokasi Kemendikbudristek RI (2020-2022)<br>Dekan SV-UGM (2016-2020)</p>
        </div>

        <div class="team-card">
            <img src="<?= BASE_URL ?>assets/images/profil/joko.jpg" alt="">
            <h3>Joko Baroto</h3>
            <p data-translate="profil-joko-role">Wakil Direktur Politeknik Mitra Industri<br>Executive Officer, PT. Daihatsu Drivetrain Manufacturing Indonesia</p>
        </div>
    </div>
</div>

<?php include "inc_footer.php"; ?>