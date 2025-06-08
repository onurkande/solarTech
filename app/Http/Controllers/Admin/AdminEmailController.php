<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminEmail;
use Illuminate\Http\Request;

class AdminEmailController extends Controller
{
    public function index()
    {
        $emails = AdminEmail::latest()->get();
        return view('admin.settings.emails', compact('emails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admin_emails,email'
        ]);

        AdminEmail::create($request->only('email'));

        return redirect()->route('admin.emails.index')
            ->with('success', 'Email adresi başarıyla eklendi.');
    }

    public function destroy(AdminEmail $email)
    {
        $email->delete();
        return redirect()->route('admin.emails.index')
            ->with('success', 'Email adresi başarıyla silindi.');
    }

    public function toggleStatus(AdminEmail $email)
    {
        $email->update(['is_active' => !$email->is_active]);
        return redirect()->route('admin.emails.index')
            ->with('success', 'Email durumu güncellendi.');
    }
} 