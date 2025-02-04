
@extends('layouts.apps')

@section('title', ' بروفايل ')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="profile-header">
  
    <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="activity-img">

        <div>
            <h3>{{ $user->name }}</h3>
            <p>{{ $user->email }}</p>
            <div class="stars">
    <div class="star" data-value="5"></div>
    <div class="star" data-value="4"></div>
    <div class="star" data-value="3"></div>
    <div class="star" data-value="2"></div>
    <div class="star" data-value="1"></div>
</div>
        </div>

    </div>

    <div class="profile-actions">
        <button onclick="toggleEditForm()">✏️ تعديل المعلومات</button>
        <!-- ✅ نموذج تعديل البيانات -->
        <form id="edit-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="hidden mt-4 bg-gray-100 p-4 rounded">
            @csrf
            <label class="block mb-2">👤 الاسم:</label>
            <input type="text" name="name" value="{{ $user->name }}" required class="w-full p-2 border rounded">
            <label class="block mt-2 mb-2">  رقم الهاتف:</label>
            <input type="text" name="phone" value="{{ $user->phone }}" required class="w-full p-2 border rounded">
           
            <label class="block mt-2 mb-2">📧 البريد الإلكتروني:</label>
            <input type="email" name="email" value="{{ $user->email }}" required class="w-full p-2 border rounded">
            <label class="block mt-2 mb-2">🖼️ الصورة الشخصية:</label>
            <input type="file" name="avatar" class="w-full p-2 border rounded">
            <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">💾 حفظ التغييرات</button>
        </form>
    </div>

    <h2 class="text-xl font-bold mt-6 mb-4">القائمة:</h2>
    <ul class="profile-menu">
        <li><a href="{{ route('profile.show') }}"><i class="fas fa-user"></i> البروفايل</a></li>
        <li><a href="#"><i class="fas fa-pencil-alt"></i> تعديل البروفايل</a></li>
        <li><a href="#"><i class="fas fa-key"></i>تعديل كلمة المرور</a></li>
        <li><a href="{{ route('profile.My_Wallet') }}"><i class="fas fa-wallet"></i> محفظتي</a></li>
        <li><a href="{{ route('profile.Payment_Method') }}"><i class="fas fa-credit-card"></i>طريقة الدفع</a></li>
        <li><a href="#"><i class="fas fa-globe"></i> اللغة</a></li>
        <li><a href="#"><i class="fas fa-bell"></i> الاشعارات</a></li>
        <li><a href="#"><i class="fas fa-moon"></i>الوضع المظلم</a></li>
        <li><a href="{{ route('profile.Privacy_Policy') }}"><i class="fas fa-shield-alt"></i> الامان وسياسة الخصوصية</a></li>
        <li><a href="{{ route('profile.Term') }}"><i class="fas fa-file-alt"></i> الشروط والأحكام</a></li>
        <li><a href="{{ route('profile.help') }}"><i class="fas fa-headset"></i> الدعم والمساعدة</a></li>
        <li><a href="#"><i class="fas fa-question-circle"></i> FAQ</a></li>
        <li><a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>

<script>
    function toggleEditForm() {
        document.getElementById("edit-form").classList.toggle("hidden");
    }
</script>
<script>
    // خاصية التقييم
    const stars = document.querySelectorAll('.star');
    let currentRating = 0;

    stars.forEach(star => {
        star.addEventListener('click', () => {
            // حفظ التقييم المختار
            currentRating = star.getAttribute('data-value');
            updateStars(currentRating);
            console.log("تم التقييم بـ: " + currentRating + " نجوم");
        });

        // تغيير لون النجوم عند المرور عليها
        star.addEventListener('mouseover', () => {
            const rating = star.getAttribute('data-value');
            updateStars(rating);
        });

        // إعادة النجوم إلى حالتها الأصلية عند الخروج من النجوم
        star.addEventListener('mouseleave', () => {
            updateStars(currentRating);
        });
    });

    // دالة لتحديث النجوم بناءً على التقييم
    function updateStars(rating) {
        stars.forEach(star => {
            const value = star.getAttribute('data-value');
            if (value <= rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }
</script>

@endsection
