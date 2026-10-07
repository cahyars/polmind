<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PmbController;
use App\Models\Berita;
use App\Models\Category;
use App\Models\FounderExpert;
use App\Models\GridFeature;
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
        return view('pages.keunikan');
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
}
