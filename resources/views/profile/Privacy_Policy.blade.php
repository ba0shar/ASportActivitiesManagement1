
@extends('layouts.apps')

@section('title', '>>سياسة الخصوصية ')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-purple-700 mb-4 text-center">📜 سياسة الخصوصية</h1>
        <p class="text-gray-600 text-center mb-6">آخر تحديث: <span class="font-semibold">يناير 2025</span></p>

        <div class="space-y-6">
            <section>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">📌 1. جمع البيانات</h2>
                <p class="text-gray-700">
                    نقوم بجمع بعض البيانات لضمان تحسين تجربة المستخدم داخل التطبيق:
                </p>
                <ul class="list-disc pl-6 mt-2 text-gray-700">
                    <li><strong>البيانات الشخصية:</strong> مثل الاسم، البريد الإلكتروني، ورقم الهاتف عند التسجيل.</li>
                    <li><strong>بيانات الاستخدام:</strong> مثل التفضيلات وسجل الأنشطة داخل التطبيق.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">🔹 2. استخدام البيانات</h2>
                <p class="text-gray-700">
                    نستخدم البيانات التي تم جمعها للأغراض التالية:
                </p>
                <ul class="list-disc pl-6 mt-2 text-gray-700">
                    <li>إدارة وحجز الاجتماعات أو الفعاليات.</li>
                    <li>تحسين تجربة المستخدم وتقديم محتوى وخدمات مخصصة.</li>
                    <li>إرسال الإشعارات والتحديثات المتعلقة بالفعاليات أو الاجتماعات.</li>
                    <li>تحليل البيانات لفهم احتياجات المستخدمين وتطوير خدمات التطبيق.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">🔒 3. مشاركة البيانات</h2>
                <p class="text-gray-700">
                    نحن لا نشارك بياناتك الشخصية مع أطراف ثالثة إلا في الحالات التالية:
                </p>
                <ul class="list-disc pl-6 mt-2 text-gray-700">
                    <li>بموافقة مسبقة من المستخدم.</li>
                    <li>للامتثال للمتطلبات القانونية والتنظيمية.</li>
                    <li>للتعاون مع شركاء موثوقين لتحسين الخدمات المقدمة.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">🗄️ 4. تخزين البيانات</h2>
                <p class="text-gray-700">
                    يتم تخزين البيانات على خوادم آمنة باستخدام تقنيات التشفير الحديثة.
                    ونحتفظ بالبيانات فقط للفترة اللازمة لتحقيق الأغراض التي جُمعت من أجلها.
                </p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">👤 5. حقوق المستخدم</h2>
                <p class="text-gray-700">
                    يحق للمستخدمين الوصول إلى بياناتهم الشخصية وتحديثها أو حذفها في أي وقت من خلال إعدادات الحساب.
                </p>
                <p class="text-gray-700">
                    كما يمكن للمستخدمين تعطيل جمع بيانات الاستخدام أو طلب حذف الحساب بالكامل.
                </p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">🔐 6. الأمان</h2>
                <p class="text-gray-700">
                    نلتزم بحماية بيانات المستخدمين من الوصول غير المصرح به أو التعديل أو التلف، 
                    من خلال تطبيق إجراءات أمان تقنية وإدارية صارمة.
                </p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">⚠️ 7. تغييرات في السياسة</h2>
                <p class="text-gray-700">
                    قد يتم تحديث سياسة الخصوصية من وقت لآخر. سيتم إشعار المستخدمين بأي تغييرات مهمة قبل أن تصبح سارية المفعول.
                </p>
            </section>
        </div>

        <div class="flex justify-between mt-8">
            <a href="{{ route('activities.my') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                ⬅️ العودة للرئيسية
            </a>
            <a href="{{ route('profile.help') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                📞 دعم ومساعدة
            </a>
        </div>
    </div>

@endsection