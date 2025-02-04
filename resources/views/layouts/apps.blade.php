<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'إدارة الأنشطة')</title>

    <!-- الروابط الخارجية -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* أنماط CSS */
        .hidden { display: none; }
        .active-tab { background: #6B46C1; color: white; }
        .container { width: 80%; max-width: 900px; }
        .hidden { display: none; }
        .active-tab { background: #6B46C1; color: white; }
        .container {
            width: 80%;
            max-width: 900px;
        }
        .notification-icon {
            position: relative;
            cursor: pointer;
        }
        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: red;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        .notification-list {
            position: absolute;
            right: 0;
            top: 40px;
            background: white;
            width: 250px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            display: none;
            z-index: 1000;
        }
        .notification-list.active {
            display: block;
        }
        .notification-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #000;
        }
        .notification-item:last-child {
            border-bottom: none;
        }
        #notification-box {
    display: none;
    position: absolute;
    top: 40px;
    right: 0;
    background: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 10px;
    z-index: 100;
}

#notification-box ul {
    max-height: 200px;
    overflow-y: auto;
}

#notification-box.show {
    display: block;
}
        header {
            background: linear-gradient(135deg, #512da8, #673ab7);
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header img {
            width: 50px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            background-attachment: fixed;
            background-color:rgb(255, 255, 255);
            border-radius: 10px;
            
        }

        .logo2 span {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .logo img {
            width: 80px;
            height: 50px;
        }
        .logo2 {
            display: flex;
            align-items: center;
            gap: 10px;
            background-attachment: fixed;
            
            
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1rem;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #03a9f4;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box input {
            padding: 0.5rem;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        .search-box button {
            padding: 0.5rem 1rem;
            background-color:#0288d1;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-box button:hover {
            background-color: #0288d1;
        }
        .search-bar .search-btn:hover {
            background-color:rgb(45, 126, 213);
        }
        .search-bar {
            display: flex;
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .search-bar input {
            
            flex: 1;
            border: none;
            padding: 10px;
            font-size: 14px;
        }

        .search-bar .search-btn {
            padding: 0.5rem 1rem;
            background-color: #512da8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .activities h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .line {
            width: 100%;
            height: 2px;
            background: #512da8;
            margin-bottom: 20px;
        }

        .card {
            display: flex;
            background:rgb(242, 242, 242);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .activity-img {
            width: 220px;
           
            height: 100;
        }

        .card-content {
            padding: 15px;
            flex: 1;
        }

        .card-content h3 {
            font-size: 18px;
            margin: 0;
        }

        .tag {
            background: #6B46C1;
            color: white;
            padding: 4px 10px;
            border-radius: 10px;
            font-size: 12px;
        }
        .tab-btn:hover {
            background: #0288d1;
            transform: translateY(-2px);
        }
        .info {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #444;
            margin-bottom: 10px;
        }

        .price {
            font-weight: bold;
            color: #0288d1;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        button {
            flex: 1;
            border: none;
            padding: 8px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 15px;
        }

        .join-btn {
            background: #512da8;
            color: white;
            width: 150px;
        }
        .join-btn:hover {
            background: #0288d1;
            transform: translateY(-2px);
        }
        .leave-btn {
            background:rgb(221, 42, 33);
            color: white;
            width: 150px;
        }
        .leave-btn:hover {
            background:rgb(209, 168, 2);
            transform: translateY(-2px);
        }
        .details-btn {
            background: #512da8;
            color: white;
            width: 150px;
        }
        .details-btn:hover {
            background: #0288d1;
            transform: translateY(-2px);

        }
        .activ-btn {
            background:rgb(234, 232, 239);
              width: 150px;
        }
                /* قائمة التنقل */
                .profile-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .profile-menu li {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .profile-menu li:hover {
            background-color: #f0f0f0;
        }
        .profile-menu i {
            margin-left: 10px;
        }
        .profile-menu a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            width: 100%;
        }

        /* تنسيق البروفايل */
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-right: 15px;
        }
        .profile-header h3 {
            margin: 0;
            font-size: 18px;
        }
        .profile-header p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .profile-actions {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .profile-actions button {
            background-color: #512da8;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .profile-actions button:hover {
            background-color: #673ab7;
        }
        .stars {
            display: flex;
            direction: row-reverse;
            justify-content: center;
        }
        .star {
            margin: 5px;
            cursor: pointer;
            position: relative;
            font-size: 20px;
        }
        .star:before {
            content: '\2605'; /* رمز النجمة */
            color: #ddd; /* اللون الرمادي الفاتح */
            transition: color 0.2s ease;
        }
        .star.selected:before {
            color: gold; /* عندما يتم اختيار النجم */
        }
        .star:hover:before {
            color: orange; /* عندما يمر الماوس فوق النجمة */
        }
        .star:hover ~ .star:before {
            color: orange; /* التأثير على النجوم التي تسبقها */
        }
        .faq-item {
            background: #eee;
            padding: 10px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
        }
        .faq-answer {
            display: none;
            padding: 10px;
            background: #ddd;
            border-radius: 5px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form button {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        footer {
            background: #512da8;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 20px;
        }
    </style>
    
    @stack('styles') <!-- إمكانية إضافة أنماط إضافية لكل صفحة -->

</head>
<body>

<!-- ✅ الهيدر (الشريط العلوي) -->
<header>
<div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        
    </div>
    <div class="logo2">
       
        <span>إدارة الأنشطة الرياضية</span>
    </div>
    <nav>
        <ul class="flex gap-4">
        
            <li><a href="{{ route('welcome') }}">🏠 الرئيسية</a></li>
            @if(auth()->check())
            <li><a href="{{ route('activities.my') }}">⚽ الأنشطة</a></li>
            <li><a href="{{ route('profile.show') }}">👤 البروفايل</a></li>
            <li><a href="{{ route('profile.help') }}">❓ الدعم</a></li>
            <li><a href="{{ route('chat.index') }}">💬 الدردشة</a></li>
            @endif
            <li>
    <a href="{{ route('about') }}">
        <i class="fa-solid fa-info-circle"></i> من نحن
    </a>
</li>

@if(auth()->check() && auth()->user()->role === 'admin')
    <li><a href="{{ route('activities') }}">لوحة التحكم</a></li>
@endif


            @if(auth()->check())
                <li>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        🚪 تسجيل الخروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif
        </ul>
    </nav>
    @if(auth()->check())
    <div class="relative">
    <button onclick="toggleNotifications()" class="relative">
        <i class="fas fa-bell text-white text-2xl"></i>
        <span id="notification-count" class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">0</span>
    </button>
    <div id="notification-box" class="absolute right-0 bg-white shadow-md p-2 w-64 hidden">
        <h3 class="text-lg text-black font-bold mb-2">الإشعارات</h3>
        <ul id="notification-list" class="list-none text-sm"></ul>
        <button onclick="clearNotifications()" class="mt-2 bg-red-500 text-white text-xs px-2 py-1 rounded">مسح الكل</button>
    </div>
</div>
@endif
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="ابحث عن نشاط..." class="border text-black p-2 rounded w-full">
        <button>بحث</button>
    </div>
</header>

<!-- ✅ محتوى الصفحة -->
<main class="container mx-auto mt-6">
    @yield('content')
</main>

<!-- ✅ الفوتر -->
<footer>
    <p>© 2024 جميع الحقوق محفوظة - إدارة الأنشطة الرياضية</p>
    <div class="social-links">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
</footer>
<script>
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active-tab'));
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
            
            document.getElementById(this.dataset.tab).classList.remove('hidden');
            this.classList.add('active-tab');
        });
    });
</script>

<script>
    // تحميل الإشعارات المحفوظة عند فتح الصفحة
   // تحميل الإشعارات المحفوظة عند فتح الصفحة
document.addEventListener("DOMContentLoaded", function () {
    loadNotifications();
});

function joinActivity(activityName) {
    let message = `✅ لقد انضممت إلى النشاط: ${activityName}`;
    addNotification(message);
}

function leaveActivity(activityName) {
    let message = `❌ لقد غادرت النشاط: ${activityName}`;
    addNotification(message);
}

function addNotification(message) {
    let notifications = JSON.parse(localStorage.getItem("notifications")) || [];
    notifications.push({ message, date: new Date().toLocaleString() });

    // حفظ الإشعارات في LocalStorage
    localStorage.setItem("notifications", JSON.stringify(notifications));

    // تحديث الواجهة
    displayNotifications();
}

function loadNotifications() {
    let notifications = JSON.parse(localStorage.getItem("notifications")) || [];
    displayNotifications(notifications);
}

function displayNotifications() {
    let notifications = JSON.parse(localStorage.getItem("notifications")) || [];
    let notificationList = document.getElementById("notification-list");
    let notificationCount = document.getElementById("notification-count");

    notificationList.innerHTML = "";

    if (notifications.length === 0) {
        // عرض رسالة "لا توجد إشعارات" إذا كانت القائمة فارغة
        let emptyMessage = document.createElement("li");
        emptyMessage.textContent = "📭 لا توجد إشعارات";
        emptyMessage.style.color = "gray";
        emptyMessage.style.textAlign = "center";
        emptyMessage.style.fontStyle = "italic";
        notificationList.appendChild(emptyMessage);
    } else {
        notifications.forEach((notif, index) => {
            let li = document.createElement("li");

            // تحديد لون النص حسب نوع الإشعار
            if (notif.message.includes("انضممت")) {
                li.style.color = "green";  // لون أخضر عند الانضمام
            } else if (notif.message.includes("غادرت")) {
                li.style.color = "red";  // لون أحمر عند المغادرة
            } else {
                li.style.color = "black"; // لون افتراضي
            }

            li.innerHTML = `${notif.message} <small style="color:gray;">(${notif.date})</small>`;
            notificationList.appendChild(li);
        });
    }

    // تحديث عدد الإشعارات
    notificationCount.innerText = notifications.length;
}

function clearNotifications() {
    localStorage.removeItem("notifications");
    displayNotifications();
}


</script>
<script>
    function toggleNotifications() {
        let box = document.getElementById("notification-box");
        box.classList.toggle("show");
    }
</script>
<script>
    function handleJoin(event, activityId) {
        event.preventDefault(); // منع إعادة تحميل الصفحة

        let form = document.getElementById(`join-form-${activityId}`);
        let formData = new FormData(form);
        let joinButton = form.querySelector(".join-btn"); 

        // تعطيل الزر أثناء الإرسال
        joinButton.disabled = true;
        joinButton.innerText = "جارٍ الانضمام...";

        fetch(form.action, {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content,
                "Accept": "application/json"
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })

        .then(data => {
            if (data.success) {
                addNotification(`✅ انضممت إلى النشاط: ${data.activity_name}`);
                displayNotifications();
                joinButton.innerText = "✅ تم الانضمام";
                joinButton.style.backgroundColor = "#28a745"; 
                
                // تحديث الصفحة بعد الانضمام
                location.reload(); // إعادة تحميل الصفحة
            } else {
                alert(`❌ ${data.message}`);
                joinButton.disabled = false;
                joinButton.innerText = "انضمام";
            }
        })
        .catch(error => {
           
            joinButton.disabled = false;
            joinButton.innerText = "انضمام";
            location.reload(); // إعادة تحميل الصفحة
        });
    }
</script>
<!-- ✅ كود البحث باستخدام JavaScript -->
<script>
    document.getElementById("searchInput").addEventListener("input", function () {
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

@stack('scripts') <!-- إمكانية إضافة سكربتات إضافية لكل صفحة -->
</body>
</html>
