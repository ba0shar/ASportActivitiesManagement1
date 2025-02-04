<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    // عرض صفحة الإعدادات
    public function showSettings()
    {
        $user = Auth::user();
        view()->share('user', $user);
        return view('settings'); // تأكد من أن لديك ملف settings.blade.php في resources/views
    }
    // عرض صفحة الإعدادات
    public function about()
    {
        return view('about'); // تأكد من أن لديك ملف settings.blade.php في resources/views
    }
    // تحديث كلمة المرور والبريد الإلكتروني
    public function updateSettings(Request $request)
    {
        $user = Auth::user();
        view()->share('user', $user);

        // التحقق من المدخلات
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        // تحديث البريد الإلكتروني
        $user->email = $validated['email'];
        
        // إذا تم توفير كلمة المرور الجديدة
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('settings')->with('success', 'Settings updated successfully!');
    }
}