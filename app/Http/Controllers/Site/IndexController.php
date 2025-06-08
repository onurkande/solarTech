<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\FeatureSetting;
use App\Models\About;
use App\Models\AboutImage;
use App\Models\Video;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\SliderImage;
use App\Models\SliderSetting;
class IndexController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->take(4)->get();
        $featureSettings = FeatureSetting::first();
        $about = About::first();
        $aboutImages = AboutImage::latest()->take(3)->get();
        $video = Video::first();
        $blogs = Blog::orderBy('id', 'asc')->take(3)->get();
        $contact = Contact::first();
        $sliders = SliderImage::all();
        $sliderSettings = SliderSetting::first();
        $sliderImages = SliderImage::orderBy('order')->get();
        return view('site.index', compact('features', 'featureSettings', 'about', 'aboutImages', 'video', 'blogs','contact','sliders','sliderSettings','sliderImages'));
    }
}
