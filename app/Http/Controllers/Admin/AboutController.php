<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function edit(About $about)
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {   
        if(About::count() == 0){
            $about = new About();
        }else{
            $about = About::first();
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'mission' => 'required|string',
            'vission' => 'required|string',
            'our_values' => 'required|string',
            'content' => 'required|string'
        ]);

        $about->title = $request->title;
        $about->desc = $request->desc;
        $about->mission = $request->mission;
        $about->vission = $request->vission;
        $about->our_values = $request->our_values;
        $about->content = $request->content;
        $about->save();

        return redirect()->route('admin.about.index')->with('success', 'About information updated successfully');
    }
} 