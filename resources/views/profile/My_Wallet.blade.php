@extends('layouts.apps')

@section('title', 'محفظتي')

@section('content')
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-purple-700 text-center">💰 محفظتي</h1>
        <div class="text-center mt-4">
            <p class="text-gray-600">رصيدك الحالي:</p>
            <p class="text-4xl font-bold text-green-600">150.00$</p>
        </div>

        <button class="w-full bg-blue-500 text-white py-2 rounded mt-4 hover:bg-blue-600">
            ➕ إضافة رصيد
        </button>

        <h2 class="text-xl font-semibold text-gray-700 mt-6">📜 سجل المعاملات</h2>
        <ul class="mt-3">
            <li class="bg-gray-200 p-3 rounded my-2">
                ✅ إضافة رصيد - <span class="text-green-600 font-semibold">50$</span> (12 يناير 2025)
            </li>
            <li class="bg-gray-200 p-3 rounded my-2">
                ❌ خصم لحجز نشاط - <span class="text-red-600 font-semibold">20$</span> (10 يناير 2025)
            </li>
            <li class="bg-gray-200 p-3 rounded my-2">
                ✅ استرداد منظم - <span class="text-green-600 font-semibold">10$</span> (8 يناير 2025)
            </li>
        </ul>

        <div class="flex justify-between mt-6">
            <a href="{{ route('activities.my') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                ⬅️ العودة للرئيسية
            </a>
            <a href="{{ route('profile.Payment_Method') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                💳 إدارة الدفع
            </a>
        </div>
    </div>
    @endsection
