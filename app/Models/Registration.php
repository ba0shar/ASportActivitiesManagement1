<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_id',
        'join_time',
        'leave_time',
    ];

    // علاقة التسجيل بالمستخدم (Registration belongs to User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة التسجيل بالنشاط (Registration belongs to Activity)
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
