<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'verification_code' => 'required|string',
        ]);

        $user = User::where('email', $request->email)
                    ->where('verification_code', $request->verification_code)
                    ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'كود التحقق غير صحيح.',
            ]);
        }

        // تحديث حالة التحقق
        $user->is_verified = true;
        $user->verification_code = null;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'تم التحقق من الحساب بنجاح!',
            'redirect' => route('auth.login'), // إعادة التوجيه إلى تسجيل الدخول
        ]);
    }
}
