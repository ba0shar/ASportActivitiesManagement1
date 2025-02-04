
@extends('layouts.apps')

@section('title', 'طرق الدفع')

@section('content')
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-700 text-center">💳 طرق الدفع</h1>

        <h2 class="text-xl font-semibold text-gray-700 mt-6">🔹 البطاقات المحفوظة</h2>
        <ul class="mt-3">
            <li class="bg-gray-200 p-3 rounded my-2 flex justify-between items-center">
                <span>💳 فيزا - **** 1234</span>
                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">❌ حذف</button>
            </li>
            <li class="bg-gray-200 p-3 rounded my-2 flex justify-between items-center">
                <span>💳 ماستر كارد - **** 5678</span>
                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">❌ حذف</button>
            </li>
        </ul>

        <h2 class="text-xl font-semibold text-gray-700 mt-6">➕ إضافة بطاقة جديدة</h2>
        <form class="mt-3">
            <label class="block text-gray-700 font-medium">💳 رقم البطاقة</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="أدخل رقم البطاقة">
            
            <label class="block text-gray-700 font-medium mt-3">📅 تاريخ الانتهاء</label>
            <input type="month" class="w-full p-2 border border-gray-300 rounded mt-1">
            
            <label class="block text-gray-700 font-medium mt-3">🔑 رمز CVV</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="3 أرقام خلف البطاقة">
            
            <button class="w-full bg-green-500 text-white py-2 rounded mt-4 hover:bg-green-600">
                ✅ إضافة البطاقة
            </button>
        </form>

        <div class="flex justify-between mt-6">
            <a href="{{ route('profile.My_Wallet') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                ⬅️ العودة للمحفظة
            </a>
            <a href="{{ route('activities.my') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                🏠 الرئيسية
            </a>
        </div>
    </div>

    @endsection
