<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SliderSetting;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $settings = SliderSetting::first();
        $images = SliderImage::orderBy('order')->get();
        return view('admin.sliders.index', compact('settings', 'images'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'button_text' => 'nullable|string|max:255'
        ]);

        $settings = SliderSetting::first() ?? new SliderSetting();
        $settings->fill($request->only(['title', 'content', 'button_text']));
        $settings->save();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider ayarları başarıyla güncellendi.');
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'order' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sliders', 'public');
            
            SliderImage::create([
                'image' => $imagePath,
                'order' => $request->order
            ]);
        }

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider görseli başarıyla eklendi.');
    }

    public function updateImageOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'required|integer|min:0'
        ]);

        foreach ($request->orders as $id => $order) {
            SliderImage::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }

    public function destroyImage(SliderImage $image)
    {
        if ($image->image) {
            Storage::delete('public/' . $image->image);
        }
        
        $image->delete();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider görseli başarıyla silindi.');
    }
} 