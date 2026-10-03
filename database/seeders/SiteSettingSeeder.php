<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_title', 'value' => 'POLITEKNIK MITRA INDUSTRI', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'info@polmind.ac.id', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+62 821-1329-6897', 'group' => 'contact'],
            ['key' => 'contact_whatsapp', 'value' => '6282113296897', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Kawasan Industri MM2100', 'group' => 'contact'],
            ['key' => 'gmaps_iframe', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.9027092193342!2d107.08309836648712!3d-6.289287568565989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f292b17f9b9%3A0xa3f25862f022169c!2sPoliteknik%20Mitra%20Industri!5e0!3m2!1sid!2sid!4v1763609292143!5m2!1sid!2sid" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', 'group' => 'contact'],

            // Sambutan Direktur
            ['key' => 'director_name', 'value' => 'Wikan Sakarinto, S.T., M.Sc., Ph.D.', 'group' => 'sambutan'],
            ['key' => 'director_title', 'value' => 'Direktur Politeknik Mitra Industri', 'group' => 'sambutan'],
            ['key' => 'director_photo', 'value' => 'assets/images/sambutan.png', 'group' => 'sambutan'],
            ['key' => 'director_message', 'value' => 'Mari bergabung dengan Polmind, mencetak SDM/lulusan unggul dan berdaya saing global untuk Indonesia yang lebih baik. Kuliahnya tidak boring, lebih banyak praktik daripada teori, karena menerapkan Project-based Learning (PjBL) riil & kontekstual, bersama mitra industri/perusahaan, baik di dalam kawasan MM2100 maupun di luar kawasan. Pola ini, yaitu Teaching Factory (TEFA), men-trigger skills inovasi dan problem solving, untuk mencetak karakter dan life skills kuat. Serta, Polmind sangat concern pada kerjasama dengan kampus dan perusahaan dari luar negeri.', 'group' => 'sambutan'],

            // PMB
            ['key' => 'pmb_cta_text', 'value' => 'Pendaftaran Mahasiswa Baru 2026 (KLIK DISINI)', 'group' => 'pmb'],
            ['key' => 'pmb_cta_link', 'value' => '/pmb', 'group' => 'pmb'],
            ['key' => 'pmb_banner_image', 'value' => 'assets/images/why_polmind_ok.png', 'group' => 'pmb'],
            ['key' => 'pmb_popup_image', 'value' => 'assets/images/perpanjangan_gel4.jpeg', 'group' => 'pmb'],
            ['key' => 'pmb_popup_enabled', 'value' => '0', 'group' => 'pmb'],

            // Profil Kampus
            ['key' => 'profil_decree', 'value' => 'Berdasarkan Keputusan Mentri DIKTI SAINTEK No 324/B/O/2025', 'group' => 'profil'],
            ['key' => 'profil_vision', 'value' => 'Menjadi kampus terapan unggulan berstandar global yang menghasilkan lulusan profesional, berkarakter, dan siap kerja melalui pembelajaran kontekstual berbasis industri dan nilai-nilai luhur.', 'group' => 'profil'],
            ['key' => 'profil_missions', 'value' => "Menyelenggarakan pendidikan terapan berbasis industri melalui Teaching Factory dan Project-Based Learning.\nMenyusun kurikulum bersama praktisi untuk memenuhi kebutuhan dunia kerja.\nMembentuk lulusan berkarakter, siap kerja, dan berdaya saing global.\nMenumbuhkan semangat kewirausahaan dalam lingkungan kampus.\nMembangun kemitraan strategis dengan industri nasional dan internasional.", 'group' => 'profil'],
            ['key' => 'profil_banner', 'value' => 'assets/images/b_profil.png', 'group' => 'profil'],

            // Footer
            ['key' => 'footer_copyright', 'value' => '© 2025 Yayasan Mitra Global Mandiri', 'group' => 'footer'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(
                ['key' => $s['key']],
                ['value' => $s['value'], 'group' => $s['group']]
            );
        }
    }
}
