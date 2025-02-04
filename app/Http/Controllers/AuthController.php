<?php

namespace App\Http\Controllers;
use App\Models\Password;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Activity;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
    // عرض صفحة الترحيب

public function welcome()
{
    if (Auth::check()) {
       // return redirect()->route('dashboard');
       $activities = Activity::all(); // جلب جميع الأنشطة من قاعدة البيانات
       return view('auth.welcome', compact('activities'));
    }
    $activities = Activity::all(); // جلب جميع الأنشطة من قاعدة البيانات
    return view('auth.welcome', compact('activities'));
}

    // عرض صفحة التسجيل
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // معالجة التسجيل
    public function register2(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);
    
        // توليد كود التحقق العشوائي المكون من 4 أرقام
        $verificationCode = rand(1000, 9999); // رقم عشوائي بين 1000 و 9999
    
        // إنشاء المستخدم في قاعدة البيانات
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'verification_code' => $verificationCode,
            'role' => 'user',  // تخزين كود التحقق
        ]);
    
        // تسجيل الدخول للمستخدم بعد التسجيل بنجاح
        Auth::login($user);
    
        // التوجيه إلى صفحة لوحة التحكم بعد التسجيل
        return redirect()->route('auth.login');
    }
    public function register(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);
    
        // توليد كود التحقق العشوائي المكون من 4 أرقام
        $verificationCode = rand(1000, 9999);
    
        // إنشاء المستخدم في قاعدة البيانات
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone'=> $request->phone,  // تخزين رقم الهاتف
            'verification_code' =>  $verificationCode, // تخزين كود التحقق
            'role' => 'user',
        ]);
    
        // تسجيل الدخول للمستخدم بعد التسجيل بنجاح
        Auth::login($user);
    
        // إعادة التوجيه إلى صفحة التحقق مع تمرير البريد الإلكتروني
        return redirect()->route('verify', ['email' => $user->email]);
    }
    
    // عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // مفاتيح الحد من المحاولات بناءً على البريد الإلكتروني وعنوان IP
        $key = 'login-attempts:' . $request->ip() . '|' . $request->input('email');
    
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'email' => "تم حظر محاولات تسجيل الدخول مؤقتًا، يرجى المحاولة بعد {$seconds} ثانية.",
            ])->withInput();
        }
    
        // التحقق من صحة المدخلات
        $request->validateWithBag('login', [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            RateLimiter::clear($key); // إعادة ضبط عداد المحاولات بعد نجاح تسجيل الدخول
            return redirect()->route('activities.my')->with('success', 'تم تسجيل الدخول بنجاح!');
        }
    
        // تسجيل محاولة فاشلة
        RateLimiter::hit($key, 60); // تحديد فترة الحظر بعد عدد محاولات فاشلة
    
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ])->withInput();
    }
// معالجة تسجيل الدخول
public function login2(Request $request)
{
    // التحقق من صحة المدخلات
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // إذا كانت البيانات صحيحة، يتم إعادة التوجيه إلى الصفحة الرئيسية
        return redirect()->route('activities.my')->with('success', 'تم تسجيل الدخول بنجاح!');

    }

    // في حالة فشل تسجيل الدخول، عرض رسالة خطأ
    return back()->withErrors([
        'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
    ])->withInput();
    
}

      // صفحة لوحة التحكم بعد الدخول
      public function dashboard()
      {
                  // جلب كلمات المرور من قاعدة البيانات
                  $passwords = Password::all();
     // جلب بيانات المستخدم الحالي
     $user = Auth::user();
     view()->share('user', $user);
                  $passwords = Password::all();
                  $totalPasswords = $passwords->count();
                  $totalPlatforms = $passwords->pluck('encrypted_password')->unique()->count();
                  $totalWords = $passwords->pluck('service_name')->unique()->count();
                  // مشاركة بيانات المستخدم مع جميع الصفحات
     // تأكد من هذا السطر
                  return view('dashboard', compact('passwords', 'totalPasswords', 'totalPlatforms', 'totalWords'));
      }
      public function leave2(Activity $activity)
      {
          // التحقق من أن المستخدم مسجل في النشاط
          $registration = Registration::where('user_id', auth()->id())
                                      ->where('activity_id', $activity->id)
                                      ->first();
      
          if (!$registration) {
              return redirect()->back()->with('error', 'أنت غير مسجل في هذا النشاط.');
          }
      
          // تحديث وقت الخروج
          $registration->leave_time = now();
          $registration->save();
      
          return redirect()->back()->with('success', 'تم الخروج من النشاط بنجاح!');
      }
      public function verifyEmail(Request $request)
      {
          // تحقق من صحة البيانات المدخلة
          $request->validate([
              'email' => 'required|email|exists:users,email',
              'verification_code' => 'required|string'
          ]);
  
          // البحث عن المستخدم بواسطة البريد الإلكتروني وكود التحقق
          $user = User::where('email', $request->email)
                      ->where('verification_code', $request->verification_code)
                      ->first();
  
          if ($user) {
              // تحديث حالة التحقق
              $user->update(['is_verified' => 1]);
  
              return response()->json([
                  'success' => true,
                  'message' => 'تم التحقق من الحساب بنجاح!',
                  'redirect' => route('auth.succes'),  // رابط التحويل بعد التحقق
              ]);
          }
  
          return response()->json([
              'success' => false,
              'message' => 'كود التحقق غير صحيح!'
          ], 400);
      }

        // عرض صفحة تسجيل الدخول
        public function succes()
        {
            return view('auth.succes');
        }
}
