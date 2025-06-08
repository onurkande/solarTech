<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::first();
        return view('admin.video.index', compact('video'));
    }

    public function edit()
    {
        $video = Video::first();
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request)
    {
        if(Video::count() == 0){
            $video = new Video();
        }else{
            $video = Video::first();
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'video_embed' => 'required|string',
            'content' => 'required|string',
        ]);
        $video->title = $request->title;
        $video->desc = $request->desc;
        $video->video_embed = $request->video_embed;
        $video->content = $request->content;
        $video->save();
        return redirect()->route('admin.video.index')->with('success', 'Video updated successfully');
    }
} 