
@extends('layouts.apps')

@section('title', ' بروفايل ')

@section('content')
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء نشاط جديد</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }
        .preview-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2 class="text-center mb-4">إنشاء نشاط جديد</h2>
        <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">اسم النشاط:</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}" required placeholder="أدخل اسم النشاط">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">شعار النشاط:</label>
                <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                <img id="logo-preview" class="preview-img">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">نوع النشاط:</label>
                <select id="category" name="category" class="form-select @error('category') is-invalid @enderror">
                    <option value="">اختر نوع النشاط</option>
                    <option value="كرة القدم" {{ old('category') == 'كرة القدم' ? 'selected' : '' }}>كرة القدم</option>
                    <option value="كرة السلة" {{ old('category') == 'كرة السلة' ? 'selected' : '' }}>كرة السلة</option>
                    <option value="السباحة" {{ old('category') == 'السباحة' ? 'selected' : '' }}>السباحة</option>
                    <option value="التنس" {{ old('category') == 'التنس' ? 'selected' : '' }}>التنس</option>
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">التكلفة:</label>
                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" 
                       value="{{ old('price') }}" min="0" placeholder="أدخل سعر الاشتراك (اختياري)">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">وصف النشاط:</label>
                <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror" 
                          placeholder="أدخل وصف النشاط">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="start_time" class="form-label">وقت البدء:</label>
                <input type="time" id="start_time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" 
                       value="{{ old('start_time') }}" required>
                @error('start_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_time" class="form-label">وقت الانتهاء:</label>
                <input type="time" id="end_time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" 
                       value="{{ old('end_time') }}" required>
                @error('end_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">الموقع:</label>
                <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" 
                       value="{{ old('location') }}" required placeholder="أدخل موقع النشاط">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success w-100">إنشاء النشاط</button>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('logo-preview');
            output.src = reader.result;
            output.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
