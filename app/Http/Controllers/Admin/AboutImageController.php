<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutImageController extends Controller
{
    public function index()
    {
        $images = AboutImage::all();
        return view('admin.about.images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.about.images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif| ',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs('about_images', $imageName, 'public');

        AboutImage::create([
            'image' => $imagePath,
            'alt_text' => $request->alt_text,
        ]);

        return redirect()->route('admin.about.images.index')->with('success', 'Image added successfully');
    }

    public function edit(AboutImage $image)
    {
        return view('admin.about.images.edit', compact('image'));
    }

    public function update(Request $request, AboutImage $image)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif| ',
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
            $uploaded = $request->file('image');
            $imageName = time() . '_' . $uploaded->getClientOriginalName();
            $imagePath = $uploaded->storeAs('about_images', $imageName, 'public');
            $image->image = $imagePath;
        }
        $image->alt_text = $request->alt_text;
        $image->save();

        return redirect()->route('admin.about.images.index')->with('success', 'Image updated successfully');
    }

    public function destroy(AboutImage $image)
    {
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
        $image->delete();
        return redirect()->route('admin.about.images.index')->with('success', 'Image deleted successfully');
    }
} 