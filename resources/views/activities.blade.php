@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الأنشطة الرياضية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-[#512da8] text-white p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">إدارة الأنشطة الرياضية</h1>
        <a href="/activities/create" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">إضافة نشاط جديد</a>
    </header>
    
    <div class="container mx-auto mt-6 p-6 bg-white shadow-md rounded-lg">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-[#512da8] text-white">
                    <th class="p-3 border">#</th>
                    <th class="p-3 border">اسم النشاط</th>
                    <th class="p-3 border">الوصف</th>
                    <th class="p-3 border">الصورة</th>
                    <th class="p-3 border">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                <tr class="odd:bg-gray-200 even:bg-gray-100 hover:bg-gray-300 transition text-black">
                    <td class="p-3 border">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $activity->name }}</td>
                    <td class="p-3 border">{{ $activity->description }}</td>
                    <td class="p-3 border">
                        <img src="{{ asset('storage/' . $activity->logo) }}" alt="Activity Image" class="w-24 h-auto rounded">
                    </td>
                    <td class="p-3 border flex space-x-2">
                    <a href="{{ route('activities.update', $activity->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">تعديل</a>

<form action="{{ route('activities.destroy', $activity->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا النشاط؟');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">حذف</button>
</form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <footer class="mt-6 text-center p-4 bg-gray-800 text-white">
        <p>© 2024 جميع الحقوق محفوظة - إدارة الأنشطة الرياضية</p>
    </footer>
</body>
</html>

@endsection