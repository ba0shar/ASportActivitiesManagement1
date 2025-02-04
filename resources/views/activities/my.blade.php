@extends('layouts.apps') <!-- استخدام القالب الرئيسي -->

@section('title', 'إدارة الأنشطة ') <!-- عنوان الصفحة -->

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4 text-black">إدارة الأنشطة</h2>
    <div class="search-bar">
            <input type="text" id="searchInputs" placeholder="بحث عن الأنشطة..."  class="border p-2 rounded w-full"/>
            
            <div class="search-box">
                <button id="searchButton">بحث 🔍</button>
            </div>
        </div>
    <div class="flex space-x-2 mb-4">
    <button class="tab-btn active-tab" data-tab="joined">أنشطتي</button>
        <button class="tab-btn " data-tab="suggested">أنشطة مقترحة</button>
        
        <button class="tab-btn" data-tab="left"> الأنشطة السابقة</button>
       
    </div>
   
       <!-- الأنشطة المنضمة -->
<div id="joined" class="tab-content">
    <h3 class="text-xl font-bold text-green-600">أنشطتي</h3>
    <div class="line"></div>
    @if($activeActivities->isEmpty())
        <p class="text-gray-500 mt-4">لم تعد مشتركًا في أي أنشطة حاليًا.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($activeActivities as $activity)
                <div class="activity-item" data-name="{{ $activity->name }}">
                    @include('components.unactivity_card', ['activity' => $activity, 'leavable' => true])
                </div>
            @endforeach
        </div>
    @endif
</div>

    <!-- الأنشطة المقترحة -->
    <div id="suggested" class="tab-content hidden">
        <h3 class="text-xl font-bold text-blue-600">الأنشطة المقترحة</h3>
        <div class="line"></div>
        <div class="card-content">
        @if($suggestedActivities->isEmpty())
        <p class="text-gray-500 mt-4"> لا يوجد أنشطة حالية </p>
    @else
            @foreach($suggestedActivities as $activity)
                <div class="activity-item" data-name="{{ $activity->name }}">
                    @include('components.activity_card', ['activity' => $activity, 'joinable' => true])
                </div>
            @endforeach
        </div>
        @endif
    </div>
    <!-- الأنشطة التي غادرها المستخدم -->
    <div id="left" class="tab-content hidden">
        <h3 class="text-xl font-bold text-red-600">الأنشطة  السابقة</h3>
        <div class="line"></div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @if($leftActivities->isEmpty())
        <p class="text-gray-500 mt-4"> لا يوجد أنشطة سابقة </p>
    @else
            @foreach($leftActivities as $activity)
                <div class="activity-item" data-name="{{ $activity->name }}">
                    @include('components.Activity_Ratingblade', ['activity' => $activity])
                </div>
            @endforeach
        </div>
        @endif
    </div>

</div>
<!-- ✅ كود البحث باستخدام JavaScript -->
<script>
    document.getElementById("searchInputs").addEventListener("input", function () {
        let filter = this.value.toLowerCase();
        let activities = document.querySelectorAll(".activity-item");

        activities.forEach(activity => {
            let name = activity.getAttribute("data-name");
            if (name && name.toLowerCase().includes(filter)) {
                activity.style.display = "block"; // عرض العنصر
            } else {
                activity.style.display = "none"; // إخفاء العنصر
            }
        });
    });
</script>

@endsection
