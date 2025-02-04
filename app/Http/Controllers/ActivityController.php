<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class ActivityController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        view()->share('user', $user);
        $activities = Activity::all(); // جلب جميع الأنشطة من قاعدة البيانات
        return view('activities', compact('activities'));

    }

       /**
     * عرض نموذج إنشاء نشاط جديد.
     */
    public function create()
    {
        $user = Auth::user();
        view()->share('user', $user);
        return view('activities.create');
      
    }
    public function update(Request $request, Activity $activity)
    {
                $user = Auth::user();
        view()->share('user', $user);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_time' => 'required',
            'end_time' => 'required',
        ]); 
    
        // تحديث البيانات
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->start_time = $request->start_time;
        $activity->end_time = $request->end_time;
    
        // تحديث الصورة إذا تم تحميل صورة جديدة
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('activities', 'public');
            $activity->logo = $logoPath;
        }
    
        $activity->save();
    
        return redirect()->route('activities')->with('success', 'تم تحديث النشاط بنجاح!');

    }
    public function store2(Request $request)
{
    try {
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string',
            'price' => 'nullable|string',
            'description' => 'nullable|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
        ]);

        // حفظ صورة النشاط إذا تم تحميلها
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName =  $file->getClientOriginalName(); // إضافة وقت لضمان عدم التكرار
            $logoPath = $file->storeAs('activities', $fileName, 'public'); // حفظ بنفس الاسم
        }

        // إنشاء النشاط
        Activity::create([
            'name' => strip_tags($request->name), // إزالة أي أكواد HTML غير مرغوب فيها
            'logo' => $logoPath,
            'category' => strip_tags($request->category),
            'price' => $request->price,
            'description' => strip_tags($request->description),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => strip_tags($request->location),
        ]);

        return redirect()->route('activities')->with('success', 'تم إنشاء النشاط بنجاح!');
    } catch (\Exception $e) {
        Log::error('فشل في إنشاء النشاط: ' . $e->getMessage());
        return back()->withErrors(['error' => 'حدث خطأ أثناء حفظ النشاط. الرجاء المحاولة مرة أخرى.'])->withInput();
    }
}
    /**
     * حفظ النشاط الجديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string',
            'price' => 'nullable|string',
            'description' => 'nullable|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
        ]);

        // حفظ صورة النشاط إذا تم تحميلها
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('activities', 'public');
        }

        // إنشاء النشاط
        Activity::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => $request->location,
        ]);

        return redirect()->route('activities')->with('success', 'تم إنشاء النشاط بنجاح!');
    }
    public function destroy($id)
{
    $activity = activity::findOrFail($id);
    $activity->delete();
    return redirect()->route('activities')->with('success', 'تم حذف النشاط بنجاح!');
}
public function show(Activity $activity)
{
    return view('activities.details', compact('activity'));
}
// تسجيل المستخدم في النشاط
public function register(Activity $activity, Request $request)
{
    $user = Auth::user();

    // التحقق من أن النشاط موجود
    if (!$activity) {
        return response()->json([
            'success' => false,
            'message' => 'النشاط غير موجود.'
        ], 404);
    }

    // التحقق من أن المستخدم ليس مسجلًا بالفعل في النشاط
    if ($user->activities()->where('activity_id', $activity->id)->exists()) {
        return response()->json([
            'success' => false,
            'message' => 'لقد سجلت بالفعل في هذا النشاط.'
        ], 400);
    }

    // تسجيل المستخدم في النشاط مع وقت الانضمام
    $user->activities()->attach($activity->id, ['join_time' => now()]);

    // ✅ إذا كان الطلب AJAX، نُعيد استجابة JSON
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'activity_name' => $activity->name
        ]);
    }

    // ✅ إذا كان الطلب عاديًا (ليس AJAX)، نُعيد التوجيه
    return back()->with('success', 'تم التسجيل في النشاط بنجاح!');
}

    public function leave(Activity $activity)
    {
        $user = Auth::user();
        view()->share('user', $user);
        // التحقق من أن المستخدم مسجل في النشاط
        if (!$user->activities()->where('activity_id', $activity->id)->exists()) {
            return back()->with('error', 'أنت غير مسجل في هذا النشاط.');
        }
    
        // تحديث وقت الخروج
        $user->activities()->updateExistingPivot($activity->id, ['leave_time' => now()]);
    
        // جلب الأنشطة التي خرج منها
        $leftActivities = $user->activities()->whereNotNull('activity_user.leave_time')->get();
    
        // جلب الأنشطة التي لا يزال مسجلًا بها
        $activeActivities = $user->activities()->whereNull('activity_user.leave_time')->get();
        $suggestedActivities = Activity::whereDoesntHave('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();
        return view('activities.my', compact('leftActivities', 'activeActivities', 'suggestedActivities'));
    }
    
public function myActivities2()
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً!');
    }

    $user = Auth::user();
    view()->share('user', $user);

    // جلب الأنشطة التي لا يزال المستخدم مسجلاً فيها (لم يخرج بعد)
    $activeActivities = $user->activities()->whereNull('activity_user.leave_time')->get();

    // جلب الأنشطة التي قام المستخدم بالخروج منها
    $leftActivities = $user->activities()->whereNotNull('activity_user.leave_time')->get();
        // جلب الأنشطة المقترحة (الأنشطة التي لم ينضم إليها المستخدم بعد)


    return view('activities.my', compact('activeActivities', 'leftActivities'));
}
public function myActivities()
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً!');
    }

    $user = Auth::user();
    view()->share('user', $user);

    // جلب الأنشطة التي لا يزال المستخدم مسجلاً فيها (لم يخرج بعد)
    $activeActivities = $user->activities()->whereNull('activity_user.leave_time')->get();

    // جلب الأنشطة التي قام المستخدم بالخروج منها
    $leftActivities = $user->activities()->whereNotNull('activity_user.leave_time')->get();

    // جلب الأنشطة المقترحة (الأنشطة التي لم ينضم إليها المستخدم بعد)
    $suggestedActivities = Activity::whereDoesntHave('users', function ($query) use ($user) {
        $query->where('users.id', $user->id);
    })->get();

    return view('activities.my', compact('activeActivities', 'leftActivities', 'suggestedActivities'));
}
 


}
