<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PmbController;
use App\Models\Berita;
use App\Models\Category;
use App\Models\FounderExpert;
use App\Models\GridFeature;
use App\Models\KeunikanItem;
use App\Models\Lecturer;
use App\Models\Partner;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Staff;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $gridFeatures = GridFeature::where('is_active', true)->orderBy('order')->get();
        $latestNews = Berita::where('is_published', true)->orderByDesc('published_date')->get();
        $categories = Category::orderBy('name')->get();
        $partners = Partner::where('is_active', true)->orderBy('order')->orderBy('name')->get();

        $settings = [
            'director_name' => SiteSetting::get('director_name', 'Wikan Sakarinto, S.T., M.Sc., Ph.D.'),
            'director_title' => SiteSetting::get('director_title', 'Direktur Politeknik Mitra Industri'),
            'director_photo' => SiteSetting::get('director_photo', 'assets/images/sambutan.png'),
            'director_message' => SiteSetting::get('director_message', ''),
            'pmb_cta_text' => SiteSetting::get('pmb_cta_text', 'Pendaftaran Mahasiswa Baru 2026 (KLIK DISINI)'),
            'pmb_cta_link' => SiteSetting::get('pmb_cta_link', '/pmb'),
            'pmb_banner_image' => SiteSetting::get('pmb_banner_image', 'assets/images/why_polmind_ok.png'),
            'pmb_popup_image' => SiteSetting::get('pmb_popup_image', 'assets/images/perpanjangan_gel4.jpeg'),
            'pmb_popup_enabled' => SiteSetting::get('pmb_popup_enabled', '0'),
        ];

        return view('pages.beranda', compact('sliders', 'gridFeatures', 'latestNews', 'settings', 'categories', 'partners'));
    }

    public function profil()
    {
        $founders = FounderExpert::orderBy('order')->get();
        $decree = SiteSetting::get('profil_decree', 'Berdasarkan Keputusan Mentri DIKTI SAINTEK No 324/B/O/2025');
        $vision = SiteSetting::get('profil_vision', 'Menjadi kampus terapan unggulan berstandar global yang menghasilkan lulusan profesional, berkarakter, dan siap kerja melalui pembelajaran kontekstual berbasis industri dan nilai-nilai luhur.');
        $missionsRaw = SiteSetting::get('profil_missions', '');
        $missions = array_filter(array_map('trim', explode("\n", $missionsRaw)));
        $banner = SiteSetting::get('profil_banner', 'assets/images/b_profil.png');

        return view('pages.profil', compact('founders', 'decree', 'vision', 'missions', 'banner'));
    }

    public function prodi()
    {
        return view('pages.prodi');
    }

    public function keunikan()
    {
        $blocks = KeunikanItem::blocks()->where('is_active', true)->orderBy('order')->get();
        $careers = KeunikanItem::careers()->where('is_active', true)->orderBy('order')->get();

        $pageTitle = SiteSetting::get('keunikan_page_title', 'KEUNIKAN DAN KEUNGGULAN');
        $pageSubtitle = SiteSetting::get('keunikan_page_subtitle', 'Mengapa Memilih Politeknik Mitra Industri?');
        $careerTitle = SiteSetting::get('keunikan_career_title', 'Bagian Karir & Internasionalisasi');

        return view('pages.keunikan', compact('blocks', 'careers', 'pageTitle', 'pageSubtitle', 'careerTitle'));
    }

    public function pmb()
    {
        $pmb = PmbController::getAllSettings();
        return view('pages.pmb', compact('pmb'));
    }

    public function dokumentasi()
    {
        return view('pages.dokumentasi');
    }

    public function daftarDosen()
    {
        $dosenInternal = Lecturer::where('category', 'internal')->orderBy('order')->get();
        $dosenIndustri = Lecturer::where('category', 'industri')->orderBy('order')->get();
        $instruktur = Lecturer::where('category', 'instruktur')->orderBy('order')->get();

        return view('pages.daftar_dosen', compact('dosenInternal', 'dosenIndustri', 'instruktur'));
    }

    public function daftarTendik()
    {
        $tendik = Staff::orderBy('order')->get();
        return view('pages.daftar_tendik', compact('tendik'));
    }

    public function videoAi()
    {
        // Daftar video AI karya mahasiswa Politeknik Mitra Industri
        $videos = [
            [
                'id' => '3AdW-_NuwIU',
                'type' => 'landscape',
                'title' => 'Hasil Latihan AI - Maba Polmind (Ospek) - Thanks Sponsor JOTUN - Perkasa 2026',
                'short_title' => 'Film Pendek AI: PERKASA 2026',
                'description' => 'Karya eksplorasi visual artificial intelligence oleh mahasiswa baru Politeknik Mitra Industri pada rangkaian kegiatan pengenalan kampus PERKASA 2026 yang didukung oleh PT Jotun Indonesia.',
                'creator' => 'Mahasiswa Baru Polmind 2026',
                'category' => 'Film Pendek AI',
                'sponsor' => 'PT Jotun Indonesia',
                'youtube_url' => 'https://youtu.be/3AdW-_NuwIU',
                'embed_url' => 'https://www.youtube.com/embed/3AdW-_NuwIU',
                'date' => 'Oktober 2026',
                'featured' => true,
            ],
            [
                'id' => 'cv0bJYMaziw',
                'type' => 'shorts',
                'title' => 'Karya Video AI Mahasiswa Polmind - Shorts 1',
                'short_title' => 'Eksplorasi Video AI #1',
                'description' => 'Karya eksplorasi visual format vertikal berbasis teknologi Artificial Intelligence oleh mahasiswa Politeknik Mitra Industri.',
                'creator' => 'Mahasiswa Polmind',
                'category' => 'YouTube Shorts AI',
                'sponsor' => null,
                'youtube_url' => 'https://youtube.com/shorts/cv0bJYMaziw',
                'embed_url' => 'https://www.youtube.com/embed/cv0bJYMaziw',
                'date' => 'Oktober 2026',
                'featured' => false,
            ],
            [
                'id' => 'OO0y1nbDAoU',
                'type' => 'shorts',
                'title' => 'Karya Video AI Mahasiswa Polmind - Shorts 2',
                'short_title' => 'Eksplorasi Video AI #2',
                'description' => 'Inovasi visualisasi kreatif format vertikal berbasis Artificial Intelligence yang dihasilkan mahasiswa Politeknik Mitra Industri.',
                'creator' => 'Mahasiswa Polmind',
                'category' => 'YouTube Shorts AI',
                'sponsor' => null,
                'youtube_url' => 'https://youtube.com/shorts/OO0y1nbDAoU',
                'embed_url' => 'https://www.youtube.com/embed/OO0y1nbDAoU',
                'date' => 'Oktober 2026',
                'featured' => false,
            ],
            [
                'id' => 'McZWzdCBBj4',
                'type' => 'shorts',
                'title' => 'Video AI Ronda Malam',
                'short_title' => 'Video AI Ronda Malam',
                'description' => 'Karya eksplorasi animasi dan cerita visual AI bertema Ronda Malam yang dibuat oleh mahasiswa Politeknik Mitra Industri.',
                'creator' => 'Mahasiswa Polmind',
                'category' => 'YouTube Shorts AI',
                'sponsor' => null,
                'youtube_url' => 'https://youtube.com/shorts/McZWzdCBBj4',
                'embed_url' => 'https://www.youtube.com/embed/McZWzdCBBj4',
                'date' => 'Oktober 2026',
                'featured' => false,
            ],
        ];

        return view('pages.video_ai', compact('videos'));
    }
}
