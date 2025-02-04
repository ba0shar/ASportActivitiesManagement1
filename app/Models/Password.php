<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    // يمكن تعديل هذا الجدول إذا كان اسم الجدول مختلفًا
    protected $table = 'passwords';

    // إضافة الأعمدة القابلة للتعبئة
    protected $fillable = ['user_id', 'service_name', 'encrypted_password', 'iv'];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
 