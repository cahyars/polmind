# Panduan Lengkap Deploy Website Polmind ke Hostinger Cloud Hosting

Dokumen ini berisi panduan langkah-demi-langkah untuk melakukan deployment proyek website **Politeknik Mitra Industri (Polmind)** ke **Hostinger Cloud Hosting** (hPanel) dengan database MySQL.

---

## 1. Persiapan yang Sudah Diselesaikan di Proyek

Semua konfigurasi utama untuk kebutuhan live hosting telah disiapkan di source code:

1. **Dump Database MySQL Siap Pakai (`database/polmind_database_ready.sql`)**:
   - Berisi seluruh skema tabel migrasi Laravel 12.
   - Sudah terisi data lengkap seeder (1 akun admin, 9 berita, 13 slider, 45 pengaturan konten PMB/sambutan, 28 dosen, 2 tendik, 6 founder & dewan pakar, 8 fitur keunggulan).
   - Siap langsung di-import ke **phpMyAdmin** di Hostinger tanpa perlu menjalankan migrasi manual.

2. **File `.htaccess` Root yang Aman & Teroptimasi**:
   - Menghubungkan seluruh lalu lintas pengunjung ke folder `public/` tanpa menampilkan kata `/public` pada URL browser.
   - Memblokir akses ke file sensitif (`.env`, `.git`, `composer.*`, `storage/logs/`, `app/`, `database/`, dll).
   - Menghindari kesalahan 404 / 500 jika proyek diletakkan langsung di direktori `public_html`.

3. **Optimasi SSL/HTTPS & Reverse Proxy**:
   - `bootstrap/app.php`: Mengaktifkan `$middleware->trustProxies(at: '*')` agar deteksi HTTPS dan IP client bekerja presisi di balik LiteSpeed / Cloudflare proxy Hostinger.
   - `app/Providers/AppServiceProvider.php`: Memaksa skema HTTPS (`URL::forceScheme('https')`) otomatis pada mode produksi.

4. **Fail-safe Penyajian File Media / Uploads**:
   - `config/filesystems.php`: Mengaktifkan `'serve' => true` pada disk `public` sehingga file upload gambar (berita, slider, dosen) dijamin tetap tampil normal meskipun fitur symlink hosting dibatasi.
   - Symlink `public/storage` dibuat relatif (`../storage/app/public`).

5. **Template Environment Produksi (`.env.production.example`)**:
   - Template `.env` siap pakai yang telah disesuaikan untuk konfigurasi server Hostinger.

---

## 2. Langkah Deployment di Hostinger (hPanel)

### Langkah 1: Buat Database MySQL di Hostinger
1. Login ke panel **Hostinger (hPanel)**.
2. Masuk ke menu **Databases** -> **MySQL Databases**.
3. Masukkan data database baru:
   - **MySQL Database Name**: misal `polmind_db` (Hostinger akan menambahkan prefix akun, misal: `u633436767_polmind_db`).
   - **MySQL Username**: misal `admin_polmind` (akan menjadi `u633436767_admin_polmind`).
   - **Password**: Buat password yang kuat dan catat.
4. Klik **Create / Buat**.

---

### Langkah 2: Import Data Database via phpMyAdmin
1. Pada baris database yang baru saja dibuat di hPanel, klik tombol **Enter phpMyAdmin**.
2. Klik nama database di menu sebelah kiri.
3. Klik tab **Import** pada menu atas.
4. Klik tombol **Choose File / Pilih File**, lalu pilih file:
   `database/polmind_database_ready.sql` dari komputer Anda.
5. Gulir ke bawah dan klik tombol **Import / Kirim**.
6. Tunggu beberapa detik hingga muncul pesan sukses berwarna hijau. Seluruh tabel dan data awal telah terisi!

---

### Langkah 3: Upload Source Code ke Hostinger

Anda dapat memilih salah satu dari 2 metode upload berikut:

#### Opsi A: Menggunakan File Manager / ZIP (Paling Mudah)
1. Di komputer lokal, compress/zip folder proyek ini.
   *(Catatan: Folder `vendor/` dan `node_modules/` boleh tidak disertakan jika ingin ukuran file zip kecil dan akan menjalankan `composer install` via SSH hosting, atau sertakan folder `vendor/` jika ingin langsung upload utuh tanpa SSH).*
2. Buka **File Manager** di hPanel Hostinger.
3. Masuk ke direktori `public_html/`.
4. Upload file `.zip` tersebut lalu klik kanan -> **Extract**.
5. Pastikan isi folder berada di `public_html/`.

#### Opsi B: Menggunakan Git Deployment di hPanel
1. Buka menu **Advanced** -> **GIT** di hPanel.
2. Masukkan repository Git:
   - **Repository**: `https://github.com/cahyars/polmind.git`
   - **Branch**: `updated`
   - **Install Path**: biarkan default atau `public_html`
3. Klik **Create / Deploy**.

---

### Langkah 4: Konfigurasi File `.env` di Server Hosting
1. Di File Manager Hostinger, buka folder proyek.
2. Buat atau edit file bernama `.env` (jika tersembunyi, pastikan opsi *Show Hidden Files* diaktifkan di File Manager).
3. Anda bisa menyalin isi dari [.env.production.example](file:///.env.production.example) ke file `.env` tersebut.
4. Sesuaikan parameter berikut:
   ```env
   APP_NAME="Politeknik Mitra Industri"
   APP_ENV=production
   APP_KEY=base64:qNPFNxYCMsBMyHKzB2Nn40WZ8vSg6kktNtEag+29w5o=
   APP_DEBUG=false
   APP_URL=https://polmind.ac.id

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=u633436767_polmind_db
   DB_USERNAME=u633436767_admin_polmind
   DB_PASSWORD=MasukkanPasswordDatabaseAnda

   FILESYSTEM_DISK=public
   ```
5. Simpan file `.env`.

---

### Langkah 5: Pastikan Versi PHP 8.2 atau 8.3
1. Di hPanel Hostinger, masuk ke menu **Advanced** -> **PHP Configuration**.
2. Pilih **PHP 8.2** atau **PHP 8.3**.
3. Pastikan ekstensi umum seperti `pdo_mysql`, `curl`, `mbstring`, `fileinfo`, `gd`, `openssl`, `zip` dalam keadaan aktif (default Hostinger sudah aktif).
4. Klik **Save**.

---

### Langkah 6: Optimasi Akhir (Opsional via SSH Hostinger)
Jika Anda memiliki akses **SSH** di Hostinger Cloud Hosting:
1. Hubungkan SSH menggunakan PuTTY / Terminal terminal hosting.
2. Masuk ke folder aplikasi:
   ```bash
   cd public_html
   ```
3. Jalankan optimasi cache Laravel:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   php artisan storage:link
   ```

---

## 3. Informasi Kredensial Login Admin

Setelah website aktif di hosting:
- **URL Admin Panel**: `https://namadomain-anda.com/admin/login` (atau `/login`)
- **Email**: `admin@polmind.ac.id`
- **Password**: `admin123`

> [!TIP]
> Setelah berhasil login untuk pertama kali di server produksi, Anda dapat mengganti password atau mengupdate data profil admin melalui dashboard admin.

---

## 4. Checklist Verifikasi Go-Live

- [ ] Database MySQL berhasil dibuat dan di-import via phpMyAdmin.
- [ ] File `.env` sudah diisi nama database, user, password, dan domain `APP_URL`.
- [ ] Parameter `APP_DEBUG=false` untuk menjaga keamanan website di live server.
- [ ] Buka halaman beranda `https://namadomain.com/` (slider, navbar, dan berita tampil dengan baik).
- [ ] Buka `https://namadomain.com/admin/login` dan coba login dengan akun admin.
- [ ] Buka `https://namadomain.com/sitemap.xml` untuk memastikan Googlebot sitemap aktif.
- [ ] Buka `https://namadomain.com/robots.txt` untuk memastikan aturan bot terpasang.
