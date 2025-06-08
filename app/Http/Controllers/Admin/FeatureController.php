<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\FeatureSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        $setting = FeatureSetting::first();
        return view('admin.features.index', compact('features', 'setting'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs('features', $imageName, 'public');

        Feature::create([
            'image' => $imagePath,
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            if ($feature->image) {
                Storage::disk('public')->delete($feature->image);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('features', $imageName, 'public');
            $feature->image = $imagePath;
        }

        $feature->title = $request->title;
        $feature->content = $request->content;
        $feature->save();

        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully');
    }

    public function destroy(Feature $feature)
    {
        if ($feature->image) {
            Storage::disk('public')->delete($feature->image);
        }
        $feature->delete();
        return redirect()->route('admin.features.index')->with('success', 'Feature deleted successfully');
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $setting = FeatureSetting::first();
        if (!$setting) {
            $setting = new FeatureSetting();
        }

        $setting->title = $request->title;
        $setting->content = $request->content;
        $setting->save();

        return redirect()->route('admin.features.index')->with('success', 'Settings updated successfully');
    }
} 