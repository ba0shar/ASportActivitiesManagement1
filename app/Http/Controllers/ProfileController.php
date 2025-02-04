<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // 📌 عرض صفحة البروفايل
    public function show()
    {
        $user = Auth::user(); // جلب بيانات المستخدم الحالي
        return view('profile.show', compact('user'));
    }

    // 📌 تحديث بيانات المستخدم
    public function update(Request $request)
    {
        $user = Auth::user();

        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|max:2048'
        ]);

        // تحديث الاسم والإيميل
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
       
        // تحديث الصورة الشخصية إذا تم رفع صورة جديدة

        if ($request->hasFile('avatar')) {
            $originalName = pathinfo($request->file('avatar')->getClientOriginalName(), PATHINFO_FILENAME);
            $shortName = substr($originalName, 0, 4); // استخراج أول 4 حروف فقط
            $extension = $request->file('avatar')->getClientOriginalExtension(); // الحصول على الامتداد
            $newFileName = $shortName . '_' . uniqid() . '.' . $extension; // اسم جديد مع ID فريد لتجنب التكرار
        
            $avatarPath = $request->file('avatar')->storeAs('avatars', $newFileName, 'public');
                    // ✅ حفظ المسار الجديد في قاعدة البيانات
        $user->avatar = $avatarPath;
        }
        $user->save();

        return redirect()->route('profile.show')->with('success', 'تم تحديث بيانات البروفايل بنجاح!');
    }
        // 📌 عرض صفحة المساعدة
        public function help()
        {
            $user = Auth::user(); // جلب بيانات المستخدم الحالي
            return view('profile.help');
        }
                // 📌 عرض صفحة Privacy
                public function Privacy()
                {
                    $user = Auth::user(); // جلب بيانات المستخدم الحالي
                    return view('profile.Privacy_Policy');
                }
                                // 📌 عرض صفحة My_Wallet
                                public function Wallet()
                                {
                                    $user = Auth::user(); // جلب بيانات المستخدم الحالي
                                    return view('profile.My_Wallet');
                                }
                                                                                 // 📌 عرض صفحة Payment_Method
                                                                                 public function Payment()
                                                                                 {
                                                                                     $user = Auth::user(); // جلب بيانات المستخدم الحالي
                                                                                     return view('profile.Payment_Method');
                                                                                 }                                                             

                                                                                    // 📌 عرض صفحة Term
                                                                                    public function term()
                                                                                    {
                                                                                        $user = Auth::user(); // جلب بيانات المستخدم الحالي
                                                                                        return view('profile.Term');
                                                                                    }
}
