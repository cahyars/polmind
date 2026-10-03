<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PmbController extends Controller
{
    /**
     * Default PMB values
     */
    public static function getDefaultData(): array
    {
        return [
            // 1. Hero & General
            'pmb_hero_badge' => 'PMB Gelombang I Sedang Dibuka',
            'pmb_hero_title' => "Lebih dari Sekadar Kuliah, \nKami adalah Inkubator Talenta Global!",
            'pmb_hero_subtitle' => 'Politeknik Mitra Industri hadir dengan konsep Teaching Factory yang revolusioner, mempersiapkanmu menjadi profesional handal dan membuka pintu karir impianmu di Jepang. Bergabunglah dengan kami dan ukir kisah suksesmu di panggung dunia!',
            'pmb_register_url' => 'https://siakad.polmind.ac.id/spmbfront',
            'pmb_academic_year' => '2026/2027',
            'pmb_page_title' => 'Pendaftaran Mahasiswa Baru Tahun 2026/2027',
            'pmb_intro_text' => 'Selamat datang di laman resmi Pendaftaran Mahasiswa Baru (PMB) POLITEKNIK MITRA INDUSTRI (POLMIND). Kami membuka kesempatan bagi lulusan SMA/SMK/MA sederajat untuk bergabung menjadi bagian dari institusi kami. Silakan simak informasi penting berikut ini sebelum mengisi formulir pendaftaran.',

            // 2. Batches (Jadwal Gelombang)
            'pmb_batches' => json_encode([
                [
                    'id' => 1,
                    'name' => 'Gelombang I',
                    'status' => 'buka',
                    'status_label' => 'BUKA',
                    'is_active' => true,
                    'active_step' => 2, // 1: Pendaftaran, 2: Ujian Seleksi, 3: Pengumuman, 4: Daftar Ulang
                    'date_reg' => '3 Nov 2025 - 3 Apr 2026',
                    'date_exam' => '4 April 2026',
                    'date_announcement' => '7 April 2026',
                    'date_rereg' => '7 - 17 April 2026',
                ],
                [
                    'id' => 2,
                    'name' => 'Gelombang II',
                    'status' => 'upcoming',
                    'status_label' => 'Akan Datang',
                    'is_active' => false,
                    'active_step' => 0,
                    'date_reg' => '6 April - 5 Juni 2026',
                    'date_exam' => '6 Juni 2026',
                    'date_announcement' => '10 Juni 2026',
                    'date_rereg' => '10 - 19 Juni 2026',
                ],
                [
                    'id' => 3,
                    'name' => 'Gelombang III',
                    'status' => 'upcoming',
                    'status_label' => 'Akan Datang',
                    'is_active' => false,
                    'active_step' => 0,
                    'date_reg' => '7 Juni - 31 Juli 2026',
                    'date_exam' => '1 Agustus 2026',
                    'date_announcement' => '4 Agustus 2026',
                    'date_rereg' => '4 - 14 Agustus 2026',
                ],
                [
                    'id' => 4,
                    'name' => 'Gelombang IV',
                    'status' => 'upcoming',
                    'status_label' => 'Akan Datang',
                    'is_active' => false,
                    'active_step' => 0,
                    'date_reg' => '1 Agt - 4 Sep 2026',
                    'date_exam' => '5 September 2026',
                    'date_announcement' => '9 September 2026',
                    'date_rereg' => '9 - 18 September 2026',
                ],
            ]),

            // 3. Quick Info
            'pmb_class_start_date' => '14 September 2026',
            'pmb_class_start_sub' => 'Semester Ganjil TA 2026/2027',
            'pmb_open_programs_title' => 'Sarjana Terapan (D4)',
            'pmb_open_programs_sub' => 'TRM • Bisnis Digital • TRPL (Teaching Factory)',

            // 4. Persyaratan Administrasi
            'pmb_requirements' => "Pas Foto Formal Terbaru\nScan KTP (Kartu Tanda Penduduk)\nScan Kartu Keluarga (KK)\nScan Ijazah atau SKL SMA/SMK/MA/Sederajat\nScan Transkrip Nilai / Rapor\nScan Sertifikat Penghargaan (jika ada)",

            // 5. Biaya Perkuliahan
            'pmb_fees' => json_encode([
                [
                    'id' => 1,
                    'name' => 'Gelombang I',
                    'is_recommended' => true,
                    'saving_badge' => 'Hemat 50%',
                    'form_fee' => 'Rp 300.000',
                    'spi_original' => 'Rp 15.000.000',
                    'spi_discounted' => 'Rp 7.500.000',
                    'spi_note' => 'Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)',
                    'ukt_fee' => 'Rp 6.000.000',
                    'ukt_note' => 'Dibayarkan setelah lolos seleksi (per Semester)',
                    'total_fee' => 'Rp 13.800.000',
                    'chart_value' => 'Rp 7,5 Jt',
                    'chart_height' => '55',
                ],
                [
                    'id' => 2,
                    'name' => 'Gelombang II',
                    'is_recommended' => false,
                    'saving_badge' => 'Hemat 40%',
                    'form_fee' => 'Rp 300.000',
                    'spi_original' => 'Rp 15.000.000',
                    'spi_discounted' => 'Rp 9.000.000',
                    'spi_note' => 'Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)',
                    'ukt_fee' => 'Rp 6.000.000',
                    'ukt_note' => 'Dibayarkan setelah lolos seleksi (per Semester)',
                    'total_fee' => 'Rp 15.300.000',
                    'chart_value' => 'Rp 9,0 Jt',
                    'chart_height' => '70',
                ],
                [
                    'id' => 3,
                    'name' => 'Gelombang III',
                    'is_recommended' => false,
                    'saving_badge' => '',
                    'form_fee' => 'Rp 300.000',
                    'spi_original' => 'Rp 15.000.000',
                    'spi_discounted' => 'Rp 10.000.000',
                    'spi_note' => 'Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)',
                    'ukt_fee' => 'Rp 6.000.000',
                    'ukt_note' => 'Dibayarkan setelah lolos seleksi (per Semester)',
                    'total_fee' => 'Rp 16.300.000',
                    'chart_value' => 'Rp 10,0 Jt',
                    'chart_height' => '82',
                ],
                [
                    'id' => 4,
                    'name' => 'Gelombang IV',
                    'is_recommended' => false,
                    'saving_badge' => '',
                    'form_fee' => 'Rp 300.000',
                    'spi_original' => 'Rp 15.000.000',
                    'spi_discounted' => 'Rp 12.000.000',
                    'spi_note' => 'Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)',
                    'ukt_fee' => 'Rp 6.000.000',
                    'ukt_note' => 'Dibayarkan setelah lolos seleksi (per Semester)',
                    'total_fee' => 'Rp 18.300.000',
                    'chart_value' => 'Rp 12,0 Jt',
                    'chart_height' => '98',
                ],
            ]),

            'pmb_fee_subtitle' => 'Transparan dan terjangkau. Biaya SPI dan UKT dibayarkan setelah pendaftar dinyatakan resmi diterima / lolos seleksi.',
            'pmb_fee_notice' => 'Biaya SPI & UKT dibayarkan setelah pendaftar berstatus lolos / diterima sebagai mahasiswa baru.',

            // Coming Soon Fee Setting (Default active as leadership is finalizing fee structure)
            'pmb_fee_coming_soon' => '1',
            'pmb_fee_coming_soon_badge' => 'Segera Diumumkan / Coming Soon',
            'pmb_fee_coming_soon_title' => 'Informasi Biaya Perkuliahan Akan Segera Diumumkan',
            'pmb_fee_coming_soon_desc' => 'Rincian pembiayaan studi (SPI & UKT) untuk Tahun Akademik 2026/2027 saat ini sedang dalam proses penetapan oleh pimpinan institusi Politeknik Mitra Industri. Calon mahasiswa dipersilakan melakukan pendaftaran terlebih dahulu mengikuti jadwal gelombang yang telah dibuka.',

            // 6. Chart
            'pmb_chart_title' => 'Grafik Biaya SPI per Gelombang',
            'pmb_chart_desc' => 'Daftar lebih awal di Gelombang I untuk mendapatkan beasiswa keringanan biaya hingga Rp 7.500.000,-',

            // 7. Catatan Penting (NB)
            'pmb_notes' => "Biaya formulir pendaftaran (Rp 300.000) dibayarkan di awal saat pengisian formulir pendaftaran online.\nKetentuan Pembayaran SPI & UKT: Biaya SPI (Sumbangan Pengembangan Institusi) dan UKT (Uang Kuliah Tunggal) hanya dibayarkan setelah calon mahasiswa dinyatakan DITERIMA atau berstatus LOLOS seleksi sebagai mahasiswa baru Politeknik Mitra Industri.\nBesaran beasiswa keringanan biaya studi (SPI) berlaku sesuai periode gelombang saat calon mahasiswa mendaftar dan menyelesaikan registrasi.\nSeluruh transaksi dan pembayaran resmi hanya dilakukan melalui saluran Virtual Account resmi atas nama Politeknik Mitra Industri. Hati-hati terhadap penipuan yang mengatasnamakan panitia PMB.",

            // 8. Bottom CTA
            'pmb_cta_title' => 'Siap Menjadi Bagian dari Talenta Global Berstandar Industri?',
            'pmb_cta_desc' => 'Untuk melanjutkan proses pendaftaran, silakan klik tombol Daftar yang tersedia di bawah ini. Kuota penerimaan mahasiswa baru terbatas untuk memastikan kualitas pembelajaran Teaching Factory dan magang industri.',
        ];
    }

    /**
     * Get all PMB settings merged with defaults
     */
    public static function getAllSettings(): array
    {
        $defaults = static::getDefaultData();
        $results = [];

        foreach ($defaults as $key => $default) {
            $results[$key] = SiteSetting::get($key, $default);
        }

        // Process lists
        $results['batches_list'] = json_decode($results['pmb_batches'], true) ?: json_decode($defaults['pmb_batches'], true);
        $results['fees_list'] = json_decode($results['pmb_fees'], true) ?: json_decode($defaults['pmb_fees'], true);
        $results['requirements_list'] = array_filter(array_map('trim', explode("\n", $results['pmb_requirements'])));
        $results['notes_list'] = array_filter(array_map('trim', explode("\n", $results['pmb_notes'])));

        return $results;
    }

    /**
     * Display PMB management view in admin panel
     */
    public function index()
    {
        $pmb = static::getAllSettings();
        return view('admin.pmb.index', compact('pmb'));
    }

    /**
     * Update Hero & General information
     */
    public function updateHero(Request $request)
    {
        $request->validate([
            'pmb_hero_badge' => 'required|string|max:255',
            'pmb_hero_title' => 'required|string',
            'pmb_hero_subtitle' => 'required|string',
            'pmb_register_url' => 'required|string|max:500',
            'pmb_academic_year' => 'required|string|max:100',
            'pmb_page_title' => 'required|string|max:255',
            'pmb_intro_text' => 'required|string',
        ]);

        SiteSetting::set('pmb_hero_badge', $request->pmb_hero_badge, 'pmb');
        SiteSetting::set('pmb_hero_title', $request->pmb_hero_title, 'pmb');
        SiteSetting::set('pmb_hero_subtitle', $request->pmb_hero_subtitle, 'pmb');
        SiteSetting::set('pmb_register_url', $request->pmb_register_url, 'pmb');
        SiteSetting::set('pmb_academic_year', $request->pmb_academic_year, 'pmb');
        SiteSetting::set('pmb_page_title', $request->pmb_page_title, 'pmb');
        SiteSetting::set('pmb_intro_text', $request->pmb_intro_text, 'pmb');

        return redirect()->route('admin.pmb.index', ['tab' => 'tab-hero'])
            ->with('success', 'Informasi Hero & Pengantar PMB berhasil disimpan.');
    }

    /**
     * Update Batches (Jadwal Gelombang)
     */
    public function updateJadwal(Request $request)
    {
        $request->validate([
            'batches' => 'required|array',
            'active_batch_id' => 'required|integer',
        ]);

        $batchesData = [];
        foreach ($request->batches as $id => $item) {
            $isActive = ((int) $request->active_batch_id === (int) $id);
            $batchesData[] = [
                'id' => (int) $id,
                'name' => $item['name'] ?? ('Gelombang ' . $id),
                'status' => $item['status'] ?? 'upcoming',
                'status_label' => $item['status'] === 'buka' ? 'BUKA' : ($item['status'] === 'tutup' ? 'TUTUP' : 'Akan Datang'),
                'is_active' => $isActive,
                'active_step' => (int) ($item['active_step'] ?? 0),
                'date_reg' => $item['date_reg'] ?? '',
                'date_exam' => $item['date_exam'] ?? '',
                'date_announcement' => $item['date_announcement'] ?? '',
                'date_rereg' => $item['date_rereg'] ?? '',
            ];
        }

        SiteSetting::set('pmb_batches', json_encode($batchesData), 'pmb');

        return redirect()->route('admin.pmb.index', ['tab' => 'tab-jadwal'])
            ->with('success', 'Jadwal dan tahapan Gelombang PMB berhasil diperbarui.');
    }

    /**
     * Update Fees & Bar Chart
     */
    public function updateBiaya(Request $request)
    {
        $request->validate([
            'fees' => 'required|array',
            'pmb_fee_subtitle' => 'required|string',
            'pmb_fee_notice' => 'required|string',
            'pmb_chart_title' => 'required|string|max:255',
            'pmb_chart_desc' => 'required|string',
            'pmb_fee_coming_soon' => 'nullable|in:0,1',
            'pmb_fee_coming_soon_badge' => 'nullable|string|max:255',
            'pmb_fee_coming_soon_title' => 'nullable|string|max:255',
            'pmb_fee_coming_soon_desc' => 'nullable|string',
        ]);

        $recommendedId = (int) ($request->recommended_fee_id ?? 1);
        $feesData = [];

        foreach ($request->fees as $id => $item) {
            $isRec = ((int) $id === $recommendedId);
            $feesData[] = [
                'id' => (int) $id,
                'name' => $item['name'] ?? ('Gelombang ' . $id),
                'is_recommended' => $isRec,
                'saving_badge' => $item['saving_badge'] ?? '',
                'form_fee' => $item['form_fee'] ?? 'Rp 300.000',
                'spi_original' => $item['spi_original'] ?? 'Rp 15.000.000',
                'spi_discounted' => $item['spi_discounted'] ?? 'Rp 7.500.000',
                'spi_note' => $item['spi_note'] ?? 'Dibayarkan setelah lolos seleksi (1x Selama Perkuliahan)',
                'ukt_fee' => $item['ukt_fee'] ?? 'Rp 6.000.000',
                'ukt_note' => $item['ukt_note'] ?? 'Dibayarkan setelah lolos seleksi (per Semester)',
                'total_fee' => $item['total_fee'] ?? 'Rp 13.800.000',
                'chart_value' => $item['chart_value'] ?? 'Rp 7,5 Jt',
                'chart_height' => $item['chart_height'] ?? '60',
            ];
        }

        SiteSetting::set('pmb_fees', json_encode($feesData), 'pmb');
        SiteSetting::set('pmb_fee_subtitle', $request->pmb_fee_subtitle, 'pmb');
        SiteSetting::set('pmb_fee_notice', $request->pmb_fee_notice, 'pmb');
        SiteSetting::set('pmb_chart_title', $request->pmb_chart_title, 'pmb');
        SiteSetting::set('pmb_chart_desc', $request->pmb_chart_desc, 'pmb');

        // Coming Soon Fee Settings
        SiteSetting::set('pmb_fee_coming_soon', $request->input('pmb_fee_coming_soon', '0'), 'pmb');
        SiteSetting::set('pmb_fee_coming_soon_badge', $request->input('pmb_fee_coming_soon_badge', 'Segera Diumumkan / Coming Soon'), 'pmb');
        SiteSetting::set('pmb_fee_coming_soon_title', $request->input('pmb_fee_coming_soon_title', 'Informasi Biaya Perkuliahan Akan Segera Diumumkan'), 'pmb');
        SiteSetting::set('pmb_fee_coming_soon_desc', $request->input('pmb_fee_coming_soon_desc', 'Rincian pembiayaan studi (SPI & UKT) untuk Tahun Akademik 2026/2027 saat ini sedang dalam proses penetapan oleh pimpinan institusi Politeknik Mitra Industri. Calon mahasiswa dipersilakan melakukan pendaftaran terlebih dahulu mengikuti jadwal gelombang yang telah dibuka.'), 'pmb');

        return redirect()->route('admin.pmb.index', ['tab' => 'tab-biaya'])
            ->with('success', 'Rincian Biaya Perkuliahan dan Grafik SPI berhasil disimpan.');
    }

    /**
     * Update Requirements & NB Notes
     */
    public function updatePersyaratan(Request $request)
    {
        $request->validate([
            'pmb_requirements' => 'required|string',
            'pmb_notes' => 'required|string',
        ]);

        SiteSetting::set('pmb_requirements', $request->pmb_requirements, 'pmb');
        SiteSetting::set('pmb_notes', $request->pmb_notes, 'pmb');

        return redirect()->route('admin.pmb.index', ['tab' => 'tab-persyaratan'])
            ->with('success', 'Persyaratan Administrasi dan Catatan Penting berhasil disimpan.');
    }

    /**
     * Update Quick Info & Bottom CTA
     */
    public function updateInfo(Request $request)
    {
        $request->validate([
            'pmb_class_start_date' => 'required|string|max:255',
            'pmb_class_start_sub' => 'required|string|max:255',
            'pmb_open_programs_title' => 'required|string|max:255',
            'pmb_open_programs_sub' => 'required|string|max:255',
            'pmb_cta_title' => 'required|string|max:255',
            'pmb_cta_desc' => 'required|string',
        ]);

        SiteSetting::set('pmb_class_start_date', $request->pmb_class_start_date, 'pmb');
        SiteSetting::set('pmb_class_start_sub', $request->pmb_class_start_sub, 'pmb');
        SiteSetting::set('pmb_open_programs_title', $request->pmb_open_programs_title, 'pmb');
        SiteSetting::set('pmb_open_programs_sub', $request->pmb_open_programs_sub, 'pmb');
        SiteSetting::set('pmb_cta_title', $request->pmb_cta_title, 'pmb');
        SiteSetting::set('pmb_cta_desc', $request->pmb_cta_desc, 'pmb');

        return redirect()->route('admin.pmb.index', ['tab' => 'tab-info'])
            ->with('success', 'Informasi Tambahan dan Banner Penutup berhasil disimpan.');
    }

    /**
     * Reset PMB settings to official defaults
     */
    public function resetDefaults()
    {
        $defaults = static::getDefaultData();
        foreach ($defaults as $key => $val) {
            SiteSetting::set($key, $val, 'pmb');
        }

        return redirect()->route('admin.pmb.index')
            ->with('success', 'Seluruh data informasi PMB berhasil di-reset ke nilai default resmi.');
    }
}
