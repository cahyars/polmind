<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

        $beritas = $query->orderByDesc('published_date')->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.berita.index', compact('beritas', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.berita.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:beritas,slug',
            'category' => 'required_without:new_category_name|nullable|string',
            'new_category_name' => 'nullable|string|max:100',
            'author' => 'required|string|max:100',
            'published_date' => 'required|date',
            'summary' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'is_published' => 'nullable|boolean',
        ], [
            'title.required' => 'Judul berita wajib diisi.',
            'category.required_without' => 'Pilih kategori atau buat kategori baru.',
            'published_date.required' => 'Tanggal publikasi wajib diisi.',
            'content.required' => 'Isi berita tidak boleh kosong.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 3MB.',
        ]);

        // Handle category (new or existing)
        $categoryId = null;
        $categorySlug = 'umum';

        if (!empty($request->new_category_name)) {
            $catName = trim($request->new_category_name);
            $catSlug = Str::slug($catName);
            $cat = Category::firstOrCreate(['slug' => $catSlug], ['name' => $catName]);
            $categoryId = $cat->id;
            $categorySlug = $cat->slug;
        } elseif (!empty($request->category)) {
            $cat = Category::where('slug', $request->category)->orWhere('id', $request->category)->first();
            if ($cat) {
                $categoryId = $cat->id;
                $categorySlug = $cat->slug;
            } else {
                $categorySlug = $request->category;
            }
        }

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Berita::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        $summary = !empty($validated['summary'])
            ? trim($validated['summary'])
            : Berita::extractSummaryFromContent($validated['content'], 200);

        Berita::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $categorySlug,
            'category_id' => $categoryId,
            'author' => $validated['author'],
            'published_date' => $validated['published_date'],
            'summary' => $summary,
            'content' => $validated['content'],
            'image' => $imagePath,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function edit(Berita $berita)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.berita.edit', compact('berita', 'categories'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:beritas,slug,' . $berita->id,
            'category' => 'required_without:new_category_name|nullable|string',
            'new_category_name' => 'nullable|string|max:100',
            'author' => 'required|string|max:100',
            'published_date' => 'required|date',
            'summary' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'is_published' => 'nullable|boolean',
        ]);

        // Handle category (new or existing)
        $categoryId = $berita->category_id;
        $categorySlug = $berita->category;

        if (!empty($request->new_category_name)) {
            $catName = trim($request->new_category_name);
            $catSlug = Str::slug($catName);
            $cat = Category::firstOrCreate(['slug' => $catSlug], ['name' => $catName]);
            $categoryId = $cat->id;
            $categorySlug = $cat->slug;
        } elseif (!empty($request->category)) {
            $cat = Category::where('slug', $request->category)->orWhere('id', $request->category)->first();
            if ($cat) {
                $categoryId = $cat->id;
                $categorySlug = $cat->slug;
            } else {
                $categorySlug = $request->category;
            }
        }

        $slug = Str::slug($validated['slug']);

        $imagePath = $berita->image;
        if ($request->hasFile('image')) {
            if ($berita->image && !Str::startsWith($berita->image, 'assets/')) {
                Storage::disk('public')->delete($berita->image);
            }
            $imagePath = $request->file('image')->store('news', 'public');
        }

        $summary = !empty($validated['summary'])
            ? trim($validated['summary'])
            : Berita::extractSummaryFromContent($validated['content'], 200);

        $berita->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $categorySlug,
            'category_id' => $categoryId,
            'author' => $validated['author'],
            'published_date' => $validated['published_date'],
            'summary' => $summary,
            'content' => $validated['content'],
            'image' => $imagePath,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image && !Str::startsWith($berita->image, 'assets/')) {
            Storage::disk('public')->delete($berita->image);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function togglePublish(Berita $berita)
    {
        $berita->update(['is_published' => !$berita->is_published]);

        $status = $berita->is_published ? 'dipublikasikan' : 'dijadikan draft';
        return back()->with('success', "Status berita berhasil diubah menjadi {$status}.");
    }
}
