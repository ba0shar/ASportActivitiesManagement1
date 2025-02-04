<?php

namespace App\Helpers;

class EncryptionHelper
{
    // دالة لتشفير كلمة المرور
    public static function encryptPassword($password)
    {
        // إنشاء IV عشوائي بطول 16 بايت
        $iv = random_bytes(16);
        $key = config('app.key'); // استخدام المفتاح السري من config
        
        // تشفير كلمة المرور باستخدام خوارزمية AES-256-CBC
        $encrypted = openssl_encrypt($password, 'AES-256-CBC', $key, 0, $iv);
        
        // إرجاع النتيجة مع الـ IV المحفوظ بصيغة base64
        return ['encrypted' => $encrypted, 'iv' => base64_encode($iv)];
    }

    // دالة لفك تشفير كلمة المرور
    public static function decryptPassword($encryptedPassword, $iv)
    {
        $key = config('app.key'); // استخدام المفتاح السري من config
        
        // فك تشفير الـ IV من base64
        $iv = base64_decode($iv);
        
        // تأكد من أن الـ IV طوله 16 بايت
        if (strlen($iv) !== 16) {
            throw new \Exception("Invalid IV length. The IV must be exactly 16 bytes long.");
        }
        
        // فك تشفير كلمة المرور باستخدام openssl
        return openssl_decrypt($encryptedPassword, 'AES-256-CBC', $key, 0, $iv);
    }
}
