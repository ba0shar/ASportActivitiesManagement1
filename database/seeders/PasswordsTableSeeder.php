<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Password;

class PasswordsTableSeeder extends Seeder
{
    public function run()
    {
        // إضافة بعض بيانات كلمات المرور الوهمية
        Password::create([
            'service_name' => 'Google',
            'encrypted_password' => encrypt('google_password123'),
            'iv' => 'random_iv_string',
        ]);

        Password::create([
            'service_name' => 'Facebook',
            'encrypted_password' => encrypt('facebook_password456'),
            'iv' => 'random_iv_string',
        ]);

        // يمكنك إضافة المزيد من البيانات حسب الحاجة
    }
}
