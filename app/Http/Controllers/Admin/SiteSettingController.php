<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'nullable|string',
            'bottom_text1' => 'nullable|string',
            'bottom_text2' => 'nullable|string',
            'MAIL_MAILER' => 'nullable|string',
            'MAIL_HOST' => 'nullable|string',
            'MAIL_PORT' => 'nullable|string',
            'MAIL_USERNAME' => 'nullable|string',
            'MAIL_PASSWORD' => 'nullable|string',
            'MAIL_ENCRYPTION' => 'nullable|string',
            'MAIL_FROM_ADDRESS' => 'nullable|email',
            'MAIL_FROM_NAME' => 'nullable|string'
        ]);

        $settings = SiteSetting::first() ?? new SiteSetting();

        if ($request->hasFile('logo')) {
            // Eski logoyu sil
            if ($settings->logo) {
                Storage::delete('public/' . $settings->logo);
            }
            
            // Yeni logoyu kaydet
            $logoPath = $request->file('logo')->store('site', 'public');
            $settings->logo = $logoPath;
        }

        $settings->content = $request->content;
        $settings->bottom_text1 = $request->bottom_text1;
        $settings->bottom_text2 = $request->bottom_text2;

        // Mail ayarlarını güncelle
        $settings->MAIL_MAILER = $request->MAIL_MAILER;
        $settings->MAIL_HOST = $request->MAIL_HOST;
        $settings->MAIL_PORT = $request->MAIL_PORT;
        $settings->MAIL_USERNAME = $request->MAIL_USERNAME;
        $settings->MAIL_PASSWORD = $request->MAIL_PASSWORD;
        $settings->MAIL_ENCRYPTION = $request->MAIL_ENCRYPTION;
        $settings->MAIL_FROM_ADDRESS = $request->MAIL_FROM_ADDRESS;
        $settings->MAIL_FROM_NAME = $request->MAIL_FROM_NAME;

        $settings->save();

        // Mail ayarlarını config'e uygula
        Config::set('mail.mailer', $settings->MAIL_MAILER);
        Config::set('mail.host', $settings->MAIL_HOST);
        Config::set('mail.port', $settings->MAIL_PORT);
        Config::set('mail.username', $settings->MAIL_USERNAME);
        Config::set('mail.password', $settings->MAIL_PASSWORD);
        Config::set('mail.encryption', $settings->MAIL_ENCRYPTION);
        Config::set('mail.from.address', $settings->MAIL_FROM_ADDRESS);
        Config::set('mail.from.name', $settings->MAIL_FROM_NAME);

        // .env dosyasını güncelle
        Artisan::call('mail:update-env');

        return redirect()->route('admin.settings.index')
            ->with('success', 'Site ayarları başarıyla güncellendi.');
    }
} 