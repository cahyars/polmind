# DOKUMENTASI KONTEKS & REKAP PROGRESS PROYEK POLMIND
**Website**: Politeknik Mitra Industri (Polmind)  
**Framework**: Laravel 12 (PHP 8.2+)  
**Repository GitHub**: [https://github.com/cahyars/polmind.git](https://github.com/cahyars/polmind.git)  
**Branch Aktif**: `updated`  
**Terakhir Diperbarui**: 3 Oktober 2026

---

## 1. Ikhtisar & Konteks Proyek (Project Overview)

Proyek ini adalah sistem website institusi resmi **Politeknik Mitra Industri (Polmind)** yang berlokasi di Kawasan Industri MM2100 Cikarang Barat, Bekasi. 

Awalnya website ini dibangun menggunakan **PHP Native / prosedural** dengan file statis dan halaman di direktori `pages/`. Seluruh sistem kini telah **berhasil dimigrasikan secara penuh ke Laravel 12**, dilengkapi dengan:
- **Frontend Publik yang Responsif & Modern**: Menjaga estetika, layout, konten multibahasa (ID/EN), dan pengalaman pengguna dari versi sebelumnya.
- **Admin Panel & Dynamic CMS**: Sistem manajemen konten mandiri untuk berita, slider, sambutan direktur, data PMB, jajaran dosen, dan tendik tanpa harus menyentuh kode program.
- **Standar SEO Modern & Core Web Vitals**: Pengindeksan Googlebot otomatis, metadata dinamis, Schema.org JSON-LD, lazy loading, dan server caching.

---

## 2. Struktur Arsitektur & Direktori Proyek

```
web-polmind/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/                  # Controller CRUD Admin Panel
│   │   │   ├── AuthController.php      # Login/Logout Admin
│   │   │   ├── DashboardController.php # Statistik Ringkasan
│   │   │   ├── BeritaController.php    # Kelola Berita & Upload Gambar
│   │   │   ├── CategoryController.php  # Kelola Kategori Berita
│   │   │   ├── SliderController.php    # Kelola Banner Slider Beranda
│   │   │   ├── ContentController.php   # Kelola Teks Sambutan & Profil
│   │   │   ├── PmbController.php       # Kelola Jadwal, Biaya, Hero PMB
│   │   │   ├── LecturerController.php  # Kelola Dosen & Praktisi
│   │   │   └── StaffController.php     # Kelola Tenaga Kependidikan
│   │   ├── BeritaController.php    # Controller Publik Berita
│   │   ├── PageController.php      # Controller Halaman Statis/Frontend
│   │   └── SitemapController.php   # Dynamic XML Sitemap Generator
│   └── Models/                     # Eloquent Models (Berita, Slider, dll)
├── database/
│   ├── migrations/                 # Migrasi seluruh tabel MySQL/SQLite
│   └── seeders/                    # Seeder data awal (admin, berita, dosen)
├── public/
│   ├── assets/                     # CSS, JS, Gambar, Font Institusi
│   ├── spmb/                       # Sub-website statis SPMB
│   ├── .htaccess                   # Konfigurasi Apache (Gzip & Cache)
│   ├── robots.txt                  # Aturan Crawler & Sitemap Declaration
│   ├── sitemap.xml                 # File fisik sitemap (auto-synchronized)
│   └── index.php                   # Entry Point Laravel
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── frontend.blade.php  # Template Induk Publik (SEO, Head, Nav, Foot)
│       │   └── admin.blade.php     # Template Induk Panel Admin
│       ├── admin/                  # Blade Views Admin Panel
│       └── pages/                  # Blade Views Frontend Publik
├── routes/
│   ├── web.php                     # Seluruh Definisi Route Publik & Admin
│   └── console.php
├── router.php                      # Built-in PHP Server Router (support static asset)
├── start.sh                        # Bash script sekali klik untuk menjalankan server
└── .env.example                    # Template konfigurasi environment
```

---

## 3. Rincian Database & Akun Admin

### 3.1. Database Engine
- **Utama**: MySQL (`polmind_db`) pada environment lokal/hosting.
- **Fallback / Standby**: SQLite (`database/database.sqlite`).

### 3.2. Tabel-Tabel Utama
1. `users`: Akun administrator (`name`, `email`, `password`).
2. `beritas`: Artikel berita (`title`, `slug`, `summary`, `content`, `image`, `category_id`, `is_published`, `published_date`, `views`).
3. `categories`: Kategori berita (`name`, `slug`).
4. `sliders`: Banner carousel beranda (`title`, `image`, `link`, `order`, `is_active`).
5. `site_settings`: Pengaturan dinamis key-value (`director_name`, `director_message`, `pmb_cta_text`, kontak, dll).
6. `founder_experts`: Jajaran pendiri dan expert industri.
7. `grid_features`: Kotak fitur keunggulan di beranda.
8. `lecturers`: Daftar dosen internal, praktisi industri, instruktur.
9. `staff`: Daftar tenaga kependidikan.

### 3.3. Kredensial Default Login Admin
- **URL Login**: `http://127.0.0.1:8000/admin/login` (atau `/login`)
- **Email**: `admin@polmind.ac.id`
- **Password**: `password` (atau `admin123` sesuai seeder)

---

## 4. Daftar Rute Publik & Fungsionalitas (Routes Map)

| Route Name | Endpoint URL | Controller & Method | Deskripsi |
| :--- | :--- | :--- | :--- |
| `home` | `/` | `PageController@beranda` | Beranda utama dengan slider & news slider |
| `beranda` | `/beranda` | `PageController@beranda` | Alias beranda |
| `profil` | `/profil` | `PageController@profil` | Profil, Visi Misi, Dewan Pendiri & Expert |
| `prodi` | `/prodi` | `PageController@prodi` | Program Studi D4: TRM, Bisnis Digital, TRPL |
| `keunikan` | `/keunikan` | `PageController@keunikan` | 12 Keunikan dan Keunggulan Kampus Polmind |
| `pmb` | `/pmb` | `PageController@pmb` | Informasi Lengkap PMB (Jadwal, Syarat, Biaya) |
| `dokumentasi` | `/dokumentasi` | `PageController@dokumentasi` | Galeri 47+ Foto Kegiatan, Industri, TEFA |
| `daftar_dosen` | `/daftar_dosen` | `PageController@daftarDosen` | Civitas Dosen Internal & Expert Industri |
| `daftar_tendik`| `/daftar_tendik`| `PageController@daftarTendik`| Daftar Tenaga Kependidikan |
| `berita.index` | `/beranda/berita` | `BeritaController@index` | Arsip Berita dengan filter kategori |
| `berita.show` | `/beranda/berita/{slug}` | `BeritaController@show` | Detail Baca Berita + Berita Terkait |
| `sitemap` | `/sitemap.xml` | `SitemapController@index` | Dynamic XML Sitemap untuk Googlebot |
| `spmb` | `/spmb/` | Static subsite | Modul statis informasi PMB lama |

---

## 5. Rangkuman Progress Pengerjaan Terperinci

### 5.1. Migrasi & Pembersihan Repository Git
- **Problem**: Repositori GitHub sebelumnya bercampur antara file native lama (`pages/`, `config.php`, root `.htaccess`, root `index.php`) dan file backup (`_legacy_backup/`, `akses_ftp.md`).
- **Solusi**:
  1. File-file lama di-untrack dari Git (`git rm -r --cached`) namun tetap aman tersimpan di disk lokal.
  2. File `.gitignore` diperbarui untuk mengabaikan direktori legacy dan file kredensial privat.
  3. Struktur Laravel 12 yang bersih di-commit dan di-push ke GitHub repo `https://github.com/cahyars/polmind.git` pada branch **`updated`**.

### 5.2. Optimasi SEO (Search Engine Optimization)
1. **Robots.txt** ([public/robots.txt](public/robots.txt)):
   - Menolak perayapan bot pada dashboard admin (`Disallow: /admin/` dan `Disallow: /login`).
   - Menyatakan lokasi sitemap resmi (`Sitemap: https://polmind.ac.id/sitemap.xml`).
2. **Dynamic XML Sitemap** ([app/Http/Controllers/SitemapController.php](app/Http/Controllers/SitemapController.php)):
   - Mengindeks seluruh 10 URL halaman statis institusi.
   - Mengambil seluruh artikel berita yang berstatus `is_published = true` secara dinamis dari database lengkap dengan tanggal pembaruan terakhir (`<lastmod>`).
   - Otomatis memperbarui file fisik [public/sitemap.xml](public/sitemap.xml).
3. **Hierarki Heading (`<h1>` - `<h6>`)**:
   - Menghapus tag `<h1>` dari logo navbar di layout induk dan menggantinya dengan `<div class="logo">` (styling dipertahankan via [main-style.css](public/assets/css/main-style.css)).
   - Memastikan setiap halaman memiliki **tepat satu `<h1>`** yang unik dan sesuai dengan konteks konten (Beranda, Profil, Prodi, Keunikan, PMB, Dokumentasi, Dosen, Tendik, Arsip Berita, Detail Berita).
   - Pada arsip berita, judul setiap kartu berita dinormalkan dari `<h1>` menjadi `<h2>`.
4. **Metadata & Canonical URL Dinamis**:
   - Layout induk ([resources/views/layouts/frontend.blade.php](resources/views/layouts/frontend.blade.php)) kini mendukung `@yield('title')`, `@yield('meta_description')`, dan `@yield('canonical')`.
   - Canonical URL otomatis menggunakan `url()->current()`, menghindari kesalahan penumpukan canonical ke homepage.
5. **Social Sharing Preview (OpenGraph & Twitter Cards)**:
   - Terpasang tag `og:site_name`, `og:locale`, `og:type`, `og:title`, `og:description`, `og:url`, dan `og:image`.
   - Pada halaman detail berita, thumbnail gambar berita otomatis menjadi `og:image` sehingga preview sharing WhatsApp / Telegram / Medsos tampil profesional.
6. **Structured Data (Schema.org JSON-LD)**:
   - `CollegeOrUniversity`: Terpasang di seluruh halaman publik untuk mengenalkan identitas kampus vokasi, alamat MM2100, kontak PMB, dan sosial media.
   - `NewsArticle`: Terpasang pada halaman baca artikel berita lengkap dengan tanggal terbit, penulis, gambar, dan penerbit agar memenuhi kualifikasi Google News.

### 5.3. Optimasi Kecepatan & Loading Time (Web Performance)
1. **Penerapan Lazy Loading Modern**:
   - Menambahkan atribut `loading="lazy" decoding="async"` pada seluruh gambar di bawah layar:
     - 47 foto galeri di [dokumentasi.blade.php](resources/views/pages/dokumentasi.blade.php)
     - 12 foto workshop/lab di [prodi.blade.php](resources/views/pages/prodi.blade.php)
     - Foto dosen, tendik, dan kartu berita.
   - Memangkas unduhan data awal pengunjung di Beranda dari **37,6 MB menjadi ~1,5 MB** (turun >95%).
2. **Optimasi LCP (Largest Contentful Paint)**:
   - Banner slide pertama di Beranda dan gambar utama berita dipasangi atribut `fetchpriority="high"`.
   - Slide banner ke-2 s/d ke-13 dipasangi `fetchpriority="low" loading="lazy"`.
3. **Resource Hints & Google Fonts**:
   - Menambahkan `<link rel="preconnect">` untuk `fonts.googleapis.com` dan `fonts.gstatic.com`.
   - Menggabungkan request font `Montserrat` dan `Poppins` ke dalam satu URL tunggal dengan parameter `&display=swap`.
4. **Server Compression & Browser Caching** ([public/.htaccess](public/.htaccess)):
   - **`mod_deflate`**: Mengaktifkan kompresi Gzip untuk text/html, css, js, json, xml, dan svg (menghemat transfer bandwidth ~70%).
   - **`mod_expires`**: Mengaktifkan cache browser selama 1 tahun untuk gambar/font dan 1 bulan untuk file CSS/JS.
5. **Router Script Built-in Server** ([router.php](router.php)):
   - Diperbarui agar dapat melayani file statis dari folder `public/` dengan MIME-Type yang presisi (termasuk `robots.txt`, `sitemap.xml`, css, js, webp, dan svg).

---

## 6. Panduan Menjalankan Aplikasi di Lingkungan Lokal

### Cara 1: Menggunakan Script Otomatis
```bash
./start.sh
```
Script ini akan langsung menjalankan server Laravel di `http://127.0.0.1:8000`.

### Cara 2: Menggunakan PHP Router Kompatibel
```bash
php -S 127.0.0.1:8000 router.php
```

### Cara 3: Menggunakan Artisan
```bash
php artisan serve --port=8000
```

### Perintah Pemeliharaan Rutin
```bash
# Clear Cache View Blade
php artisan view:clear

# Sinkronisasi / Regenerasi Sitemap XML
php artisan tinker --execute="(new \App\Http\Controllers\SitemapController)->index();"
```

---

## 7. Status Git Saat Ini

- **Remote URL**: `git@github.com:cahyars/polmind.git`
- **Branch**: `updated`
- **Latest Commit**:
  - `979ec42`: *"Optimize SEO (dynamic sitemap, metadata, headings, Schema.org) and web performance (lazy loading, LCP fetchpriority, Gzip, browser caching)"*
  - `83a20b3`: *"Migrate website to Laravel 12 with Admin Panel and dynamic CMS"*
- **Working Tree**: Bersih (`working tree clean`).

---

## 8. Catatan untuk Model AI Selanjutnya (Next AI Prompting Context)

1. **Jaga Konsistensi Blade**:
   - Jangan menambahkan tag `<h1>` baru di layout induk navbar atau footer. Setiap halaman konten (`pages/*.blade.php`) wajib mempertahankan tepat **satu `<h1>`**.
   - Ketika menambahkan schema JSON-LD, **selalu gunakan `{!! json_encode([...], JSON_UNESCAPED_SLASHES) !!}`** untuk menghindari konflik parser Blade terhadap karakter `@context` dan `@type`.
2. **Kinerja Gambar**:
   - Setiap kali menambahkan elemen `<img>` baru di bawah viewport (below the fold), pastikan menyertakan atribut `loading="lazy" decoding="async"`.
3. **Pengelolaan Sitemap**:
   - Jika membuat modul publik baru (misalnya Agenda Kampus atau Testimoni Alumni), daftarkan URL tersebut ke dalam array `$staticPages` pada `SitemapController.php`.
