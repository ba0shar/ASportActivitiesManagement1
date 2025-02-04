<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        header {
            background-color: #512da8;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            animation: slideInDown 1s ease-out;
        }



        header img {
            width: 50px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo span {
            font-size: 1.5rem;
            font-weight: bold;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1rem;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #e60084;
        }
        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box input {
            padding: 0.5rem;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        .search-box button {
            padding: 0.5rem 1rem;
            background-color: #03a9f4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-box button:hover {
            background-color: #0288d1;
        }
        .login-card {
            display: flex;
            flex-direction: row;
            align-items: stretch;
            justify-content: space-between;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 1000px;
            width: 90%;
            overflow: hidden;
            animation: fadeInUp 1s ease-out;
        }

        .login-left, .login-right {
            width: 60%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .login-left {
            background: #f0f2f5;
            border-right: 1px solid #e0e0e0;
        }

        .login-left img {
            width: 200px;
            height: auto;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .login-right form {
            width: 100%;
            max-width: 400px;
        }
       

        .login-left p {
            font-size: 1.2rem;
            color: #555;
        }

        .login-right {
            width: 60%;
            padding: 30px;
        }

        .btn-login {
            background-color: #512da8;
            color: #fff;
            border: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #3e1b87;
        }

        .user-icon {
            font-size: 5rem;
            color: #512da8;
            animation: bounce 2s infinite;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(20%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<header>
<div class="logo">
    <img src="{{ asset('images/logo.png') }}" alt="Logo">
    <span>إدارة الأنشطة الرياضية</span>
</div>

<nav>
    <ul>
        <li><a href="{{ route('welcome') }}">الرئيسية</a></li>
        <li><a href="#about">عن الموقع</a></li>
        <li><a href="{{ route('register') }}">التسجيل </a></li>
    </ul>
</nav>

</header>

<div class="login-card">
    <!-- Left Section -->
    <div class="login-left">
        <img src="{{ asset('images/logo.png') }}" alt="Login Illustration">
        <p>مرحبًا بك! قم بتسجيل الدخول للمتابعة.</p>
    </div>

    <!-- Right Section -->
    <div class="login-right">
        <!-- User Icon Section -->
        <div class="text-center mb-4">
            <div class="user-icon">
                <i class="fas fa-user-circle"></i>
            </div>
        </div>

        <h4 class="text-center mb-4">تسجيل الدخول</h4>

        <!-- عرض رسائل الفشل إن وجدت -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" placeholder="أدخل بريدك الإلكتروني"
                       value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       id="password" name="password" placeholder="أدخل كلمة المرور" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-login">تسجيل الدخول</button>
        </form>

        <div class="text-center mt-3">
            <small>ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب جديد</a></small>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
