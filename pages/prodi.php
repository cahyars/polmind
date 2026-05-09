<?php
$page_title = "Program Studi - Politeknik Mitra Industri";
$canonical_url = "https://polmind.ac.id/prodi";
include "inc_header.php"; ?>

<!-- Hero -->
<div class="container">
  <h1 class="mb-0 title effect-static-text mb15" style="color: #102C53;margin-top: 100px;" data-translate="study-programs-title">Program Studi</h1>

  <div class="button-group">
    <button type="button" onclick="location.href='#trm'" data-translate="btn-trm">Teknologi Rekayasa Manufaktur</button>
    <button type="button" onclick="location.href='#bd'" data-translate="btn-bd">Bisnis Digital</button>
    <button type="button" onclick="location.href='#trpl'" data-translate="btn-trpl">Teknologi Rekayasa Perangkat Lunak</button>
  </div>
</div>

<!-- TRM -->
<section id="about" class="section-1 highlights team image-right" id="trm">
  <div id="trm" style="position: relative; top: -100px; visibility: hidden;"></div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8 align-self-top text">
        <div class="row intro m-0">
          <div class="col-12 p-0">
            <span class="pre-title mb10" style="color: #102c53;" data-translate="applied-bachelor">Sarjana Terapan (D4)</span>
            <h2>
              <span class="featured"><span data-translate="tech">Teknologi </span></span>
              <span data-translate="trm-title-rest">Rekayasa Manufaktur</span>
            </h2>
          </div>
        </div>
        <div class="row mt15">
          <div class="col-12 p-0 pr-md-5">
            <p class="lh1-5" data-translate="trm-desc-1">
              Teknologi Rekayasa Manufaktur adalah bidang ilmu terapan yang fokus pada penerapan prinsip-prinsip teknik dan teknologi dalam merancang, mengembangkan, mengelola, serta mengoptimalkan proses produksi di berbagai sektor industri.
            </p>
            <p class="lh1-5 mt15 mb15" data-translate="trm-desc-2">
              Bidang ini mencakup pemahaman mendalam mengenai berbagai proses manufaktur, seperti pemesinan, pengecoran, pengelasan, perakitan, otomasi industri, hingga teknologi manufaktur modern seperti CNC (Computer Numerical Control), CAD/CAM (Computer-Aided Design/Computer-Aided Manufacturing), dan manufaktur aditif (seperti <i>3D Printing</i>).
            </p>
          </div>
        </div>
      </div>

      <div data-aos="zoom-in" class="col-12 col-lg-4 mt-5 mt-lg-0">
        <center>
          <!-- Gallery -->
          <div class="gallery row justify-content-center">
            <a class="col-6 pl-0 a-none" href="<?= BASE_URL ?>assets/images/manufacture/manufacture01.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/manufacture/manufacture01.jpg" alt="Program Studi Teknologi Rekayasa Manufaktur (TRM)" class="w-100">
            </a>
            <a class="col-6 pr-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/manufacture/manufacture02.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/manufacture/manufacture02.jpg" alt="Program Studi Teknologi Rekayasa Manufaktur (TRM)" class="w-100">
            </a>
            <a class="col-6 pl-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/manufacture/manufacture03.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/manufacture/manufacture03.jpg" alt="Program Studi Teknologi Rekayasa Manufaktur (TRM)" class="w-100">
            </a>
            <a class="col-6 pr-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/manufacture/manufacture04.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/manufacture/manufacture04.jpg" alt="Program Studi Teknologi Rekayasa Manufaktur (TRM)" class="w-100">
            </a>
          </div>
        </center>
      </div>
    </div>

    <p class="lh1-5 mb10" data-translate="trm-outline">
      Berikut ini adalah <i>outline</i> kurikulum untuk Program Studi D4 Teknologi Rekayasa Manufaktur:
    </p>

    <div class="card-prodi-container">
    <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-1"><i class="fa-solid fa-book mr10"></i> Semester 1</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trm-s1-1">Matematika Teknik I</li>
            <li data-translate="trm-s1-2">Fisika & Mekanika Teknik</li>
            <li data-translate="trm-s1-3">Material Teknik</li>
            <li data-translate="trm-s1-4">Proses Produksi Industri Manufaktur</li>
            <li data-translate="trm-s1-5">Teknologi dan Pemesinan I</li>
            <li data-translate="trm-s1-6">Engineering Drawing</li>
            <li data-translate="trm-s1-7">Bahasa Jepang I</li>
            <li data-translate="trm-s1-8">Product Design dan Inovasi</li>
            <li data-translate="trm-s1-9">Bahasa Indonesia</li>
        </ul>
        </div>
    </div>

    <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-2"><i class="fa-solid fa-book mr10"></i> Semester 2</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trm-s2-1">Mesin Penggerak</li>
            <li data-translate="trm-s2-2">Bahasa Jepang II</li>
            <li data-translate="trm-s2-3">Thermodinamika dan Perpindahan Panas</li>
            <li data-translate="trm-s2-4">Marketing & Branding</li>
            <li data-translate="trm-s2-5">Kelistrikan & Elektronika</li>
            <li data-translate="trm-s2-6">Teknologi dan Pemesinan II</li>
            <li data-translate="trm-s2-7">CAD-CAM I</li>
            <li data-translate="trm-s2-8">Teknologi Digital I</li>
            <li data-translate="trm-s2-9">Pancasila</li>
        </ul>
        </div>
    </div>

    <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-3"><i class="fa-solid fa-book mr10"></i> Semester 3</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trm-s3-1">K3</li>
            <li data-translate="trm-s3-2">Komunikasi Publik I</li>
            <li data-translate="trm-s3-3">Mekanika, Elastisitas & Plastisitas Bahan</li>
            <li data-translate="trm-s3-4">Mata Kuliah Pilihan
            <ol class="ml15">
                <li data-translate="trm-s3-4a">Teknologi Manufaktur Terintegrasi</li>
                <li data-translate="trm-s3-4b">Manajemen Produksi Manufaktur Terintegrasi</li>
            </ol>
            </li>
            <li data-translate="trm-s3-5">PPIC I</li>
            <li data-translate="trm-s3-6">Teknologi Multimedia</li>
            <li data-translate="trm-s3-7">CAD-CAM II</li>
            <li data-translate="trm-s3-8">Kontrol & Otomasi Industri</li>
            <li data-translate="trm-s3-9">Project Mandiri I</li>
        </ul>
        </div>
    </div>

    <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-4"><i class="fa-solid fa-book mr10"></i> Semester 4</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trm-s4-1">Leadership & Inovasi</li>
            <li data-translate="trm-s4-2">Entrepreneurship</li>
            <li data-translate="trm-s4-3">Teknologi Manufaktur Cerdas</li>
            <li data-translate="trm-s4-4">Mata Kuliah Pilihan
            <ol class="ml15">
                <li data-translate="trm-s4-4a">Perawatan Mesin Produksi</li>
                <li data-translate="trm-s4-4b">Teknologi Multimedia Lanjut I</li>
                <li data-translate="trm-s4-4c">Perancangan Mould & Dies</li>
                <li data-translate="trm-s4-4d">Manajemen Proyek Lanjut I</li>
            </ol>
            </li>
            <li data-translate="trm-s4-5">PPIC II</li>
            <li data-translate="trm-s4-6">Teknologi Digital II</li>
            <li data-translate="trm-s4-7">Komunikasi Publik II</li>
            <li data-translate="trm-s4-8">Bahasa Inggris I</li>
            <li data-translate="trm-s4-9">Project Mandiri II</li>
        </ul>
        </div>
    </div>

    <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-5"><i class="fa-solid fa-book mr10"></i> Semester 5</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trm-s5-1">Kewarganegaraan</li>
            <li data-translate="trm-s5-2">Agama</li>
            <li data-translate="trm-s5-3">Penulisan Laporan Ilmiah</li>
            <li data-translate="trm-s5-4">Teknologi 3D Printing</li>
            <li data-translate="trm-s5-5">Mata Kuliah Pilihan
            <ol class="ml15">
                <li data-translate="trm-s5-5a">Teknologi Multimerdia Lanjut II</li>
                <li data-translate="trm-s5-5b">CAE</li>
                <li data-translate="trm-s5-5c">Manajemen Proyek Lanjut II</li>
            </ol>
            </li>
            <li data-translate="trm-s5-6">PPIC III</li>
            <li data-translate="trm-s5-7">Manajemen Project</li>
            <li data-translate="trm-s5-8">Bahasa Inggris II</li>
            <li data-translate="trm-s5-9">Project Mandiri III</li>
        </ul>
        </div>
    </div>

    <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-6"><i class="fa-solid fa-book mr10"></i> Semester 6</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trm-s6-1">MBKM/Magang</li>
            <li data-translate="trm-s6-2">Etika Teknologi Profesional</li>
            <li data-translate="trm-s6-3">Pengalaman Industri</li>
            <li data-translate="trm-s6-4">Validasi Model Industri</li>
            <li data-translate="trm-s6-5">Evaluasi dan Pelaporan Magang</li>
        </ul>
        </div>
    </div>

    <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-7"><i class="fa-solid fa-book mr10"></i> Semester 7</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trm-s7-1">MBKM/Magang</li>
            <li data-translate="trm-s7-2">Etika Teknologi Profesional</li>
            <li data-translate="trm-s7-3">Pengalaman Industri</li>
            <li data-translate="trm-s7-4">Validasi Model Industri</li>
            <li data-translate="trm-s7-5">Evaluasi dan Pelaporan Magang</li>
        </ul>
        </div>
    </div>

    <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-8"><i class="fa-solid fa-book mr10"></i> Semester 8</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trm-s8-1">Tugas Akhir</li>
        </ul>
        </div>
    </div>
    </div>

  </div>
</section>

<!-- BD -->
<section id="features" class="section-3 features offers" id="bd">
  <div id="bd" style="position: relative; top: -100px; visibility: hidden;"></div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8 align-self-top text">
        <div class="row intro m-0">
          <div class="col-12 p-0">
            <span class="pre-title mb10" data-translate="applied-bachelor">Sarjana Terapan (D4)</span>
            <h2>
              <span class="featured"><span data-translate="business">Bisnis </span></span>
              <span data-translate="bd-title-rest">Digital</span>
            </h2>
          </div>
        </div>
        <div class="row mt15">
          <div class="col-12 p-0 pr-md-5">
            <p class="lh1-5" data-translate="bd-desc-1">
              Bisnis digital adalah jenis usaha yang memanfaatkan teknologi digital dalam berbagai aktivitas utamanya, seperti pemasaran, penjualan, hingga layanan pelanggan. <i>Platform online</i> seperti <i>website</i>, <i>e-commerce</i>, aplikasi, dan media sosial menjadi sarana utama untuk menjangkau konsumen dengan lebih luas dan efisien. Teknologi juga digunakan untuk mempermudah proses transaksi, komunikasi, serta analisis data pelanggan.
            </p>
            <p class="lh1-5 mt15 mb15" data-translate="bd-desc-2">
              Bisnis ini berkembang pesat seiring meningkatnya penggunaan internet dan perangkat digital. Tidak hanya perusahaan besar, pelaku usaha kecil pun kini banyak yang beralih ke <i>model digital</i> untuk memperluas pasar dan meningkatkan daya saing. Fleksibilitas, efisiensi biaya, serta kemampuan menjangkau pelanggan secara <i>real-time</i> menjadi keunggulan utama dari bisnis <i>digital</i> di era modern.
            </p>
          </div>
        </div>
      </div>

      <div data-aos="zoom-in" class="col-12 col-lg-4 mt-5 mt-lg-0">
        <center>
          <!-- Gallery -->
          <div class="gallery row justify-content-center">
            <a class="col-6 pl-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/business/business5.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/business/business5.jpg" alt="Program Studi Bisnis Digital (BD)" class="w-100">
            </a>
            <a class="col-6 pr-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/business/business02.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/business/business02.jpg" alt="Program Studi Bisnis Digital (BD)" class="w-100">
            </a>
            <a class="col-6 pl-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/business/business03.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/business/business03.jpg" alt="Program Studi Bisnis Digital (BD)" class="w-100">
            </a>
            <a class="col-6 pr-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/business/business04.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/business/business04.jpg" alt="Program Studi Bisnis Digital (BD)" class="w-100">
            </a>
          </div>
        </center>
      </div>
    </div>

    <p class="lh1-5 mt10 mb15" data-translate="bd-outline">
      Berikut ini adalah <i>outline</i> kurikulum untuk Program Studi D4 Bisnis Digital:
    </p>

    <div class="card-prodi-container">
        <div class="card-prodi">
            <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-1"><i class="fa-solid fa-book mr10"></i> Semester 1</div>
            <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="bd-s1-1">Pengantar Teknologi Informasi</li>
                <li data-translate="bd-s1-2">Pengantar Kewirausahaan, Bisnis, & Manajemen</li>
                <li data-translate="bd-s1-3">Multimedia & Web Design</li>
                <li data-translate="bd-s1-4">Agama</li>
                <li data-translate="bd-s1-5">Pancasila</li>
                <li data-translate="bd-s1-6">Manajemen Pemasaran</li>
                <li data-translate="bd-s1-7">Algoritma & Pemrograman Dasar</li>
                <li data-translate="bd-s1-8">Matematika Bisnis</li>
                <li data-translate="bd-s1-9">Bahasa Inggris 1</li>
            </ul>
            </div>
        </div>

        <div class="card-prodi">
            <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-2"><i class="fa-solid fa-book mr10"></i> Semester 2</div>
            <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="bd-s2-1">Technopreneurship</li>
                <li data-translate="bd-s2-2">E-Commerce</li>
                <li data-translate="bd-s2-3">Kewarganegaraan</li>
                <li data-translate="bd-s2-4">Perilaku Konsumen</li>
                <li data-translate="bd-s2-5">Pemasaran Digital 1</li>
                <li data-translate="bd-s2-6">Statistika Bisnis</li>
                <li data-translate="bd-s2-7">Bahasa Indonesia</li>
                <li data-translate="bd-s2-8">Design Thinking</li>
                <li data-translate="bd-s2-9">Bahasa Jepang 1</li>
                <li data-translate="bd-s2-10">Akuntansi Keuangan</li>
            </ul>
            </div>
        </div>

        <div class="card-prodi">
            <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-3"><i class="fa-solid fa-book mr10"></i> Semester 3</div>
            <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="bd-s3-1">Pengembangan Produk dan Bisnis Digital 1</li>
                <li data-translate="bd-s3-2">Analisis dan Desain Sistem Informasi</li>
                <li data-translate="bd-s3-3">User Experience Research and Development</li>
                <li data-translate="bd-s3-4">Pemasaran Digital 2</li>
                <li data-translate="bd-s3-5">Riset Pasar & Studi Kelayakan Bisnis</li>
                <li data-translate="bd-s3-6">Presentasi & Komunikasi Bisnis</li>
                <li data-translate="bd-s3-7">Bahasa Inggris 2</li>
                <li data-translate="bd-s3-8">Studium Generale 1</li>
                <li data-translate="bd-s3-9">Projek Mandiri 1</li>
            </ul>
            </div>
        </div>

        <div class="card-prodi">
            <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-4"><i class="fa-solid fa-book mr10"></i> Semester 4</div>
            <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="bd-s4-1">Pengembangan Produk dan Bisnis Digital 2</li>
                <li data-translate="bd-s4-2">Pengembangan Website dengan Database 1</li>
                <li data-translate="bd-s4-3">Branding</li>
                <li data-translate="bd-s4-4">Manajemen Proyek Digital</li>
                <li data-translate="bd-s4-5">Manajemen Penjualan dan Iklan Media Sosial</li>
                <li data-translate="bd-s4-6">Manajemen Operasi & Rantai Pasok</li>
                <li data-translate="bd-s4-7">Manajemen Strategik</li>
                <li data-translate="bd-s4-8">Bahasa Jepang 2</li>
                <li data-translate="bd-s4-9">Proyek Mandiri 2</li>
            </ul>
            </div>
        </div>

        <div class="card-prodi">
            <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-5"><i class="fa-solid fa-book mr10"></i> Semester 5</div>
            <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="bd-s5-1">SEO</li>
                <li data-translate="bd-s5-2">Bisnis & Pemasaran Internasional</li>
                <li data-translate="bd-s5-3">Manajemen Keuangan</li>
                <li data-translate="bd-s5-4">Manajemen SDM</li>
                <li data-translate="bd-s5-5">Animasi & Motion Graphic</li>
                <li data-translate="bd-s5-6">Sains Data 1</li>
                <li data-translate="bd-s5-7">Akuntansi Manajerial</li>
                <li data-translate="bd-s5-8">Manajemen Risiko</li>
                <li data-translate="bd-s5-9">Proyek Mandiri 3</li>
            </ul>
            </div>
        </div>

        <div class="card-prodi">
            <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-6"><i class="fa-solid fa-book mr10"></i> Semester 6</div>
            <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="bd-s6-1">Business Development</li>
                <li data-translate="bd-s6-2">Transformasi Digital</li>
                <li data-translate="bd-s6-3">Valuasi Bisnis & Analisis Laporan Keuangan</li>
                <li data-translate="bd-s6-4">Kepemimpinan dan Inovasi</li>
                <li data-translate="bd-s6-5">Etika dan Hukum Bisnis</li>
                <li data-translate="bd-s6-6">Metode Penelitian dan Penulisan Laporan Ilmiah</li>
                <li data-translate="bd-s6-7">Mata Kuliah Pilihan</li>
                <ol class="ml15">
                <li data-translate="bd-s6-7a">Sociopreneurship & Ekonomi Kreatif</li>
                <li data-translate="bd-s6-7b">Pengembangan Website dengan Database II</li>
                <li data-translate="bd-s6-7c">Akuntansi Biaya</li>
                <li data-translate="bd-s6-7d">Sains Data 2</li>
                </ol>
                <li data-translate="bd-s6-8">Studium Generale 2</li>
                <li data-translate="bd-s6-9">Proyek Mandiri 4</li>
            </ul>
            </div>
        </div>

        <div class="card-prodi">
            <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-7"><i class="fa-solid fa-book mr10"></i> Semester 7</div>
            <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="bd-s7-1">MBKM</li>
                <li data-translate="bd-s7-2">Etika Bisnis Profesional</li>
                <li data-translate="bd-s7-3">Pengalaman Industri</li>
                <li data-translate="bd-s7-4">Validasi Model Industri</li>
                <li data-translate="bd-s7-5">Evaluasi dan Pelaporan Magang</li>
            </ul>
            </div>
        </div>

        <div class="card-prodi">
            <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-8"><i class="fa-solid fa-book mr10"></i> Semester 8</div>
            <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="bd-s8-1">Tugas Akhir</li>
            </ul>
            </div>
        </div>
        </div>
  </div>
</section>

<!-- TRPL -->
<section id="about" class="section-1 highlights team image-right" id="trpl">
  <div id="trpl" style="position: relative; top: -100px; visibility: hidden;"></div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8 align-self-top text">
        <div class="row intro m-0">
          <div class="col-12 p-0">
            <span class="pre-title mb10" style="color: #102c53;" data-translate="applied-bachelor">Sarjana Terapan (D4)</span>
            <h2>
              <span class="featured"><span data-translate="tech">Teknologi </span></span>
              <span data-translate="trpl-title-rest">Rekayasa Perangkat Lunak</span>
            </h2>
          </div>
        </div>
        <div class="row mt15">
          <div class="col-12 p-0 pr-md-5">
            <p class="lh1-5" data-translate="trpl-desc-1">
              Program Studi Teknologi Rekayasa Perangkat Lunak (TRPL) adalah program vokasional yang berfokus pada pengembangan perangkat lunak secara profesional, mulai dari perencanaan, perancangan, pengujian, hingga implementasi dan pemeliharaan sistem aplikasi.
            </p>
            <p class="lh1-5 mt15 mb15" data-translate="trpl-desc-2">
              Program ini menyiapkan lulusan yang siap kerja dengan kompetensi tinggi di bidang <i>software engineering</i>, <i>mobile</i>, dan <i>web development</i>, serta pemrograman berbasis industri.
            </p>
          </div>
        </div>
      </div>

      <div data-aos="zoom-in" class="col-12 col-lg-4 mt-5 mt-lg-0">
        <center>
          <!-- Gallery -->
          <div class="gallery row justify-content-center">
            <a class="col-6 pl-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/rpl/trpl06.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/rpl/trpl06.jpg" alt="Program Studi Teknologi Rekayasa Perangkat Lunak (TRPL)" class="w-100">
            </a>
            <a class="col-6 pr-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/rpl/trpl07.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/rpl/trpl07.jpg" alt="Program Studi Teknologi Rekayasa Perangkat Lunak (TRPL)" class="w-100">
            </a>
            <a class="col-6 pl-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/rpl/trpl03.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/rpl/trpl03.jpg" alt="Program Studi Teknologi Rekayasa Perangkat Lunak (TRPL)" class="w-100">
            </a>
            <a class="col-6 pr-0 a-none" href="<?= BASE_URL ?>assets/images/prodi/rpl/trpl04.jpg">
              <img src="<?= BASE_URL ?>assets/images/prodi/rpl/trpl04.jpg" alt="Program Studi Teknologi Rekayasa Perangkat Lunak (TRPL)" class="w-100">
            </a>
          </div>
        </center>
      </div>
    </div>

    <p class="lh1-5 mt10 mb15" data-translate="trpl-outline">
      Berikut ini adalah <i>outline</i> kurikulum untuk Program Studi D4 Teknologi Rekayasa Perangkat Lunak:
    </p>

    <div class="card-prodi-container">
      <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-1"><i class="fa-solid fa-book mr10"></i> Semester 1</div>
        <div class="card-prodi-body">
          <ul class="lh1-5 ml15">
            <li data-translate="trpl-s1-pti">Pengantar Teknologi Informasi</li>
            <li data-translate="trpl-s1-matematika-diskrit">Matematika Diskrit</li>
            <li data-translate="trpl-s1-pancasila">Pancasila</li>
            <li data-translate="trpl-s1-dasar-pemrograman">Dasar Pemrograman</li>
            <li data-translate="trpl-s1-design-thinking">Design Thinking</li>
            <li data-translate="trpl-s1-arsitektur-organisasi-komputer">Arsitektur dan Organisasi Komputer</li>
            <li data-translate="trpl-s1-bahasa-jepang-1">Bahasa Jepang 1</li>
            <li data-translate="trpl-s1-bahasa-inggris-1">Bahasa Inggris 1</li>
            <li data-translate="trpl-s1-basis-data-1">Basis Data 1</li>
        </ul>
        </div>
      </div>

      <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-2"><i class="fa-solid fa-book mr10"></i> Semester 2</div>
        <div class="card-prodi-body">
          <ul class="lh1-5 ml15">
            <li data-translate="trpl-s2-bahasa-indonesia">Bahasa Indonesia</li>
            <li data-translate="trpl-s2-bahasa-jepang-2">Bahasa Jepang 2</li>
            <li data-translate="trpl-s2-sistem-operasi">Sistem Operasi</li>
            <li data-translate="trpl-s2-presentasi-komunikasi">Presentasi dan Komunikasi</li>
            <li data-translate="trpl-s2-pemrograman-web">Pemrograman Web</li>
            <li data-translate="trpl-s2-perancangan-ui">Perancangan Antarmuka Pengguna</li>
            <li data-translate="trpl-s2-asd">Algoritma dan Struktur Data</li>
            <li data-translate="trpl-s2-bisnis-internasional">Bisnis Internasional</li>
            <li data-translate="trpl-s2-basis-data-2">Basis Data 2</li>
            </ul>
        </div>
      </div>

      <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-3"><i class="fa-solid fa-book mr10"></i> Semester 3</div>
        <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="trpl-s3-sim">Sistem Informasi Manajemen</li>
                <li data-translate="trpl-s3-jaringan-komputer">Jaringan Komputer</li>
                <li data-translate="trpl-s3-bisnis-ti">Bisnis Teknologi Informasi</li>
                <li data-translate="trpl-s3-pbo">Pemrograman Berorientasi Objek</li>
                <li data-translate="trpl-s3-embedded">Embedded System</li>
                <li data-translate="trpl-s3-statistika">Statistika</li>
                <li data-translate="trpl-s3-pemrograman-web-lanjut">Pemrograman Web Lanjut</li>
                <li data-translate="trpl-s3-kewarganegaraan">Kewarganegaraan</li>
                <li data-translate="trpl-s3-projek1">Projek Mandiri 1</li>
            </ul>
        </div>
      </div>

      <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-4"><i class="fa-solid fa-book mr10"></i> Semester 4</div>
        <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="trpl-s4-pengujian-pl">Pengujian Perangkat Lunak</li>
                <li data-translate="trpl-s4-bigdata">Big Data dan Data Analisis</li>
                <li data-translate="trpl-s4-entrepreneurship">Entrepreneurship</li>
                <li data-translate="trpl-s4-studium">Studium Generale</li>
                <li data-translate="trpl-s4-mk-pilihan">Mata Kuliah Pilihan
                    <ol class="ml15">
                    <li data-translate="trpl-s4-embedded-lanjut">Embedded System Lanjut</li>
                    <li data-translate="trpl-s4-pemrograman-game">Pemrograman Game</li>
                    <li data-translate="trpl-s4-teknologi-digital">Teknologi Digital, Sosial Media, dan Media Baru</li>
                    </ol>
                </li>
                <li data-translate="trpl-s4-pemrograman-mobile">Pemrograman Aplikasi Mobile</li>
                <li data-translate="trpl-s4-agama">Agama</li>
                <li data-translate="trpl-s4-keamanan-pl">Keamanan Perangkat Lunak</li>
                <li data-translate="trpl-s4-projek2">Proyek Mandiri 2</li>
            </ul>
        </div>
      </div>

      <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-5"><i class="fa-solid fa-book mr10"></i> Semester 5</div>
        <div class="card-prodi-body">
            <ul class="lh1-5 ml15">
                <li data-translate="trpl-s5-erp">Enterprise Resource Planning (ERP)</li>
                <li data-translate="trpl-s5-manajemen-proyek">Manajemen Proyek</li>
                <li data-translate="trpl-s5-metodologi-penelitian">Metodologi Penelitian dan Penulisan Laporan Ilmiah</li>
                <li data-translate="trpl-s5-ai">Kecerdasan Buatan</li>
                <li data-translate="trpl-s5-aplikasi-terdistribusi">Pengembangan Aplikasi Terdistribusi</li>
                <li data-translate="trpl-s5-bahasa-inggris-2">Bahasa Inggris 2</li>
                <li data-translate="trpl-s5-mk-pilihan">Mata Kuliah Pilihan
                    <ol class="ml15">
                    <li data-translate="trpl-s5-iot">Sistem Internet of Things (IoT)</li>
                    <li data-translate="trpl-s5-bisnis-digital">Pengembangan Produk dan Bisnis Digital</li>
                    <li data-translate="trpl-s5-mobile-lanjut">Pemrograman Mobile Lanjut</li>
                    </ol>
                </li>
                <li data-translate="trpl-s5-leadership">Leadership dan Inovasi</li>
                <li data-translate="trpl-s5-projek3">Proyek Mandiri 3</li>
            </ul>
        </div>
      </div>

      <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-6"><i class="fa-solid fa-book mr10"></i> Semester 6</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trpl-s6-mbkm">MBKM/Magang</li>
            <li data-translate="trpl-s6-etika-teknologi">Etika Teknologi Profesional</li>
            <li data-translate="trpl-s6-pengalaman-industri">Pengalaman Industri</li>
            <li data-translate="trpl-s6-validasi-model">Validasi Model Industri</li>
            <li data-translate="trpl-s6-evaluasi-magang">Evaluasi dan Pelaporan Magang</li>
        </ul>
        </div>
      </div>

      <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-7"><i class="fa-solid fa-book mr10"></i> Semester 7</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trpl-s7-mbkm">MBKM/Magang</li>
            <li data-translate="trpl-s7-etika-teknologi">Etika Teknologi Profesional</li>
            <li data-translate="trpl-s7-pengalaman-industri">Pengalaman Industri</li>
            <li data-translate="trpl-s7-validasi-model">Validasi Model Industri</li>
            <li data-translate="trpl-s7-evaluasi-magang">Evaluasi dan Pelaporan Magang</li>
        </ul>
        </div>
      </div>

      <div class="card-prodi">
        <div class="card-prodi-header" onclick="toggleCard(this)" data-translate="semester-8"><i class="fa-solid fa-book mr10"></i> Semester 8</div>
        <div class="card-prodi-body">
        <ul class="lh1-5 ml15">
            <li data-translate="trpl-s8-tugas-akhir">Tugas Akhir</li>
        </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include "inc_footer.php"; ?>
