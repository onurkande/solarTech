<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string',
            'content' => 'required|string',
            'tags' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cover = $request->file('cover_image');
        $coverName = time() . '_' . $cover->getClientOriginalName();
        $coverPath = $cover->storeAs('blog_covers', $coverName, 'public');

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'cover_image' => $coverPath,
            'desc' => $request->desc,
            'content' => $request->content,
            'tags' => $request->tags,
        ]);

        // Çoklu resim yükleme
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imgName = time() . '_' . $img->getClientOriginalName();
                $imgPath = $img->storeAs('blog_images', $imgName, 'public');
                $blog->images()->create([
                    'image' => $imgPath,
                    'alt_text' => null,
                ]);
            }
        }

        return redirect()->route('admin.blogs.show', $blog)->with('success', 'Blog created!');
    }

    public function edit(Blog $blog)
    {
        $blog->load('images');
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string',
            'content' => 'required|string',
            'tags' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($blog->cover_image) {
                Storage::disk('public')->delete($blog->cover_image);
            }
            $cover = $request->file('cover_image');
            $coverName = time() . '_' . $cover->getClientOriginalName();
            $coverPath = $cover->storeAs('blog_covers', $coverName, 'public');
            $blog->cover_image = $coverPath;
        }

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->desc = $request->desc;
        $blog->content = $request->content;
        $blog->tags = $request->tags;
        $blog->save();

        // Çoklu resim yükleme
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imgName = time() . '_' . $img->getClientOriginalName();
                $imgPath = $img->storeAs('blog_images', $imgName, 'public');
                $blog->images()->create([
                    'image' => $imgPath,
                    'alt_text' => null,
                ]);
            }
        }

        return redirect()->route('admin.blogs.edit', $blog)->with('success', 'Blog updated!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->cover_image) {
            Storage::disk('public')->delete($blog->cover_image);
        }
        foreach ($blog->images as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted!');
    }

    // Blog detay (isteğe bağlı)
    public function show(Blog $blog)
    {
        $blog->load('images');
        return view('admin.blogs.show', compact('blog'));
    }

    public function deleteImage(Blog $blog, BlogImage $image)
    {
        if ($image->blog_id == $blog->id) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
        return redirect()->route('admin.blogs.edit', $blog)->with('success', 'Image deleted!');
    }
} 