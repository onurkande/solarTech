<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteSetting;
use App\Models\Contact;
use App\Models\Blog;
use Illuminate\Support\Facades\View;

class SiteSettingsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Tüm view'lara site ayarlarını gönder
        View::composer(['site.layouts.partials.footer','site.layouts.master', 'site.layouts.partials.header'], function ($view) {
            //$siteSettings = SiteSetting::first();
            $contact = Contact::first();
            $settings = SiteSetting::first();
            $blogs = Blog::select('slug', 'title')->get();
            $view->with('blogs', $blogs);
            $view->with('contact', $contact);
            $view->with('settings', $settings);
        });
    }
} 