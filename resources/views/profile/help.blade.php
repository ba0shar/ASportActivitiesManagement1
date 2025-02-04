
@extends('layouts.apps') <!-- استخدام القالب الرئيسي -->

@section('title', 'الدعم والمساعدة ') <!-- عنوان الصفحة -->

@section('content')
    <div class="container">
        <h2>الدعم والمساعدة</h2>
        <h3>الأسئلة الشائعة</h3>
        <div class="faq-item" onclick="toggleFAQ(1)">كيف يمكنني تغيير كلمة المرور؟</div>
        <div id="faq1" class="faq-answer">يمكنك تغيير كلمة المرور من خلال إعدادات الحساب.</div>
        
        <div class="faq-item" onclick="toggleFAQ(2)">كيف يمكنني حذف حسابي؟</div>
        <div id="faq2" class="faq-answer">لحذف حسابك، انتقل إلى "إعدادات الحساب" ثم اختر "حذف الحساب".</div>
        
        <h3>تواصل معنا</h3>
        <form class="contact-form">
            <input type="text" placeholder="الاسم" required>
            <input type="email" placeholder="البريد الإلكتروني" required>
            <textarea placeholder="رسالتك" rows="5" required></textarea>
            <button type="submit">إرسال</button>
        </form>
    </div>

    <script>
        function toggleFAQ(id) {
            var answer = document.getElementById("faq" + id);
            answer.style.display = (answer.style.display === "block") ? "none" : "block";
        }
    </script>

@endsection
