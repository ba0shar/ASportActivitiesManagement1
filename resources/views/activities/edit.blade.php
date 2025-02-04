@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center mb-4 text-gray-800">تعديل النشاط</h2>

    <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700">اسم النشاط:</label>
            <input type="text" id="name" name="name" value="{{ $activity->name }}" required 
                class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold text-gray-700">وصف النشاط:</label>
            <textarea id="description" name="description" rows="4" required 
                class="w-full p-2 border border-gray-300 rounded">{{ $activity->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="logo" class="block font-semibold text-gray-700">تحديث الشعار:</label>
            <input type="file" id="logo" name="logo" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="start_time" class="block font-semibold text-gray-700">وقت البدء:</label>
            <input type="time" id="start_time" name="start_time" value="{{ $activity->start_time }}" required 
                class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="end_time" class="block font-semibold text-gray-700">وقت الانتهاء:</label>
            <input type="time" id="end_time" name="end_time" value="{{ $activity->end_time }}" required 
                class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-6">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                تحديث النشاط
            </button>
        </div>
    </form>
</div>
@endsection
