<?php
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\VerificationController;


Route::get('/activities', [ActivityController::class, 'index'])->name('activities');

// صفحة الترحيب
Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
// تعريف routes للأنشطة
Route::get('/activity/{name}/details', function ($name) {
    return view('activity.details', ['activityName' => $name]);
})->name('activity.details');

Route::get('/activity/{name}/register', function ($name) {
    return view('activity.register', ['activityName' => $name]);
})->name('activity.register');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activity.details');
Route::middleware('auth')->group(function () {
    Route::match(['get', 'post'], '/activities/{activity}/register', [ActivityController::class, 'register'])->name('activities.register');
    Route::get('/my-activities', [ActivityController::class, 'myActivities'])->name('activities.my')->middleware('auth');

    Route::post('/activities/{activity}/leave', [ActivityController::class, 'leave'])->name('activities.leave');
});

// صفحات التسجيل وتسجيل الدخول
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

// لوحة التحكم - تتطلب تسجيل الدخول
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth') // التأكد من تسجيل الدخول
    ->name('dashboard');
   
// مسارات PasswordController
Route::middleware('auth')->group(function () {
    Route::get('/passwords/create', [PasswordController::class, 'create'])->name('passwords.create');
    Route::post('/passwords', [PasswordController::class, 'store'])->name('passwords.store');
    Route::get('/passwords', [PasswordController::class, 'index'])->name('passwords.index');
    Route::delete('/passwords/{id}', [PasswordController::class, 'destroy'])->name('passwords.destroy');
    Route::get('/passwords/generate', [PasswordController::class, 'generateView'])->name('passwords.generateView');
    Route::post('/passwords/generate', [PasswordController::class, 'generate'])->name('passwords.generate');
    Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');
    Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
    Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/messages', [ChatController::class, 'getMessages'])->name('chat.messages');
// صفحات إضافية
Route::get('/about', [SettingsController::class, 'about'])->name('about');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/help', [ProfileController::class, 'help'])->name('profile.help');
Route::get('/Policy', [ProfileController::class, 'Privacy'])->name('profile.Privacy_Policy');

Route::get('/My_Wallet', [ProfileController::class, 'Wallet'])->name('profile.My_Wallet');
Route::get('/Payment_Method', [ProfileController::class, 'Payment'])->name('profile.Payment_Method');
// تحديث بيانات المستخدم
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});
Route::get('/term', [ProfileController::class, 'term'])->name('profile.Term');
// مسارات الإعدادات
Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'showSettings'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'updateSettings'])->name('settings.update');

});



// تسجيل الخروج
Route::post('/logout', function () {
    Auth::logout(); // يقوم بتسجيل الخروج
    return redirect('/'); // إعادة التوجيه إلى صفحة الترحيب
})->name('logout');
Route::get('/verify', function () {
    return view('auth.verify');
})->name('verify');
Route::post('/verify/process', [VerificationController::class, 'verify'])->name('verify.process');
Route::post('/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.process');
Route::get('/succes', [AuthController::class, 'succes'])->name('auth.succes');
Route::middleware('auth')->group(function () {

    

});


