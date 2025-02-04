<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'description',
        'category',
        'price',
        'start_time',
        'end_time',
        'location',
    ];

    // علاقة النشاط بالتسجيلات (Activity has many registrations)
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    public function users()
{
    return $this->belongsToMany(User::class, 'activity_user')->withPivot('join_time', 'leave_time')->withTimestamps();;
}

public function users2()
{
    return $this->belongsToMany(User::class)
        ->withPivot('join_time', 'leave_time')
        ->withTimestamps();
}
}
