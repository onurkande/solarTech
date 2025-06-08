<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutStory;
use Illuminate\Http\Request;

class AboutStoryController extends Controller
{
    public function index()
    {
        $stories = AboutStory::all();
        return view('admin.about.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.about.stories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'desc' => 'required|string'
        ]);

        AboutStory::create($request->all());

        return redirect()->route('admin.about.stories.index')->with('success', 'Story created successfully');
    }

    public function edit(AboutStory $story)
    {
        return view('admin.about.stories.edit', compact('story'));
    }

    public function update(Request $request, AboutStory $story)
    {
        $request->validate([
            'year' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'desc' => 'required|string'
        ]);

        $story->update($request->all());

        return redirect()->route('admin.about.stories.index')->with('success', 'Story updated successfully');
    }

    public function destroy(AboutStory $story)
    {
        $story->delete();
        return redirect()->route('admin.about.stories.index')->with('success', 'Story deleted successfully');
    }
} 