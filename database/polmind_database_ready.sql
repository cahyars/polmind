-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: polmind_db
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `beritas`
--

DROP TABLE IF EXISTS `beritas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beritas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'umum',
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'Administrator',
  `published_date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `views_count` bigint(20) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beritas_slug_unique` (`slug`),
  KEY `beritas_category_id_foreign` (`category_id`),
  CONSTRAINT `beritas_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beritas`
--

LOCK TABLES `beritas` WRITE;
/*!40000 ALTER TABLE `beritas` DISABLE KEYS */;
INSERT INTO `beritas` VALUES (1,'MoU Polmind dengan Departemen Patologi dan Anatomi Fakultas Kedokteran, Kesehatan Masyarakat dan Keperawatan UGM','mou-polmind-dengan-fk-ugm','kerjasama',3,'Administrator','2026-04-24','assets/images/news/mou_kedokteran_ugm.jpg','Yogyakarta, Universitas Gadjah Mada – Penandatanganan Memorandum of Understanding (MoU) dan Perjanjian Kerja Sama antara Politeknik Mitra Industri dengan Departemen Patologi dan Anatomi FKKMK UGM.','<p>\r\n        Yogyakarta, Universitas Gadjah Mada – Penandatanganan Memorandum of Understanding (MoU) dan Perjanjian Kerja Sama antara Politeknik Mitra Industri dengan Departemen Patologi dan Anatomi, Fakultas Kedokteran, Kesehatan Masyarakat, dan Keperawatan Universitas Gadjah Mada dilaksanakan pada Jumat, 24 April 2026.\r\n    </p>\r\n    <br>\r\n    <p>\r\n        Penandatanganan ini dilakukan oleh Direktur Politeknik Mitra Industri, Wikan Sakarinto, S.T., M.Sc., Ph.D., bersama dr. Hanggoro Tri Rinonce, Ph.D., Sp.P.A., Subsp. URL (K), Subsp. KA (K) sebagai Ketua Departemen Patologi dan Anatomi FKKMK UGM. Kegiatan ini menjadi langkah strategis dalam memperkuat sinergi antar institusi dalam pengembangan riset terapan, Teaching Factory (TeFa), serta publikasi ilmiah, khususnya di bidang teknologi kesehatan.\r\n    </p>\r\n    <br>\r\n    <p>\r\n        Kerja sama ini merupakan tindak lanjut dari MoU yang telah disepakati sebelumnya, dengan fokus pada pengembangan inovasi berbasis kebutuhan nyata di bidang kesehatan. Melalui kolaborasi ini, kedua belah pihak berkomitmen untuk menghadirkan solusi teknologi kesehatan melalui kegiatan riset terapan, implementasi pembelajaran berbasis proyek nyata, serta menghasilkan luaran berupa prototipe, publikasi ilmiah, dan kekayaan intelektual.\r\n    </p>\r\n    <br>\r\n    <p>\r\n        Ruang lingkup kerja sama meliputi pelaksanaan penelitian bersama di bidang kesehatan dan biomedis, pengembangan produk dan prototipe alat bantu medis seperti syringe holder, serta publikasi hasil riset pada jurnal nasional dan internasional. Selain itu, implementasi Teaching Factory (TeFa) juga akan melibatkan dosen, mahasiswa, dan praktisi dalam kegiatan kolaboratif yang terintegrasi dengan proses pembelajaran.\r\n    </p>\r\n    <br>\r\n    <p>\r\n        Melalui kerja sama ini, diharapkan tercipta inovasi yang berdampak nyata bagi masyarakat serta memperkuat peran pendidikan vokasi dalam mendukung pengembangan teknologi kesehatan di Indonesia.\r\n    </p>',1,325,'2026-10-02 17:33:56','2026-10-02 18:24:15'),(2,'Perkuat Pendidikan Vokasi Berstandar Global, Politeknik Mitra Industri Jalin Kemitraan dengan Ehime University Jepang','politeknik-mitra-industri-jalin-kemitraan-dengan-ehime-university-jepang','kerjasama',3,'Administrator','2025-10-14','assets/images/news/berita_terbaru02.jpg','Dalam upaya meningkatkan mutu pendidikan vokasi dan memperluas jaringan kolaborasi internasional, Politeknik Mitra Industri (Polmind) kembali mencetak sejarah penting...','<p data-translate=\"news-ehime-p1\">\n      Dalam upaya meningkatkan mutu pendidikan vokasi dan memperluas jaringan kolaborasi internasional, Politeknik Mitra Industri (Polmind) kembali mencetak sejarah penting. Pada Selasa (14/10/2025), Polmind menandatangani Memorandum of Understanding (MoU) dengan Ehime University, salah satu universitas ternama di Jepang yang dikenal unggul dalam bidang riset teknologi dan pengembangan sumber daya manusia industri.\n    </p>\n    <br>\n    <p data-translate=\"news-ehime-p2\">\n      Acara penandatanganan berlangsung di Aula F SMK Mitra Industri MM2100, Bekasi, dengan dihadiri pimpinan Polmind, perwakilan Ehime University, serta tamu undangan dari kalangan industri dan lembaga pendidikan mitra.\n    </p>\n    <br>\n    <p data-translate=\"news-ehime-p3\">\n      Kolaborasi ini menjadi momentum penting dalam mempererat hubungan antara pendidikan vokasi Indonesia dan lembaga pendidikan tinggi internasional. Melalui kesepakatan ini, kedua pihak akan berfokus pada pengembangan program bersama seperti pertukaran mahasiswa dan dosen, riset dan publikasi kolaboratif, penguatan kurikulum berbasis industri global, serta penerapan model Teaching Factory (TeFa) dengan standar internasional.\n    </p>\n    <br>\n    <p data-translate=\"news-ehime-p4\">\n      Direktur Politeknik Mitra Industri, Wikan Sakarinto, menegaskan bahwa kemitraan dengan Ehime University merupakan langkah nyata dalam mewujudkan visi Polmind sebagai kampus vokasi berkelas dunia.\n    </p>\n    <p data-translate=\"news-ehime-p5\">\n      <i>“Kami ingin membuka gerbang global bagi mahasiswa Polmind. Dengan dukungan Ehime University, kami akan memperkuat implementasi Teaching Factory agar mahasiswa bisa belajar langsung melalui proyek industri nyata. Kami yakin kolaborasi ini akan mempercepat transformasi Polmind menuju kampus vokasi berstandar internasional,”</i> ujar Wikan Sakarinto.\n    </p>\n    <br>\n    <p data-translate=\"news-ehime-p6\">\n      Lebih lanjut, ia menjelaskan bahwa kerja sama lintas negara ini sejalan dengan visi besar Polmind “Menuju Panggung Dunia”, yang berfokus pada pengembangan kompetensi dan daya saing sumber daya manusia di era peralihan dari revolusi industri 4.0 menuju 5.0.\n    </p>\n    <br>\n    <p data-translate=\"news-ehime-p7\">\n      Dalam kesempatan yang sama, Nishina Hiroshige, Rector of Ehime University, menyampaikan apresiasi atas kolaborasi ini.\n    </p>\n    <p data-translate=\"news-ehime-p8\">\n      <i>“Kami sangat senang dapat bekerja sama dengan Polmind. Kami percaya sinergi ini akan menghasilkan kolaborasi riset dan pengembangan SDM yang memberikan manfaat bagi kedua institusi dan masyarakat luas,”</i> ungkapnya.\n    </p>\n    <br>\n    <p data-translate=\"news-ehime-p9\">\n      Selain kolaborasi akademik, kerja sama ini juga membuka peluang bagi mahasiswa Polmind untuk mengikuti program magang dan pelatihan di perusahaan-perusahaan Jepang, memperluas jejaring global, dan mendapatkan pengalaman internasional yang berharga.\n    </p>\n    <p data-translate=\"news-ehime-p10\">\n      Melalui kemitraan ini, Politeknik Mitra Industri menegaskan komitmennya untuk mencetak lulusan yang kompeten, adaptif, dan berdaya saing di kancah global. Dengan memperkuat implementasi Teaching Factory serta menjalin kemitraan internasional yang berkelanjutan, Polmind terus melangkah pasti menjadi kampus vokasi berbasis industri yang siap bersaing di tingkat dunia.\n    </p>',1,180,'2026-10-02 17:33:56','2026-10-02 18:27:50'),(3,'POLMIND Resmi Bergabung dalam Aliansi Strategis Kampus Vokasi Indonesia dan China','polmind-resmi-bergabung-dalam-aliansi-strategis-kampus-vokasi-indonesia-china','kerjasama',3,'Administrator','2025-09-16','assets/images/news/berita_terbaru01.jpg','Politeknik Mitra Industri (POLMIND) secara resmi bergabung dalam Aliansi Kerja Sama Strategis Kampus Vokasi Indonesia dan China...','<p>Politeknik Mitra Industri (POLMIND) secara resmi bergabung dalam Aliansi Kerja Sama Strategis Kampus Vokasi Indonesia dan China...</p>',1,556,'2026-10-02 17:33:56','2026-10-02 21:23:47'),(4,'60 Mahasiswa Baru Resmi Diterima di Gelombang 1 PMB Politeknik Mitra Industri Tahun Akademik 2025/2026','60-Mahasiswa-baru-resmi-diterima-digelombang-1-pmb-politeknik-mitra-industri','umum',1,'Administrator','2025-07-05','assets/images/news/tpa.jpg','Politeknik Mitra Industri (Polmind) dengan bangga mengumumkan bahwa sebanyak 60 calon mahasiswa baru telah resmi dinyatakan lolos seleksi...','<p data-translate=\"news-p1\">\n      Politeknik Mitra Industri (Polmind) dengan bangga mengumumkan bahwa sebanyak 60 calon mahasiswa baru telah resmi dinyatakan lolos seleksi dan diterima dalam Penerimaan Mahasiswa Baru (PMB) Gelombang 1 Tahun Akademik 2025/2026.\n    </p>\n    <br>\n    <p data-translate=\"news-p2\">\n      Proses seleksi dilakukan melalui berbagai tahapan yang ketat dan komprehensif, meliputi seleksi administrasi, tes pengetahuan akademik, tes minat dan bakat, tes fisik, pemeriksaan kesehatan (<i>medical check-up</i>), hingga sesi wawancara bersama mitra industri. Sepanjang proses ini, para peserta menunjukkan semangat, dedikasi, dan antusiasme tinggi untuk menjadi bagian dari kampus vokasi yang berfokus pada kebutuhan dunia industri.\n    </p>\n    <br>\n    <p data-translate=\"news-p3\">\n      <i>“Selamat datang kepada para mahasiswa baru Polmind. Kalian adalah generasi pertama yang akan mencetak sejarah baru bersama kami dalam menciptakan lulusan vokasi yang adaptif, terampil, dan berdaya saing global,”</i> ujar Direktur Politeknik Mitra Industri dalam sambutannya.\n    </p>\n    <br>\n    <p data-translate=\"news-p4\">\n      Penerimaan 60 mahasiswa baru ini menjadi tonggak penting dalam memperkuat peran Polmind sebagai institusi vokasi unggulan yang terintegrasi dengan kawasan industri terbesar di Asia Tenggara. Ke depan, para mahasiswa akan mengikuti rangkaian kegiatan matrikulasi, orientasi akademik, serta pengenalan sistem pembelajaran berbasis <i>Teaching Factory</i> (TEFA) yang didukung oleh teknologi industri terkini.\n    </p>\n    <br>\n    <p data-translate=\"news-p5\">\n      Polmind mengucapkan selamat kepada seluruh peserta yang telah diterima, serta mengajak masyarakat untuk terus mengikuti perkembangan informasi terkait Penerimaan Mahasiswa Baru Gelombang 2 yang akan segera dibuka dalam waktu dekat.\n    </p>\n    <br>\n    <p data-translate=\"news-p6\">\n      Informasi lengkap dapat diakses melalui website resmi:\n      <a href=\"https://www.polmind.ac.id\">www.polmind.ac.id</a> atau melalui akun Instagram\n      <a href=\"https://www.instagram.com/polmind.official/\">@polmind.id</a>.\n    </p>',1,275,'2026-10-02 17:33:56','2026-10-02 17:53:17'),(5,'Polmind Gelar Press Conference, Perkenalkan Program Terkini dengan Dukungan Para Tokoh Kunci','polmind-gelar-press-conference','umum',1,'Administrator','2025-05-28','assets/images/news/press-conference.jpg','Politeknik Mitra Industri (Polmind) menggelar press conference pada tanggal 28 Mei 2025, yang dihadiri oleh berbagai media nasional...','<p data-translate=\"pressconf-p1\">\r\n      Politeknik Mitra Industri (Polmind) menggelar press conference pada tanggal 28 Mei 2025, yang dihadiri oleh berbagai media nasional. Acara ini menandai langkah penting Polmind dalam memperkuat komitmennya terhadap pengembangan pendidikan vokasi di Indonesia. Press conference dibuka dengan sambutan dari Bapak Yoshihiro Kobi, Presiden Direktur PT BEFA Industrial Estate, Tbk., yang juga merupakan Pendiri dan Pembina Yayasan Polmind, serta Bapak Raymond Liu, pengusaha nasional dan salah satu pendiri Polmind.\r\n    </p>\r\n    <br>\r\n\r\n    <p data-translate=\"pressconf-p2\">\r\n      <b>Dukungan Penuh dari Para Pendiri dan Industri</b><br>\r\n      Dalam sambutannya, Bapak Yoshihiro Kobi menyampaikan apresiasinya atas perkembangan Polmind yang semakin solid dalam mencetak tenaga kerja terampil.\r\n    </p>\r\n    <br>\r\n\r\n    <p data-translate=\"pressconf-p3\">\r\n      \"Polmind didirikan dengan visi mencetak lulusan yang siap kerja dan mampu bersaing di tingkat global. Kami dari BEFA Industrial Estate akan terus mendukung pengembangan infrastruktur dan link and match dengan industri,\" ujarnya.\r\n    </p>\r\n    <br>\r\n\r\n    <p data-translate=\"pressconf-p4\">\r\n      Sementara itu, Bapak Raymond Liu menekankan pentingnya kolaborasi antara dunia pendidikan dan industri.\r\n    </p>\r\n    <p data-translate=\"pressconf-p5\">\r\n      \"Pendidikan vokasi harus selaras dengan kebutuhan pasar. Melalui Polmind, kami ingin memastikan bahwa setiap lulusan tidak hanya memiliki sertifikat, tetapi juga kompetensi yang diakui industri,\" tegasnya.\r\n    </p>\r\n    <br>\r\n\r\n    <p data-translate=\"pressconf-p6\">\r\n      <b>Pemaparan Program oleh Pakar Vokasi Nasional</b><br>\r\n      Acara dilanjutkan dengan pemaparan program oleh Bapak Wikan Sakarinto, mantan Dirjen Vokasi Kemendikbud (2020-2022) yang kini menjabat sebagai Direktur sekaligus salah satu pendiri Polmind. Beliau memaparkan berbagai inisiatif terbaru Polmind, termasuk:\r\n    </p>\r\n\r\n    <ol class=\"detail-ml20\">\r\n      <li data-translate=\"pressconf-li1\">Program Teaching Factory (TeFa) yang diperkuat dengan teknologi AI dan IoT untuk mempersiapkan siswa menghadapi revolusi industri 5.0.</li>\r\n      <li data-translate=\"pressconf-li2\">Kerja sama dengan perusahaan multinasional dalam penyediaan magang dan penyerapan lulusan.</li>\r\n      <li data-translate=\"pressconf-li3\">Peluncuran kurikulum berbasis kompetensi industri terbaru, termasuk penguatan di bidang Deep Learning, otomasi, dan green technology.</li>\r\n    </ol>\r\n    <br>\r\n\r\n    <p data-translate=\"pressconf-p7\">\r\n      \"Kami tidak hanya fokus pada hard skills, tetapi juga soft skills seperti leadership dan kreativitas. Polmind akan menjadi pionir dalam menciptakan lulusan yang unggul dan adaptif,\" jelas Wikan.\r\n    </p>\r\n\r\n    <p data-translate=\"pressconf-p8\">\r\n      Antusiasme Media dan Komitmen Polmind ke Depan<br>\r\n      Press conference ini mendapat respons positif dari media, dengan banyak pertanyaan seputar strategi Polmind dalam meningkatkan kualitas pendidikan vokasi. Beberapa media juga menyoroti rencana ekspansi kampus dan program beasiswa untuk siswa berprestasi.\r\n    </p>\r\n    <br>\r\n\r\n    <p data-translate=\"pressconf-p9\">\r\n      Ke depan, Polmind berkomitmen untuk terus memperluas jaringan industri, meningkatkan fasilitas pembelajaran, dan berkontribusi lebih besar bagi pengembangan SDM Indonesia.\r\n    </p>\r\n\r\n    <p data-translate=\"pressconf-tags\">\r\n      #Polmind #VokasiMaju #WikanSakarinto #PendidikanBerkualitas #LinkAndMatch #TeFa\r\n    </p>',1,364,'2026-10-02 17:33:56','2026-10-02 17:53:17'),(6,'Polmind Sukses Gelar Seminar Deep Learning Bersama Direktur Polmind Wikan Sakarinto, S.T., M.Sc., Ph.D.','polmind-sukses-gelar-seminar-deep-learning','umum',1,'Administrator','2025-05-28','assets/images/news/berita_deep_learning.jpg','Politeknik Mitra Industri (Polmind) telah menyelenggarakan seminar dan diskusi mendalam bertema Deep Learning pada tanggal...','<p data-translate=\"deep-p1\">\r\n      Politeknik Mitra Industri (Polmind) telah menyelenggarakan seminar dan diskusi mendalam bertema Deep Learning pada tanggal 28 Mei 2025...\r\n    </p>\r\n\r\n    <p data-translate=\"deep-p2\">\r\n      Kegiatan ini dihadiri oleh ratusan kepala sekolah dan guru SMK/SMA se-Jawa Barat...\r\n    </p>\r\n\r\n    <p data-translate=\"deep-p3\">\r\n      <b>Menggali Potensi Deep Learning di Dunia Pendidikan</b><br>\r\n      Dalam paparannya, Bapak Wikan Sakarinto menjelaskan pentingnya integrasi pendekatan deep learning...\r\n    </p>\r\n\r\n    <p data-translate=\"deep-p4\">\r\n      <b>Polmind Komitmen Tingkatkan Kualitas Pendidikan Vokasi</b><br>\r\n      Sebagai institusi pendidikan yang berfokus pada Link and Match dengan industri...\r\n    </p>\r\n\r\n    <p data-translate=\"deep-p5\">\r\n      Para peserta terlihat antusias mengikuti diskusi...\r\n    </p>\r\n\r\n    <p data-translate=\"deep-p6\">\r\n      <b>Ke Depan: Rangkaian Kegiatan Pengabdian Masyarakat</b><br>\r\n      Polmind berencana melanjutkan rangkaian kegiatan serupa...\r\n    </p>\r\n\r\n    <p data-translate=\"deep-p7\">\r\n      Dengan suksesnya acara ini, Polmind semakin menegaskan komitmennya...<br>\r\n      #Polmind #DeepLearning #WikanSakarinto #SMKHebat #PengabdianMasyarakat #VokasiKuat\r\n    </p>',1,751,'2026-10-02 17:33:56','2026-10-02 17:53:17'),(7,'Politeknik Mitra Industri Jalin Sinergi Strategis dengan Kementerian Ketenagakerjaan Republik Indonesia','polmind-dengan-kementerian','kerjasama',3,'Administrator','2025-05-19','assets/images/news/kunjungan-kementrian.jpg','Dalam upaya memperkuat link and match antara dunia pendidikan vokasi dan kebutuhan pasar kerja, Pendiri dan Pimpinan Politeknik...','<p data-translate=\"kemnaker-p1\">\r\n      Dalam upaya memperkuat <i>link and match</i> antara dunia pendidikan vokasi dan kebutuhan pasar kerja, Pendiri dan Pimpinan Politeknik Mitra Industri (Polmind) melakukan kunjungan kerja penting ke Kementerian Ketenagakerjaan Republik Indonesia. Kunjungan ini menandai babak baru kolaborasi strategis dalam menyiapkan tenaga kerja terampil yang kompetitif dan siap menghadapi tantangan industri 4.0.\r\n    </p>\r\n    <br>\r\n\r\n    <p data-translate=\"kemnaker-p2-intro\">\r\n      Fokus Kunjungan Kerja<br>\r\n      Delegasi Polmind melakukan pertemuan produktif dengan menteri ketenagakerjaan Bapak Yassierli beserta jajaran. Diskusi strategis berfokus pada:\r\n    </p>\r\n    <ul class=\"ml20\">\r\n      <li data-translate=\"kemnaker-p2-li1\">Penyelarasan kurikulum dengan kebutuhan pasar tenaga kerja nasional.</li>\r\n      <li data-translate=\"kemnaker-p2-li2\">Sertifikasi kompetensi berbasis SKKNI (Standar Kompetensi Kerja Nasional Indonesia).</li>\r\n      <li data-translate=\"kemnaker-p2-li3\">Program pelatihan vokasi melalui pelibatan dunia industri.</li>\r\n      <li data-translate=\"kemnaker-p2-li4\">Penempatan kerja lulusan melalui sistem informasi ketenagakerjaan.</li>\r\n      <li data-translate=\"kemnaker-p2-li5\">Pengembangan Teaching Factory sebagai pusat pelatihan berbasis produksi.</li>\r\n    </ul>\r\n    <br>\r\n\r\n    <p data-translate=\"kemnaker-p3\">\r\n      Komitmen Bersama<br>\r\n      \"Kolaborasi dengan Kemnaker ini merupakan langkah konkrit Polmind dalam mewujudkan lulusan yang tidak hanya tersertifikasi tetapi juga terserap optimal di dunia kerja\".\r\n    </p>\r\n\r\n    <p data-translate=\"kemnaker-p4-intro\">\r\n      Adapun beberapa program prioritas yang akan segera diimplementasikan:\r\n    </p>\r\n    <ul class=\"ml20\">\r\n      <li data-translate=\"kemnaker-p4-li1\">Penyelenggaraan Uji Kompetensi berbasis lisensi profesi</li>\r\n      <li data-translate=\"kemnaker-p4-li2\">Magang bersertifikat dengan dukungan program pemerintah</li>\r\n      <li data-translate=\"kemnaker-p4-li3\">Pelatihan instruktur berstandar BNSP</li>\r\n      <li data-translate=\"kemnaker-p4-li4\">Job matching system terintegrasi dengan platform Kemnaker</li>\r\n    </ul>',1,444,'2026-10-02 17:33:56','2026-10-02 17:53:17'),(8,'Politeknik Mitra Industri Perluas Jejaring Internasional dengan Kunjungan ke Universitas Ternama di Jepang','polmind-perluas-jejaring-internasional-ke-jepang','kerjasama',3,'Administrator','2025-05-08','assets/images/images06.jpeg','Dalam rangka memperkuat kolaborasi pendidikan vokasi bertaraf global, Pendiri dan Pimpinan Politeknik Mitra Industri melakukan kunjungan ke universitas terkemuka di Jepang...','<p data-translate=\"jepang-p1\">\r\n      Dalam rangka memperkuat kolaborasi pendidikan vokasi bertaraf global, Pendiri dan Pimpinan Politeknik Mitra Industri (Polmind) melakukan kunjungan kerja sejumlah Universitas ternama di Jepang. Kunjungan ini merupakan langkah strategis untuk membangun kemitraan akademik, pertukaran teknologi, dan penyelarasan kurikulum yang relevan dengan kebutuhan industri masa depan.\r\n    </p>\r\n\r\n    <p data-translate=\"jepang-p2\">\r\n      Tujuan kunjungan para pendiri dan pimpinan Polmind mengunjungi beberapa perguruan tinggi terkemuka di Jepang untuk:\r\n    </p>\r\n\r\n    <ul class=\"ml20\">\r\n      <li data-translate=\"jepang-li1\">Memperluas kerja sama pertukaran mahasiswa dan dosen melalui student exchange program dan joint research.</li>\r\n      <li data-translate=\"jepang-li2\">Mengadopsi praktik terbaik pendidikan vokasi berbasis industri ala Jepang.</li>\r\n      <li data-translate=\"jepang-li3\">Menyinergikan kurikulum dengan standar kompetensi global.</li>\r\n      <li data-translate=\"jepang-li4\">Membangun riset bersama di bidang strategis seperti manufacturing, digital transformation, dan green technology.</li>\r\n    </ul>\r\n\r\n    <p class=\"mt15\" data-translate=\"jepang-p3\">\r\n      Komitmen Polmind terhadap Pendidikan Vokasi Kelas Dunia — “Kolaborasi dengan Universitas Jepang adalah bukti keseriusan Polmind dalam mencetak lulusan yang tidak hanya kompeten di tingkat nasional, tetapi juga bersaing di kancah internasional.”\r\n    </p>\r\n\r\n    <p class=\"mt15\" data-translate=\"jepang-p4\">\r\n      Jepang dipilih sebagai mitra karena reputasinya dalam:\r\n    </p>\r\n\r\n    <ul class=\"ml20\">\r\n      <li data-translate=\"jepang-li5\">Pendidikan vokasi terintegrasi industri (Monozukuri budaya kerja presisi).</li>\r\n      <li data-translate=\"jepang-li6\">Inovasi teknologi dan kedisiplinan yang menjadi acuan dunia.</li>\r\n      <li data-translate=\"jepang-li7\">Jaringan perusahaan global yang dapat membuka peluang magang bagi mahasiswa Polmind.</li>\r\n    </ul>\r\n\r\n    <p class=\"mt15\" data-translate=\"jepang-p5\">\r\n      Dampak bagi Mahasiswa Polmind — Kerja sama ini akan memberikan manfaat langsung seperti:\r\n    </p>\r\n\r\n    <ul class=\"ml20\">\r\n      <li data-translate=\"jepang-li8\">Kesempatan magang di perusahaan Jepang melalui program internship.</li>\r\n      <li data-translate=\"jepang-li9\">Beasiswa dan program double degree bagi mahasiswa berprestasi.</li>\r\n      <li data-translate=\"jepang-li10\">Pengembangan soft skills ala Jepang: etos kerja, manajemen proyek, dan problem-solving.</li>\r\n    </ul>',1,299,'2026-10-02 17:33:56','2026-10-02 17:53:17'),(9,'Politeknik Mitra Industri Resmi Luncurkan Teaching Factory (TEFA) Bidang Konsultan Bisnis dan Engineering','polmind-luncurkan-tefa-konsultan','prestasi',2,'Administrator','2025-02-20','assets/images/news/berita-peresmian-tefa.jpg','Politeknik Mitra Industri dengan bangga mengumumkan peluncuran Teaching Factory (TEFA) Konsultan Bisnis dan Engineering...','<p data-translate=\"tefa-p1\">\r\n      Politeknik Mitra Industri dengan bangga mengumumkan peluncuran Teaching Factory (TEFA) Konsultan Bisnis dan\r\n      Engineering, sebagai wujud nyata komitmen kami dalam menghadirkan pendidikan vokasi yang berorientasi pada\r\n      kebutuhan industri dan dunia usaha.\r\n    </p>\r\n\r\n    <p data-translate=\"tefa-p2\">\r\n      <b>Apa Itu TEFA Polmind?</b><br>\r\n      Teaching Factory (TEFA) merupakan konsep pembelajaran berbasis produksi dan layanan jasa profesional yang\r\n      memadukan pengalaman praktis, pengembangan bisnis, dan solusi <i>engineering</i>. Melalui TEFA ini, mahasiswa\r\n      tidak hanya belajar teori, tetapi juga terlibat langsung dalam proyek nyata bersama mitra industri, mulai dari\r\n      konsultasi bisnis, analisis pasar, hingga penyelesaian masalah <i>engineering</i>.\r\n    </p>\r\n\r\n    <p data-translate=\"tefa-p3\">\r\n      <b>Fokus Layanan TEFA Polmind:</b>\r\n    </p>\r\n\r\n    <ul class=\"ml20\">\r\n      <li data-translate=\"tefa-li1\">\r\n        Konsultan Bisnis: Analisis pasar, pengembangan UMKM, strategi pemasaran digital, dan perencanaan bisnis.\r\n      </li>\r\n      <li data-translate=\"tefa-li2\">\r\n        Konsultan <i>Engineering</i>: Solusi teknik terapan, desain produk, optimasi produksi, dan rekayasa industri.\r\n      </li>\r\n      <li data-translate=\"tefa-li3\">\r\n        Kolaborasi Industri: Projek riil bersama mitra usaha dan pelaku industri.\r\n      </li>\r\n    </ul>\r\n\r\n    <p class=\"mt15\" data-translate=\"tefa-p4\">\r\n      \"TEFA ini menjadi wadah bagi mahasiswa untuk mengasah kompetensi sekaligus memberikan kontribusi nyata bagi dunia\r\n      usaha. Kami ingin menciptakan lulusan yang tidak hanya siap kerja, tetapi juga mampu menciptakan lapangan kerja,\".\r\n    </p>\r\n\r\n    <br>\r\n\r\n    <p data-translate=\"tefa-p5\">\r\n      <b>Dampak bagi Mahasiswa & Mitra Industri:</b>\r\n    </p>\r\n\r\n    <ul class=\"ml20\">\r\n      <li data-translate=\"tefa-li4\">\r\n        Mahasiswa: Pengalaman kerja nyata sebelum lulus, portofolio proyek, dan jaringan industri.\r\n      </li>\r\n      <li data-translate=\"tefa-li5\">\r\n        Industri & UMKM: Akses terhadap solusi inovatif berbasis <i>engineering</i> dan bisnis dengan pendampingan\r\n        ahli.\r\n      </li>\r\n      <li data-translate=\"tefa-li6\">\r\n        TEFA Polmind siap menjadi jembatan antara dunia pendidikan dan industri, sekaligus memperkuat ekosistem\r\n        kewirausahaan di Indonesia.\r\n      </li>\r\n    </ul>',1,260,'2026-10-02 17:33:56','2026-10-02 17:53:17');
/*!40000 ALTER TABLE `beritas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Umum','umum','Kategori berita umum seputar kampus dan perkuliahan.','2026-10-02 17:53:17','2026-10-02 17:53:17'),(2,'Prestasi','prestasi','Kategori berita pencapaian, inovasi, dan prestasi.','2026-10-02 17:53:17','2026-10-02 17:53:17'),(3,'Kerjasama','kerjasama','Kategori berita kemitraan industri dan internasional.','2026-10-02 17:53:17','2026-10-02 17:53:17'),(4,'Beasiswa & Karir','beasiswa-karir',NULL,'2026-10-02 17:56:31','2026-10-02 17:56:31');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `founder_experts`
--

DROP TABLE IF EXISTS `founder_experts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `founder_experts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `founder_experts`
--

LOCK TABLES `founder_experts` WRITE;
/*!40000 ALTER TABLE `founder_experts` DISABLE KEYS */;
INSERT INTO `founder_experts` VALUES (1,'Yoshihiro Kobi','Pendiri Kawasan Industri MM2100','assets/images/profil/kobi.jpg',1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(2,'Darwoto','Pengelola Kawasan Industri MM2100','assets/images/profil/darwoto.jpg',2,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(3,'Lispiyatmini','Jajaran Pimpinan industri dalam Kawasan Industri MM2100','assets/images/profil/lispiyatmini.jpg',3,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(4,'Musfir','Jajaran Pimpinan industri dalam Kawasan Industri MM2100','assets/images/profil/musfir.jpg',4,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(5,'Wikan Sakarinto','Direktur Politeknik Mitra Industri\nDirjen Vokasi Kemendikbudristek RI (2020-2022)\nDekan SV-UGM (2016-2020)','assets/images/profil/wikan.jpg',5,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(6,'Joko Baroto','Wakil Direktur Politeknik Mitra Industri\nExecutive Officer, PT. Daihatsu Drivetrain Manufacturing Indonesia','assets/images/profil/joko.jpg',6,'2026-10-02 17:33:56','2026-10-02 17:33:56');
/*!40000 ALTER TABLE `founder_experts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grid_features`
--

DROP TABLE IF EXISTS `grid_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grid_features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grid_features`
--

LOCK TABLES `grid_features` WRITE;
/*!40000 ALTER TABLE `grid_features` DISABLE KEYS */;
INSERT INTO `grid_features` VALUES (1,'Dikembangkan di dalam Kawasan Industri MM2100, dikelilingi ratusan industri ternama.','assets/images-new/images02.jpg',1,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(2,'Didirikan oleh para expert dan praktisi industri & pendidikan.','assets/images-new/images03.jpg',2,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(3,'Kurikulum disusun bersama dengan pihak industri.','assets/images-new/images04.jpg',3,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(4,'Berpengalaman mengirimkan SDM berkualitas ke luar negeri (Jepang dan Jerman).','assets/images-new/images05.jpg',4,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(5,'Komite terdiri dari expert dan profesional industri.','assets/images-new/images06.jpg',5,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(6,'Telah menjalin kerja sama dengan Universitas bereputasi di Jepang.','assets/images-new/images07.jpg',6,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(7,'⁠Kuliahnya tidak kaku dan konvensional hanya di ruang kelas.','assets/images-new/images08.jpg',7,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(8,'Menerapkan TEFA (Teaching Factory) dan PjBL (Project-based Learning) yang riil.','assets/images-new/images09.jpg',8,1,'2026-10-02 17:33:56','2026-10-02 17:33:56');
/*!40000 ALTER TABLE `grid_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturers`
--

DROP TABLE IF EXISTS `lecturers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecturers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'internal',
  `photo` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturers`
--

LOCK TABLES `lecturers` WRITE;
/*!40000 ALTER TABLE `lecturers` DISABLE KEYS */;
INSERT INTO `lecturers` VALUES (1,'Wikan Sakarinto, S.T., M.Sc., Ph.D.','Direktur Polmind','internal','assets/images/daftar_dosen/internal/wikan.jpg',1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(2,'Ardiansyah, S.E., M.M.','Dosen BD','internal','assets/images/daftar_dosen/internal/baru/ardiansyah.jpg',2,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(3,'Arfiyan, S.Tr. Ak., M.Ak.','Dosen BD','internal','assets/images/daftar_dosen/internal/baru/arfiyan.jpeg',3,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(4,'Lukluk Ilmatul Khairi, S.E., M.Sc.','Dosen BD','internal','assets/images/daftar_dosen/internal/baru/lukluk_.jpg',4,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(5,'Nadia Rizky Fadilla, S.Sos., M.Si.','Dosen BD','internal','assets/images/daftar_dosen/internal/baru/nadia.jpg',5,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(6,'Yudikha Andalantama, S.Kom., M.Kom.','Dosen BD','internal','assets/images/daftar_dosen/internal/baru/yudikha.jpg',6,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(7,'Ir. Ricky Wiranata, S.T., M.T.','Dosen TRM','internal','assets/images/daftar_dosen/internal/baru/ricky.jpg',7,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(8,'Surya Insano, S.T., M.Eng.','Dosen TRM','internal','assets/images/daftar_dosen/internal/surya.jpg',8,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(9,'Yusuf Ahmad, S.T., M.Eng.','Dosen TRM','internal','assets/images/daftar_dosen/internal/baru/yusuf.jpg',9,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(10,'Yudhistira Adityawardhana, S.T., M.T., Ph.D.','Dosen TRM','internal','assets/images/daftar_dosen/internal/baru/yudhistira.jpg',10,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(11,'Billy Nugraha, S.T., M.T.','Dosen TRM','internal','assets/images/daftar_dosen/internal/baru/billy.jpg',11,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(12,'Rian Dwi Ariandi, S.T., M.T.','Dosen TRM','internal','assets/images/daftar_dosen/internal/baru/rian.jpg',12,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(13,'Ahmad Maulid Ridwan, S.Kom., M.Kom.','Dosen TRPL','internal','assets/images/daftar_dosen/internal/baru/ahmad.jpg',13,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(14,'Ainayah Syifa Hendri, S.Kom., M.Kom.','Dosen TRPL','internal','assets/images/daftar_dosen/internal/baru/syifa.jpg',14,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(15,'Cahya Ramdan Syah, S.Kom., M.Kom.','Dosen TRPL','internal','assets/images/daftar_dosen/internal/baru/cahya.jpg',15,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(16,'Rojakul, S.Kom., M.Kom.','Dosen TRPL','internal','assets/images/daftar_dosen/internal/baru/rojakul.jpg',16,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(17,'Wahyu Arief Budiman, S.Kom., M.T.I.','Dosen TRPL','internal','assets/images/daftar_dosen/internal/baru/arief1.png',17,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(18,'Ir. Joko Baroto','Executive Officer PT DDMI','industri','assets/images/daftar_dosen/expert/joko.jpg',18,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(19,'Agus Razmajaya, S.H.','Executive Senior Staff PT Namicoh Indonesia Component','industri','assets/images/daftar_dosen/expert/agus.jpg',19,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(20,'Dr. Dasep Suryanto, AT., S.H., M.M., M.I.Kom., Ph.D(C)','President Director of Bisa Jaya Indonesia','industri','assets/images/daftar_dosen/expert/dasep_suryanto.jpg',20,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(21,'Denny Herjaman, S.S.','President Director of PT. Aditya Creatives Manufacturing','industri','assets/images/daftar_dosen/expert/denny.jpg',21,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(22,'Effendi, S.E.','Director of PT. Diamond Electric Mfg Indonesia','industri','assets/images/daftar_dosen/expert/effendi.jpg',22,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(23,'Dr. Sutopoh, M.M.','Consultant at EM Institute Indonesia, Headmaster of Nozomy Academy','industri','assets/images/daftar_dosen/expert/sutopoh.jpg',23,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(24,'Totok Edy Purwanto','Regional HR Director, Southeast Asia','industri','assets/images/daftar_dosen/expert/toto.jpg',24,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(25,'Dr. Tutut Handayani, M.Psi.','Psychologist','industri','assets/images/daftar_dosen/expert/tutut.jpg',25,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(26,'Vidi Christianto, A.Md.','General Manager PT. Roki Indonesia, Chairman FKKSM MM2100 HR Forum','industri','assets/images/daftar_dosen/expert/vidi.jpg',26,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(27,'Drs. Yayat Ruhimat','HR, GA & Utility Manager, PT. WOOIN','industri','assets/images/daftar_dosen/expert/yayat.jpg',27,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(28,'Rezky Nurrohman Andrianto, S.T.','Instruktur Otomasi','instruktur','assets/images/daftar_dosen/instruktur/rezky.jpg',28,'2026-10-02 17:33:56','2026-10-02 17:33:56');
/*!40000 ALTER TABLE `lecturers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_10_03_003046_create_beritas_table',2),(5,'2026_10_03_003046_create_grid_features_table',2),(6,'2026_10_03_003046_create_lecturers_table',2),(7,'2026_10_03_003046_create_sliders_table',2),(8,'2026_10_03_003047_create_founder_experts_table',2),(9,'2026_10_03_003047_create_site_settings_table',2),(10,'2026_10_03_003047_create_staff_table',2),(11,'2026_10_03_005159_create_categories_table',3),(12,'2026_10_03_005200_add_category_id_to_beritas_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'site_title','POLITEKNIK MITRA INDUSTRI','general','2026-10-02 17:33:56','2026-10-02 17:33:56'),(2,'contact_email','info@polmind.ac.id','contact','2026-10-02 17:33:56','2026-10-02 17:33:56'),(3,'contact_phone','+62 821-1329-6897','contact','2026-10-02 17:33:56','2026-10-02 17:33:56'),(4,'contact_whatsapp','6282113296897','contact','2026-10-02 17:33:56','2026-10-02 17:33:56'),(5,'contact_address','Kawasan Industri MM2100','contact','2026-10-02 17:33:56','2026-10-02 17:33:56'),(6,'gmaps_iframe','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.9027092193342!2d107.08309836648712!3d-6.289287568565989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f292b17f9b9%3A0xa3f25862f022169c!2sPoliteknik%20Mitra%20Industri!5e0!3m2!1sid!2sid!4v1763609292143!5m2!1sid!2sid\" width=\"100%\" height=\"150\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>','contact','2026-10-02 17:33:56','2026-10-02 17:33:56'),(7,'director_name','Wikan Sakarinto, S.T., M.Sc., Ph.D.','sambutan','2026-10-02 17:33:56','2026-10-02 17:33:56'),(8,'director_title','Direktur Politeknik Mitra Industri','sambutan','2026-10-02 17:33:56','2026-10-02 17:33:56'),(9,'director_photo','assets/images/sambutan.png','sambutan','2026-10-02 17:33:56','2026-10-02 17:33:56'),(10,'director_message','Mari bergabung dengan Polmind, mencetak SDM/lulusan unggul dan berdaya saing global untuk Indonesia yang lebih baik. Kuliahnya tidak boring, lebih banyak praktik daripada teori, karena menerapkan Project-based Learning (PjBL) riil & kontekstual, bersama mitra industri/perusahaan, baik di dalam kawasan MM2100 maupun di luar kawasan. Pola ini, yaitu Teaching Factory (TEFA), men-trigger skills inovasi dan problem solving, untuk mencetak karakter dan life skills kuat. Serta, Polmind sangat concern pada kerjasama dengan kampus dan perusahaan dari luar negeri.','sambutan','2026-10-02 17:33:56','2026-10-02 17:33:56'),(11,'pmb_cta_text','Pendaftaran Mahasiswa Baru 2026 (KLIK DISINI)','pmb','2026-10-02 17:33:56','2026-10-02 17:33:56'),(12,'pmb_cta_link','/pmb','pmb','2026-10-02 17:33:56','2026-10-02 17:33:56'),(13,'pmb_banner_image','assets/images/why_polmind_ok.png','pmb','2026-10-02 17:33:56','2026-10-02 17:33:56'),(14,'pmb_popup_image','assets/images/perpanjangan_gel4.jpeg','pmb','2026-10-02 17:33:56','2026-10-02 17:33:56'),(15,'pmb_popup_enabled','0','pmb','2026-10-02 17:33:56','2026-10-02 17:33:56'),(16,'profil_decree','Berdasarkan Keputusan Mentri DIKTI SAINTEK No 324/B/O/2025','profil','2026-10-02 17:33:56','2026-10-02 17:33:56'),(17,'profil_vision','Menjadi kampus terapan unggulan berstandar global yang menghasilkan lulusan profesional, berkarakter, dan siap kerja melalui pembelajaran kontekstual berbasis industri dan nilai-nilai luhur.','profil','2026-10-02 17:33:56','2026-10-02 17:33:56'),(18,'profil_missions','Menyelenggarakan pendidikan terapan berbasis industri melalui Teaching Factory dan Project-Based Learning.\nMenyusun kurikulum bersama praktisi untuk memenuhi kebutuhan dunia kerja.\nMembentuk lulusan berkarakter, siap kerja, dan berdaya saing global.\nMenumbuhkan semangat kewirausahaan dalam lingkungan kampus.\nMembangun kemitraan strategis dengan industri nasional dan internasional.','profil','2026-10-02 17:33:56','2026-10-02 17:33:56'),(19,'profil_banner','assets/images/b_profil.png','profil','2026-10-02 17:33:56','2026-10-02 17:33:56'),(20,'footer_copyright','© 2025 Yayasan Mitra Global Mandiri','footer','2026-10-02 17:33:56','2026-10-02 17:33:56'),(21,'pmb_hero_badge','PMB Gelombang I Akan Segera Dibuka','pmb','2026-10-02 19:00:32','2026-10-02 20:36:46'),(22,'pmb_hero_title','Lebih dari Sekadar Kuliah, \r\nKami adalah Inkubator Talenta Global!','pmb','2026-10-02 19:00:32','2026-10-02 20:20:01'),(23,'pmb_hero_subtitle','Politeknik Mitra Industri hadir dengan konsep Teaching Factory yang revolusioner, mempersiapkanmu menjadi profesional handal dan membuka pintu karir impianmu baik didalam ataupun diluar negeri. Bergabunglah dengan kami dan ukir kisah suksesmu di panggung dunia!','pmb','2026-10-02 19:00:32','2026-10-02 20:36:47'),(24,'pmb_register_url','https://siakad.polmind.ac.id/spmbfront','pmb','2026-10-02 19:00:32','2026-10-02 19:00:32'),(25,'pmb_academic_year','2027/2028','pmb','2026-10-02 19:00:32','2026-10-02 20:20:01'),(26,'pmb_page_title','Pendaftaran Mahasiswa Baru Tahun 2027','pmb','2026-10-02 19:00:32','2026-10-02 20:20:01'),(27,'pmb_intro_text','Selamat datang di laman resmi Pendaftaran Mahasiswa Baru (PMB) POLITEKNIK MITRA INDUSTRI (POLMIND). Kami membuka kesempatan bagi lulusan SMA/SMK/MA sederajat untuk bergabung menjadi bagian dari institusi kami. Silakan simak informasi penting berikut ini sebelum mengisi formulir pendaftaran.','pmb','2026-10-02 19:00:32','2026-10-02 19:00:42'),(28,'pmb_batches','[{\"id\":1,\"name\":\"Gelombang I\",\"status\":\"upcoming\",\"status_label\":\"Akan Datang\",\"is_active\":true,\"active_step\":0,\"date_reg\":\"2 Nov 2026 - 2 Apr 2027\",\"date_exam\":\"3 April 2027\",\"date_announcement\":\"6 April 2027\",\"date_rereg\":\"6 - 16 April 2027\"},{\"id\":2,\"name\":\"Gelombang II\",\"status\":\"upcoming\",\"status_label\":\"Akan Datang\",\"is_active\":false,\"active_step\":0,\"date_reg\":\"5 April - 4 Juni 2027\",\"date_exam\":\"5 Juni 2027\",\"date_announcement\":\"9 Juni 2027\",\"date_rereg\":\"9 - 18 Juni 2027\"},{\"id\":3,\"name\":\"Gelombang III\",\"status\":\"upcoming\",\"status_label\":\"Akan Datang\",\"is_active\":false,\"active_step\":0,\"date_reg\":\"7 Juni - 30 Juli 2027\",\"date_exam\":\"31 Juli 2027\",\"date_announcement\":\"3 Agustus 2027\",\"date_rereg\":\"3 - 13 Agustus 2027\"},{\"id\":4,\"name\":\"Gelombang IV\",\"status\":\"upcoming\",\"status_label\":\"Akan Datang\",\"is_active\":false,\"active_step\":0,\"date_reg\":\"2 Agt - 3 Sep 2027\",\"date_exam\":\"4 September 2027\",\"date_announcement\":\"8 September 2027\",\"date_rereg\":\"8 - 17 September 2027\"}]','pmb','2026-10-02 19:00:37','2026-10-02 20:47:21'),(29,'pmb_class_start_date','13 September 2027','pmb','2026-10-02 19:00:42','2026-10-02 20:48:26'),(30,'pmb_class_start_sub','Semester Ganjil TA 2027/2028','pmb','2026-10-02 19:00:42','2026-10-02 20:49:10'),(31,'pmb_open_programs_title','Sarjana Terapan (D4)','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(32,'pmb_open_programs_sub','TRM • Bisnis Digital • TRPL (Teaching Factory)','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(33,'pmb_requirements','Pas Foto Formal Terbaru\nScan KTP (Kartu Tanda Penduduk)\nScan Kartu Keluarga (KK)\nScan Ijazah atau SKL SMA/SMK/MA/Sederajat\nScan Transkrip Nilai / Rapor\nScan Sertifikat Penghargaan (jika ada)','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(34,'pmb_fees','[{\"id\":1,\"name\":\"Gelombang I\",\"is_recommended\":true,\"saving_badge\":\"Hemat 50%\",\"form_fee\":\"Rp 300.000\",\"spi_original\":\"Rp 15.000.000\",\"spi_discounted\":\"Rp 7.500.000\",\"spi_note\":\"Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)\",\"ukt_fee\":\"Rp 6.000.000\",\"ukt_note\":\"Dibayarkan setelah lolos seleksi (per Semester)\",\"total_fee\":\"Rp 13.800.000\",\"chart_value\":\"Rp 7,5 Jt\",\"chart_height\":\"55\"},{\"id\":2,\"name\":\"Gelombang II\",\"is_recommended\":false,\"saving_badge\":\"Hemat 40%\",\"form_fee\":\"Rp 300.000\",\"spi_original\":\"Rp 15.000.000\",\"spi_discounted\":\"Rp 9.000.000\",\"spi_note\":\"Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)\",\"ukt_fee\":\"Rp 6.000.000\",\"ukt_note\":\"Dibayarkan setelah lolos seleksi (per Semester)\",\"total_fee\":\"Rp 15.300.000\",\"chart_value\":\"Rp 9,0 Jt\",\"chart_height\":\"70\"},{\"id\":3,\"name\":\"Gelombang III\",\"is_recommended\":false,\"saving_badge\":\"\",\"form_fee\":\"Rp 300.000\",\"spi_original\":\"Rp 15.000.000\",\"spi_discounted\":\"Rp 10.000.000\",\"spi_note\":\"Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)\",\"ukt_fee\":\"Rp 6.000.000\",\"ukt_note\":\"Dibayarkan setelah lolos seleksi (per Semester)\",\"total_fee\":\"Rp 16.300.000\",\"chart_value\":\"Rp 10,0 Jt\",\"chart_height\":\"82\"},{\"id\":4,\"name\":\"Gelombang IV\",\"is_recommended\":false,\"saving_badge\":\"\",\"form_fee\":\"Rp 300.000\",\"spi_original\":\"Rp 15.000.000\",\"spi_discounted\":\"Rp 12.000.000\",\"spi_note\":\"Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)\",\"ukt_fee\":\"Rp 6.000.000\",\"ukt_note\":\"Dibayarkan setelah lolos seleksi (per Semester)\",\"total_fee\":\"Rp 18.300.000\",\"chart_value\":\"Rp 12,0 Jt\",\"chart_height\":\"98\"}]','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(35,'pmb_fee_subtitle','Transparan dan terjangkau. Biaya SPI dan UKT dibayarkan setelah pendaftar dinyatakan resmi diterima / lolos seleksi.','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(36,'pmb_fee_notice','Biaya SPI & UKT dibayarkan setelah pendaftar berstatus lolos / diterima sebagai mahasiswa baru.','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(37,'pmb_chart_title','Grafik Biaya SPI per Gelombang','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(38,'pmb_chart_desc','Daftar lebih awal di Gelombang I untuk mendapatkan beasiswa keringanan biaya hingga Rp 7.500.000,-','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(39,'pmb_notes','Biaya formulir pendaftaran (Rp 300.000) dibayarkan di awal saat pengisian formulir pendaftaran online.\nKetentuan Pembayaran SPI & UKT: Biaya SPI (Sumbangan Pengembangan Institusi) dan UKT (Uang Kuliah Tunggal) hanya dibayarkan setelah calon mahasiswa dinyatakan DITERIMA atau berstatus LOLOS seleksi sebagai mahasiswa baru Politeknik Mitra Industri.\nBesaran beasiswa keringanan biaya studi (SPI) berlaku sesuai periode gelombang saat calon mahasiswa mendaftar dan menyelesaikan registrasi.\nSeluruh transaksi dan pembayaran resmi hanya dilakukan melalui saluran Virtual Account resmi atas nama Politeknik Mitra Industri. Hati-hati terhadap penipuan yang mengatasnamakan panitia PMB.','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(40,'pmb_cta_title','Siap Menjadi Bagian dari Talenta Global Berstandar Industri?','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(41,'pmb_cta_desc','Untuk melanjutkan proses pendaftaran, silakan klik tombol Daftar yang tersedia di bawah ini. Kuota penerimaan mahasiswa baru terbatas untuk memastikan kualitas pembelajaran Teaching Factory dan magang industri.','pmb','2026-10-02 19:00:42','2026-10-02 19:00:42'),(42,'pmb_fee_coming_soon','1','pmb','2026-10-02 20:24:49','2026-10-02 20:25:24'),(43,'pmb_fee_coming_soon_badge','Segera Diumumkan / Coming Soon','pmb','2026-10-02 20:29:58','2026-10-02 20:29:58'),(44,'pmb_fee_coming_soon_title','Informasi Biaya Perkuliahan Akan Segera Diumumkan','pmb','2026-10-02 20:29:58','2026-10-02 20:29:58'),(45,'pmb_fee_coming_soon_desc','Rincian pembiayaan studi (SPI & UKT) untuk Tahun Akademik 2027/2028 saat ini sedang dalam proses penetapan oleh pimpinan institusi Politeknik Mitra Industri. Calon mahasiswa dipersilakan melakukan pendaftaran terlebih dahulu mengikuti jadwal gelombang yang telah dibuka.','pmb','2026-10-02 20:29:58','2026-10-02 20:29:58');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'Kampus Polmind Vasanta Innopark Kawasan Industri MM2100','assets/images/slider/polmind_vasanta.png',NULL,1,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(2,'Didirikan di dalam Kawasan Industri MM2100, Bekasi Dalam naungan MITRA INDUSTRI GROUP','assets/images/slider6.jpg',NULL,2,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(3,'Didirikan oleh Expert dan Profesional Industri','assets/images/slider2.png',NULL,3,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(4,'Di dalam MM2100 – Kawasan industri terbesar se-Asia Tenggara','assets/images/slider3.png',NULL,4,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(5,'Kampus kreatif, profesional, dengan spirit entrepreneural unggul.','assets/images/slider4.png',NULL,5,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(6,'Teaching Factory (TEFA)','assets/images/slider5.png',NULL,6,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(7,'Inaugurasi Orientasi Mahasiswa Baru (PERKASA) 2025','assets/images/slider/slider15.png',NULL,7,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(8,'Kerjasama dengan industri-industri di Kawasan MM2100','assets/images/slider/slider16.png',NULL,8,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(9,'Kerjasama dengan Liuzhou Polytechnic, LZPU, China','assets/images/slider/slider17.png',NULL,9,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(10,'Kuliah Umum bersama KADIN & APINDO','assets/images/slider/slider18.png',NULL,10,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(11,'Mahasiswa persentasi progres TEFA didepan konsumen','assets/images/slider/slider19.png',NULL,11,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(12,'Mahasiswa Praktek Syuting membuat konten/video kreatif','assets/images/slider/slider21.png',NULL,12,1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(13,'Kerjasama dengan Ehime University, Japan','assets/images/slider/slider22.png',NULL,13,1,'2026-10-02 17:33:56','2026-10-02 17:33:56');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Adnandhika Ramadhani Dewanto, S.Kom.','Admin Akademik','assets/images/daftar_dosen/internal/baru/adnan.jpg',1,'2026-10-02 17:33:56','2026-10-02 17:33:56'),(2,'Nurul Salma, S.IP.','Pustakawan','assets/images/daftar_dosen/internal/baru/nurul.jpg',2,'2026-10-02 17:33:56','2026-10-02 17:33:56');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator Polmind','admin@polmind.ac.id','2026-10-02 17:33:55','$2y$12$A1RHtT/VDlNT0HGf2MmyL.req8ZxQbhGprHIQ.OgGUXMiO9M3ri76','zjWVb7AdZdonaJedlrrZpfU621ySODW2cvczj6LRhFO7dtuH7vBQHucMgMoB','2026-10-02 17:33:56','2026-10-02 17:33:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-03 11:37:21
