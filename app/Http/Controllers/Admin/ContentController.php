<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.konten.index', compact('settings'));
    }

    public function updateSambutan(Request $request)
    {
        $request->validate([
            'director_name' => 'required|string|max:255',
            'director_title' => 'required|string|max:255',
            'director_message' => 'required|string',
            'director_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        SiteSetting::set('director_name', $request->director_name, 'sambutan');
        SiteSetting::set('director_title', $request->director_title, 'sambutan');
        SiteSetting::set('director_message', $request->director_message, 'sambutan');

        if ($request->hasFile('director_photo')) {
            $path = $request->file('director_photo')->store('settings', 'public');
            SiteSetting::set('director_photo', 'storage/' . $path, 'sambutan');
        }

        return back()->with('success', 'Sambutan Direktur berhasil diperbarui.');
    }

    public function updatePmb(Request $request)
    {
        $request->validate([
            'pmb_cta_text' => 'required|string|max:255',
            'pmb_cta_link' => 'required|string|max:255',
            'pmb_banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'pmb_popup_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        SiteSetting::set('pmb_cta_text', $request->pmb_cta_text, 'pmb');
        SiteSetting::set('pmb_cta_link', $request->pmb_cta_link, 'pmb');
        SiteSetting::set('pmb_popup_enabled', $request->has('pmb_popup_enabled') ? '1' : '0', 'pmb');

        if ($request->hasFile('pmb_banner_image')) {
            $path = $request->file('pmb_banner_image')->store('settings', 'public');
            SiteSetting::set('pmb_banner_image', 'storage/' . $path, 'pmb');
        }

        if ($request->hasFile('pmb_popup_image')) {
            $path = $request->file('pmb_popup_image')->store('settings', 'public');
            SiteSetting::set('pmb_popup_image', 'storage/' . $path, 'pmb');
        }

        return back()->with('success', 'Pengaturan PMB berhasil diperbarui.');
    }

    public function updateProfil(Request $request)
    {
        $request->validate([
            'profil_decree' => 'required|string|max:255',
            'profil_vision' => 'required|string',
            'profil_missions' => 'required|string',
        ]);

        SiteSetting::set('profil_decree', $request->profil_decree, 'profil');
        SiteSetting::set('profil_vision', $request->profil_vision, 'profil');
        SiteSetting::set('profil_missions', $request->profil_missions, 'profil');

        return back()->with('success', 'Informasi Profil, Visi, dan Misi berhasil diperbarui.');
    }

    public function updateGeneral(Request $request)
    {
        $request->validate([
            'site_title' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:50',
            'contact_whatsapp' => 'required|string|max:50',
            'contact_address' => 'required|string|max:255',
            'gmaps_iframe' => 'nullable|string',
            'footer_copyright' => 'required|string|max:255',
        ]);

        SiteSetting::set('site_title', $request->site_title, 'general');
        SiteSetting::set('contact_email', $request->contact_email, 'contact');
        SiteSetting::set('contact_phone', $request->contact_phone, 'contact');
        SiteSetting::set('contact_whatsapp', $request->contact_whatsapp, 'contact');
        SiteSetting::set('contact_address', $request->contact_address, 'contact');
        SiteSetting::set('gmaps_iframe', $request->gmaps_iframe, 'contact');
        SiteSetting::set('footer_copyright', $request->footer_copyright, 'footer');

        return back()->with('success', 'Informasi Kontak dan Pengaturan Umum berhasil disimpan.');
    }
}
