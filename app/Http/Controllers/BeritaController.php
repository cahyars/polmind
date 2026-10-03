<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::where('is_published', true);

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $news = $query->orderByDesc('published_date')->get();
        $categories = Category::orderBy('name')->get();

        return view('pages.berita.index', compact('news', 'categories'));
    }

    public function show(string $slug)
    {
        $article = Berita::where('slug', $slug)->firstOrFail();

        // Increment views
        $article->increment('views_count');

        $related = Berita::where('id', '!=', $article->id)
            ->where('is_published', true)
            ->orderByDesc('published_date')
            ->limit(3)
            ->get();

        return view('pages.berita.show', compact('article', 'related'));
    }
}
