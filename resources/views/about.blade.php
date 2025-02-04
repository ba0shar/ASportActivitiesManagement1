@extends('layouts.apps') <!-- استخدام القالب الرئيسي -->

@section('title', 'من نحن؟') <!-- عنوان الصفحة -->

@section('content')
    <div class="bg-white p-6 rounded shadow-md">
        <h1 class="text-3xl font-bold text-purple-700 mb-4">من نحن؟</h1>

        <p class="text-gray-700 leading-relaxed">
            مرحبًا بك في **إدارة الأنشطة الرياضية**، المنصة الرائدة لتنظيم وإدارة الأنشطة الرياضية في مختلف المجالات.  
            نهدف إلى تسهيل عملية تنظيم البطولات والأنشطة الرياضية للمؤسسات، الأكاديميات، والأفراد المهتمين بالرياضة.
        </p>

        <h2 class="text-2xl font-semibold text-purple-600 mt-6 mb-2">🎯 هدفنا</h2>
        <p class="text-gray-700">
            نحن نسعى إلى تقديم **منصة إلكترونية متكاملة** تمكن المستخدمين من إنشاء وإدارة الأنشطة الرياضية بسهولة، والتواصل مع المشاركين، 
            وتتبع نتائج المباريات والأحداث الرياضية بطريقة حديثة وفعالة.
        </p>

        <h2 class="text-2xl font-semibold text-purple-600 mt-6 mb-2">🔹 ماذا نقدم؟</h2>
        <ul class="list-disc pl-6 text-gray-700">
            <li>إنشاء وإدارة الفعاليات والأنشطة الرياضية.</li>
            <li>نظام تسجيل سهل للمشاركين.</li>
            <li>لوحة تحكم لمتابعة تفاصيل الفعاليات.</li>
            <li>إمكانية التواصل بين المنظمين والمشاركين عبر الدردشة.</li>
            <li>عرض تفاصيل الأنشطة ونتائج المباريات بشكل جذاب.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-purple-600 mt-6 mb-2">🛠 التقنيات المستخدمة</h2>
        <p class="text-gray-700">
            نعتمد على أحدث **التقنيات الحديثة** لضمان أداء قوي وسلس للموقع، ومن هذه التقنيات:
        </p>
        <ul class="list-disc pl-6 text-gray-700">
            <li><strong>Laravel</strong> - إطار العمل الأساسي للباك-إند.</li>
            <li><strong>Blade</strong> - نظام القوالب لإنشاء الصفحات بسهولة.</li>
            <li><strong>Tailwind CSS</strong> - لتصميم واجهة المستخدم بأسلوب عصري.</li>
            <li><strong>JavaScript & AJAX</strong> - لتحسين التفاعل مع المستخدم.</li>
            <li><strong>MySQL</strong> - لإدارة البيانات بكفاءة.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-purple-600 mt-6 mb-2">📞 تواصل معنا</h2>
        <p class="text-gray-700">
            إذا كان لديك أي استفسار أو اقتراح، يمكنك التواصل معنا عبر البريد الإلكتروني:
            <a href="mailto:support@sports-management.com" class="text-blue-500 underline">support@sports-management.com</a>
        </p>
    </div>
@endsection

@push('scripts')
    <script>
        console.log("صفحة من نحن؟ تم تحميلها بنجاح!");
    </script>
@endpush
