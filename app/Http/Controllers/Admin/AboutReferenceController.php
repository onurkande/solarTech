<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutReference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutReferenceController extends Controller
{
    public function index()
    {
        $references = AboutReference::all();
        return view('admin.about.references.index', compact('references'));
    }

    public function create()
    {
        return view('admin.about.references.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif| '
        ]);

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs('references', $imageName, 'public');

        AboutReference::create([
            'url' => $request->url,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.about.references.index')->with('success', 'Reference created successfully');
    }

    public function edit(AboutReference $reference)
    {
        return view('admin.about.references.edit', compact('reference'));
    }

    public function update(Request $request, AboutReference $reference)
    {
        $request->validate([
            'url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif| '
        ]);

        if ($request->hasFile('image')) {
            if ($reference->image) {
                Storage::disk('public')->delete($reference->image);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('references', $imageName, 'public');
            $reference->image = $imagePath;
        }

        $reference->url = $request->url;
        $reference->save();

        return redirect()->route('admin.about.references.index')->with('success', 'Reference updated successfully');
    }

    public function destroy(AboutReference $reference)
    {
        if ($reference->image) {
            Storage::disk('public')->delete($reference->image);
        }
        $reference->delete();
        return redirect()->route('admin.about.references.index')->with('success', 'Reference deleted successfully');
    }
} 