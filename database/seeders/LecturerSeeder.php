<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    public function run(): void
    {
        $lecturers = [
            // Internal
            ['name' => 'Wikan Sakarinto, S.T., M.Sc., Ph.D.', 'position' => 'Direktur Polmind', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/wikan.jpg', 'order' => 1],
            ['name' => 'Ardiansyah, S.E., M.M.', 'position' => 'Dosen BD', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/ardiansyah.jpg', 'order' => 2],
            ['name' => 'Arfiyan, S.Tr. Ak., M.Ak.', 'position' => 'Dosen BD', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/arfiyan.jpeg', 'order' => 3],
            ['name' => 'Lukluk Ilmatul Khairi, S.E., M.Sc.', 'position' => 'Dosen BD', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/lukluk_.jpg', 'order' => 4],
            ['name' => 'Nadia Rizky Fadilla, S.Sos., M.Si.', 'position' => 'Dosen BD', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/nadia.jpg', 'order' => 5],
            ['name' => 'Yudikha Andalantama, S.Kom., M.Kom.', 'position' => 'Dosen BD', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/yudikha.jpg', 'order' => 6],
            ['name' => 'Ir. Ricky Wiranata, S.T., M.T.', 'position' => 'Dosen TRM', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/ricky.jpg', 'order' => 7],
            ['name' => 'Surya Insano, S.T., M.Eng.', 'position' => 'Dosen TRM', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/surya.jpg', 'order' => 8],
            ['name' => 'Yusuf Ahmad, S.T., M.Eng.', 'position' => 'Dosen TRM', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/yusuf.jpg', 'order' => 9],
            ['name' => 'Yudhistira Adityawardhana, S.T., M.T., Ph.D.', 'position' => 'Dosen TRM', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/yudhistira.jpg', 'order' => 10],
            ['name' => 'Billy Nugraha, S.T., M.T.', 'position' => 'Dosen TRM', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/billy.jpg', 'order' => 11],
            ['name' => 'Rian Dwi Ariandi, S.T., M.T.', 'position' => 'Dosen TRM', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/rian.jpg', 'order' => 12],
            ['name' => 'Ahmad Maulid Ridwan, S.Kom., M.Kom.', 'position' => 'Dosen TRPL', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/ahmad.jpg', 'order' => 13],
            ['name' => 'Ainayah Syifa Hendri, S.Kom., M.Kom.', 'position' => 'Dosen TRPL', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/syifa.jpg', 'order' => 14],
            ['name' => 'Cahya Ramdan Syah, S.Kom., M.Kom.', 'position' => 'Dosen TRPL', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/cahya.jpg', 'order' => 15],
            ['name' => 'Rojakul, S.Kom., M.Kom.', 'position' => 'Dosen TRPL', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/rojakul.jpg', 'order' => 16],
            ['name' => 'Wahyu Arief Budiman, S.Kom., M.T.I.', 'position' => 'Dosen TRPL', 'category' => 'internal', 'photo' => 'assets/images/daftar_dosen/internal/baru/arief1.png', 'order' => 17],

            // Expert Industri
            ['name' => 'Ir. Joko Baroto', 'position' => 'Executive Officer PT DDMI', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/joko.jpg', 'order' => 18],
            ['name' => 'Agus Razmajaya, S.H.', 'position' => 'Executive Senior Staff PT Namicoh Indonesia Component', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/agus.jpg', 'order' => 19],
            ['name' => 'Dr. Dasep Suryanto, AT., S.H., M.M., M.I.Kom., Ph.D(C)', 'position' => 'President Director of Bisa Jaya Indonesia', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/dasep_suryanto.jpg', 'order' => 20],
            ['name' => 'Denny Herjaman, S.S.', 'position' => 'President Director of PT. Aditya Creatives Manufacturing', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/denny.jpg', 'order' => 21],
            ['name' => 'Effendi, S.E.', 'position' => 'Director of PT. Diamond Electric Mfg Indonesia', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/effendi.jpg', 'order' => 22],
            ['name' => 'Dr. Sutopoh, M.M.', 'position' => 'Consultant at EM Institute Indonesia, Headmaster of Nozomy Academy', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/sutopoh.jpg', 'order' => 23],
            ['name' => 'Totok Edy Purwanto', 'position' => 'Regional HR Director, Southeast Asia', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/toto.jpg', 'order' => 24],
            ['name' => 'Dr. Tutut Handayani, M.Psi.', 'position' => 'Psychologist', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/tutut.jpg', 'order' => 25],
            ['name' => 'Vidi Christianto, A.Md.', 'position' => 'General Manager PT. Roki Indonesia, Chairman FKKSM MM2100 HR Forum', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/vidi.jpg', 'order' => 26],
            ['name' => 'Drs. Yayat Ruhimat', 'position' => 'HR, GA & Utility Manager, PT. WOOIN', 'category' => 'industri', 'photo' => 'assets/images/daftar_dosen/expert/yayat.jpg', 'order' => 27],

            // Instruktur
            ['name' => 'Rezky Nurrohman Andrianto, S.T.', 'position' => 'Instruktur Otomasi', 'category' => 'instruktur', 'photo' => 'assets/images/daftar_dosen/instruktur/rezky.jpg', 'order' => 28],
        ];

        foreach ($lecturers as $item) {
            Lecturer::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
