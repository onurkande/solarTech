<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Contact;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $contact = Contact::first()->phone;
        return view('site.blogs', compact('blogs', 'contact'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blogs = Blog::where('id', '!=', $blog->id)->latest()->take(3)->get();
        $contact = Contact::first()->phone;
        return view('site.blog-details', compact('blog', 'blogs', 'contact'));
    }
}
