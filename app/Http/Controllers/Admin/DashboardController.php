<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Lecturer;
use App\Models\Slider;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_berita' => Berita::count(),
            'published_berita' => Berita::where('is_published', true)->count(),
            'total_sliders' => Slider::where('is_active', true)->count(),
            'total_dosen' => Lecturer::count(),
            'total_tendik' => Staff::count(),
            'total_views' => Berita::sum('views_count'),
        ];

        $latestNews = Berita::orderByDesc('created_at')->limit(6)->get();

        return view('admin.dashboard', compact('stats', 'latestNews'));
    }
}
