<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ShareUserData
{
    public function handle($request, Closure $next)
    {
        // مشاركة بيانات المستخدم مع جميع الصفحات
        if (Auth::check()) {
            view()->share('user', Auth::user());
        }

        return $next($request);
    }
}
