
@extends('layouts.apps')

@section('title', 'تفاصيل النشاط - إدارة الأنشطة الرياضية')

@section('content')
    <style>
        body {
            margin: 0;
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #512da8;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo span {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .container {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .activity-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 1.5rem;
        }

        .activity-header img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2rem;
            color: #512da8;
            margin: 0;
        }

        .details {
            margin-top: 1.5rem;
            color: #555;
            line-height: 1.8;
        }

        .details p {
            margin: 0.8rem 0;
            font-size: 1.1rem;
        }

        .details strong {
            color: #333;
        }

        .button-group {
            margin-top: 2rem;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button-group a,
        .button-group button {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .primary-button {
            background:#512da8;
            color: white;
        }

        .primary-button:hover {
            background: #0288d1;
            transform: translateY(-2px);
        }

        .secondary-button {
            background: #f5f5f5;
            color: #333;
            border: 1px solid #ddd;
        }

        .secondary-button:hover {
            background: #e0e0e0;
            transform: translateY(-2px);
        }

        .text-green-500 {
            color: #4caf50;
        }

        .font-bold {
            font-weight: bold;
        }

        footer {
            text-align: center;
             padding: 1.5rem;
            background-color: #512da8;
            color: white;
            margin-top: 2rem;
            font-size: 0.9rem;
        }

        footer p {
            margin: 0;
        }

        /* إضافة تأثيرات للزر عند الضغط */
        .button-group a:active,
        .button-group button:active {
            transform: translateY(0);
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="activity-header">
            @if ($activity->logo)
                <img src="{{ asset('storage/' . $activity->logo) }}" alt="Activity Logo" class="animate__animated animate__fadeIn">
            @endif
            <h2 class="animate__animated animate__fadeIn">{{ $activity->name }}</h2>
        </div>

        <div class="details animate__animated animate__fadeInUp">
            <p><i class="fa-solid fa-file-alt"></i> {{ $activity->description }}</p>
            <p><i class="fa-solid fa-tags"></i> <strong>التصنيف:</strong> {{ $activity->category }}</p>
            <p><i class="fa-solid fa-clock"></i> <strong>وقت البدء:</strong> {{ $activity->start_time }}</p>
            <p><i class="fa-solid fa-hourglass-end"></i> <strong>وقت الانتهاء:</strong> {{ $activity->end_time }}</p>
            <p><i class="fa-solid fa-map-marker-alt"></i> <strong>الموقع:</strong> {{ $activity->location }}</p>
            <p><i class="fa-solid fa-money-bill-wave"></i> <strong>السعر:</strong> {{ $activity->price }} ريال</p>
        </div>



  
    @if(auth()->check())
    @php
        $registration = auth()->user()->activities()->where('activity_id', $activity->id)->first();
    @endphp

    @if($registration)
      	
    @if($registration->pivot->leave_time)
            <p class="text-red-500 font-bold animate__animated animate__fadeIn">
                لقد غادرت هذا النشاط في {{ $registration->pivot->leave_time }}
            </p>
        @else
            <p class="text-green-500 font-bold animate__animated animate__fadeIn">
                أنت مسجل في هذا النشاط
            </p>
            <form action="{{ route('activities.leave', $activity->id) }}" method="POST" class="animate__animated animate__fadeIn">
                @csrf
                <div class="button-group">
                    <button type="submit" class="leave-btn" onclick="leaveActivity('{{ $activity->name }}')">اخرج</button>
                </div>
            </form>
            <div class="flex justify-between mt-6">
            <a href="{{ route('activities.my') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                ⬅️ العودة للرئيسية
            </a>
           
        </div>
        @endif
    @else
        <form action="{{ route('activities.register', $activity->id) }}" method="POST" class="animate__animated animate__fadeIn">
            @csrf
            <div class="button-group">
                <button type="submit" class="primary-button" onclick="joinActivity('{{ $activity->name }}')">انضم إلى النشاط</button>
            </div>

        </form>

    <div class="flex justify-between mt-6">
            <a href="{{ route('activities.my') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                ⬅️ العودة للرئيسية
            </a>
            <a href="{{ route('profile.Payment_Method') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                💳 إدارة الدفع
            </a>
        </div>
    @endif
@else
    <div class="button-group animate__animated animate__fadeIn">
        <a href="{{ route('login') }}" class="secondary-button">سجّل الدخول للانضمام</a>
    </div>
@endif



    @endsection