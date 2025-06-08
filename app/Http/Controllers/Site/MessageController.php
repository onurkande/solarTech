<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\AdminEmail;
use App\Mail\NewMessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string|max:255|regex:/^[a-zA-ZğüşıöçĞÜŞİÖÇ\s]+$/',
                'last_name' => 'required|string|max:255|regex:/^[a-zA-ZğüşıöçĞÜŞİÖÇ\s]+$/',
                'email' => 'required|email|max:255',
                'phone' => 'required|numeric|digits_between:10,11',
                'package_type' => 'nullable|string|in:residential,commercial,industrial,consultation,other',
                'message' => 'required|string|min:10|max:1000'
            ], [
                'first_name.required' => 'Ad alanı zorunludur.',
                'first_name.regex' => 'Ad alanı sadece harf içerebilir.',
                'last_name.required' => 'Soyad alanı zorunludur.',
                'last_name.regex' => 'Soyad alanı sadece harf içerebilir.',
                'email.required' => 'Email alanı zorunludur.',
                'email.email' => 'Geçerli bir email adresi giriniz.',
                'phone.required' => 'Telefon alanı zorunludur.',
                'phone.numeric' => 'Telefon alanı sadece rakam içerebilir.',
                'phone.digits_between' => 'Telefon numarası 10-11 haneli olmalıdır.',
                'message.required' => 'Mesaj alanı zorunludur.',
                'message.min' => 'Mesaj en az 10 karakter olmalıdır.',
                'message.max' => 'Mesaj en fazla 1000 karakter olabilir.'
            ]);

            $message = Message::create($validated);

            // Aktif admin e-postalarına bildirim gönder
            try {
                $adminEmails = AdminEmail::where('is_active', true)->get();
                foreach ($adminEmails as $adminEmail) {
                    Mail::to($adminEmail->email)->send(new NewMessageNotification($message));
                }
            } catch (\Exception $e) {
                Log::error('Mail gönderimi başarısız: ' . $e->getMessage(), [
                    'message_id' => $message->id,
                    'admin_emails' => $adminEmails->pluck('email')->toArray()
                ]);
            }

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.'
                ]);
            }

            return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.')->with('scroll', true);

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ], 422);
            }

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('scroll', true);
        } catch (\Exception $e) {
            Log::error('Mesaj gönderimi sırasında hata: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bir hata oluştu. Lütfen tekrar deneyin.'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Bir hata oluştu. Lütfen tekrar deneyin.')
                ->withInput()
                ->with('scroll', true);
        }
    }
}