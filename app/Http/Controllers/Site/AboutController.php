<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\AboutReference;
use App\Models\AboutStory;
class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $aboutReferences = AboutReference::all();
        $aboutStories = AboutStory::all();
        return view('site.about', compact('about', 'aboutReferences', 'aboutStories'));
    }
}
