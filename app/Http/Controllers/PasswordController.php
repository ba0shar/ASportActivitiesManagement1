<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;
use App\Helpers\EncryptionHelper;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    
    public function create()
    {
        $user = Auth::user();
        view()->share('user', $user);
        return view('passwords.create');
    }

    public function store(Request $request)
{
    // التحقق من البيانات المدخلة
    $validated = $request->validate([
        'service_name' => 'required|string|max:255', // تحقق من اسم الخدمة
        'password' => [
            'required',
            'string',
            'min:8', // يجب أن تكون كلمة المرور على الأقل 8 أحرف
            'regex:/[a-z]/', // يجب أن تحتوي على حرف صغير
            'regex:/[A-Z]/', // يجب أن تحتوي على حرف كبير
            'regex:/[0-9]/', // يجب أن تحتوي على رقم
            'regex:/[@$!%*?&]/', // يجب أن تحتوي على رمز خاص
        ],
    ]);

    // تشفير كلمة المرور
    $encryptedData = EncryptionHelper::encryptPassword($validated['password']);
    $encryptedPassword = $encryptedData['encrypted'];
    $iv = $encryptedData['iv']; // لا حاجة لتشفير الـ IV هنا لأننا قمنا بذلك في `encryptPassword`
    
    // تخزين البيانات في قاعدة البيانات
    Password::create([
        'user_id' => auth()->id(), // الحصول على ID المستخدم من الجلسة
        'service_name' => $validated['service_name'],
        'encrypted_password' => $encryptedPassword,
        'iv' => $iv, // حفظ IV لفك التشفير لاحقاً
    ]);

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('passwords.create')->with('success', 'Password saved successfully!');
}

    
    
    
    // صفحة لوحة التحكم بعد الدخول
    public function dashboard()
    {
                // جلب كلمات المرور من قاعدة البيانات
                $passwords = Password::all();


                $passwords = Password::all();
                $totalPasswords = $passwords->count();
                $totalPlatforms = $passwords->pluck('encrypted_password')->unique()->count();
                $totalWords = $passwords->pluck('service_name')->unique()->count();
            
                return view('dashboard', compact('passwords', 'totalPasswords', 'totalPlatforms', 'totalWords'));
    }
    public function index()
    {
        // جلب كلمات المرور من قاعدة البيانات
        $passwords = Password::all();

        // تمرير البيانات إلى العرض
        return view('index', compact('passwords'));
    }
    public function home()
    {
        // جلب كلمات المرور من قاعدة البيانات
        $passwords = Password::all();

        // تمرير البيانات إلى العرض
        return view('home', compact('passwords'));
    }
public function destroy($id)
{
    $password = Password::findOrFail($id);
    $password->delete();

    return redirect()->route('passwords.index')->with('success', 'Password deleted successfully!');
}
public function generateView()
{
    return view('passwords.generate');
} 

public function generate()
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+';
    $password = substr(str_shuffle($characters), 0, 30); // إنشاء كلمة مرور بطول 12 حرفًا

    return redirect()->route('passwords.generateView')->with('generated_password', $password);
}

}
