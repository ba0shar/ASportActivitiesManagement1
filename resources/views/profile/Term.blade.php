
@extends('layouts.apps')

@section('title', '>>الشروط والأحكام ')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-purple-700 mb-4 text-center">📜 الشروط والأحكام</h1>
        <p class="text-gray-600 text-center mb-6">آخر تحديث: <span class="font-semibold">يناير 2025</span></p>

        <!-- شروط المشاركين -->
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-blue-700 mb-3">👤 شروط وأحكام المشاركين</h2>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-blue-600">🔹 إنشاء الحساب</h3>
                <p class="text-gray-700">
                    يجب على المشاركين إنشاء حساب على المنصة والتأكد من أن المعلومات المقدمة دقيقة ومحدثة.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-blue-600">🔞 الحد الأدنى للعمر</h3>
                <p class="text-gray-700">
                    يجب أن يكون عمر المشاركين 18 عامًا على الأقل للتسجيل واستخدام المنصة.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-blue-600">🎯 الانضمام للأنشطة</h3>
                <p class="text-gray-700">
                    يمكن للمشاركين الانضمام إلى الأنشطة المتاحة طالما أن هناك أماكن شاغرة.
                </p>
                <p class="text-gray-700">
                    يجب دفع الرسوم المقررة من خلال نظام المحفظة الخاص بالمنصة.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-blue-600">💰 المدفوعات والتكاليف</h3>
                <p class="text-gray-700">
                    يتحمل المشاركون مسؤولية دفع الرسوم المحددة لكل نشاط.
                </p>
                <p class="text-gray-700">
                    لا يتم استرداد الرسوم إلا في حالة إلغاء النشاط من قبل المنظم.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-blue-600">💬 التواصل مع الأعضاء</h3>
                <p class="text-gray-700">
                    يمكن للمشاركين التفاعل مع أعضاء النشاط الآخرين عبر الدردشة الجماعية مع الالتزام بآداب التواصل.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-blue-600">⭐ التقييم والمراجعات</h3>
                <p class="text-gray-700">
                    يمكن للمشاركين تقييم الأنشطة والمشاركين الآخرين بعد الانتهاء منها، مع الحرص على العدالة وتجنب التعليقات المسيئة.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-blue-600">⚠️ الاستخدام المسؤول</h3>
                <p class="text-gray-700">
                    يُحظر أي استخدام غير قانوني أو انتهاك لسياسات المنصة.
                </p>
                <p class="text-gray-700">
                    تحتفظ المنصة بحق تعليق الحسابات التي تنتهك هذه الشروط.
                </p>
            </section>
        </div>

        <!-- شروط المنظمين -->
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-green-700 mb-3">📢 شروط وأحكام المنظمين</h2>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-green-600">📌 إنشاء الأنشطة</h3>
                <p class="text-gray-700">
                    يُسمح فقط للمستخدمين الحاصلين على دور "منظم" بإنشاء الأنشطة.
                </p>
                <p class="text-gray-700">
                    يجب على المنظمين تقديم معلومات دقيقة حول أنشطتهم، بما في ذلك الموقع والتكلفة والعدد الأقصى للمشاركين.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-green-600">🔞 الحد الأدنى للعمر</h3>
                <p class="text-gray-700">
                    يجب أن يكون عمر المنظمين 18 عامًا على الأقل لإنشاء وإدارة الأنشطة.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-green-600">🔄 إدارة الأنشطة</h3>
                <p class="text-gray-700">
                    يتحمل المنظمون مسؤولية إدارة الأنشطة بشكل احترافي وإبلاغ المشاركين بأي تغييرات.
                </p>
                <p class="text-gray-700">
                    في حالة الإلغاء، يجب على المنظم إخطار المشاركين ورد أي مدفوعات مستحقة.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-green-600">💰 المسؤوليات المالية</h3>
                <p class="text-gray-700">
                    يجب على المنظمين توزيع التكاليف بشكل عادل بين المشاركين باستخدام أدوات المنصة.
                </p>
                <p class="text-gray-700">
                    يتم خصم نسبة محددة كرسوم خدمة من قبل المنصة.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-green-600">⭐ التقييمات والمراجعات</h3>
                <p class="text-gray-700">
                    للمشاركين الحق في مراجعة الأنشطة والمنظمين، لذلك يُنصح المنظمون بالحفاظ على معايير عالية للحصول على تقييمات إيجابية.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-green-600">⚖️ الامتثال للسياسات</h3>
                <p class="text-gray-700">
                    يجب على المنظمين الامتثال لجميع القوانين المعمول بها وسياسات المنصة، بما في ذلك حماية البيانات وخصوصية المستخدم.
                </p>
                <p class="text-gray-700">
                    يُحظر إنشاء أنشطة غير قانونية أو مخالفة لسياسات المنصة.
                </p>
            </section>

            <section class="mb-4">
                <h3 class="text-xl font-semibold text-green-600">❌ الإلغاء والتعديلات</h3>
                <p class="text-gray-700">
                    يحق للمنظمين تعديل أو إلغاء الأنشطة بشرط إخطار المشاركين مسبقًا.
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
