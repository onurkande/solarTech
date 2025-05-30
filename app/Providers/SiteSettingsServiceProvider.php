<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteSetting;
use App\Models\Product;
use App\Models\Contact;
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
        /*View::composer(['site.layouts.partials.header', 'site.layouts.partials.footer', 'site.index','site.layouts.master'], function ($view) {
            $siteSettings = SiteSetting::first();
            $products = Product::latest()->take(5)->get();
            $contact = Contact::first();
            $view->with('siteSettings', $siteSettings);
            $view->with('products', $products);
            $view->with('contact', $contact);
        });*/
    }
} 