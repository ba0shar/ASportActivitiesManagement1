<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الأنشطة الرياضية</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #512da8, #673ab7);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            background-attachment: fixed;
            background-color:rgb(255, 255, 255);
            border-radius: 10px;
            
        }
        .logo2 span {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .logo img {
            width: 80px;
            height: 50px;
        }
        .logo2 {
            display: flex;
            align-items: center;
            gap: 10px;
            background-attachment: fixed;
            
            
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
            color: #03a9f4;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            color: white;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #03a9f4;
        }

        .hero {
            text-align: center;
            background: url('https://source.unsplash.com/1600x900/?sports,fitness') no-repeat center center/cover;
            color: #6B46C1;
            position: relative;
            height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
            animation: fadeInDown 1.5s;
        }

        .hero p {
            font-size: 1.2rem;
            animation: fadeInUp 1.5s;
        }

        .hero button {
            margin-top: 1.5rem;
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
            background-color: #6B46C1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            animation: pulse 2s infinite;
        }

        .hero button:hover {
            background-color: #0288d1;
        }

        .activities {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 3rem 5%;
        }

        .activity {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .activity:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .activity img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            animation: zoomIn 1s ease-in-out;
        }
        .activity .img {
            width: auto;
            height: auto;
             
        }
        .activity-content {
            padding: 1rem;
        }

        .activity h3 {
            margin: 0 0 0.5rem;
            font-size: 1.5rem;
        }

        .activity p {
            margin: 0 0 1rem;
            color: #555;
        }

        .activity-buttons {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
        }

        .activity-buttons button {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .primary {
            background-color: #03a9f4;
            color: white;
            width: 200px;
        }

        .primary:hover {
            background-color: #0288d1;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #512da8;
            color: white;
            margin-top: 2rem;
        }

        .slider {
            width: 100%;
            margin: 2rem 0;
        }

        .slider img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header>
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        
    </div>
    <div class="logo2">
       
        <span>إدارة الأنشطة الرياضية</span>
    </div>
        <nav>
            <ul>
                <li><a href="{{ route('about') }}">عن الموقع</a></li>
                <li><a href="{{ route('profile.help') }}">تواصل معنا</a></li>
                <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
            </ul>
        </nav>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </header>


    <div class="activities">

        <div class="activity">
            <img src="{{ asset('images/logoapp.webp') }}" alt="Football">
            <div class="activity-content">

                <section class="hero">

                    <h1>مرحباً بك في إدارة الأنشطة الرياضية</h1>
                    <p>استمتع بالمشاركة في الأنشطة الرياضية بسهولة وفعالية</p>
                    @if(auth()->check())
                    <button onclick="location.href='{{ route('activities.my') }}'"> تم تسجيل الدخول الذهاب للانشطة</button>
                    @else
                    <div class="button-group animate__animated animate__fadeIn">
                    <button type="submit" class="primary" onclick="location.href='{{ route('register') }}'" > التسجيل للانضمام </button>
                    </div>
                    <div class="button-group animate__animated animate__fadeIn">
                            <button type="submit" class="primary" onclick="location.href='{{ route('login') }}'" >سجّل الدخول للانضمام </button>
                            </div>
                    @endif
                </section>
            </div>
        </div>
    </div>
    <!-- السلايدر خارج قسم الأنشطة -->
    <div class="slider">
        <div><img src="{{ asset('images/m5.jpg') }}" alt="Football"></div>
        <div><img src="{{ asset('images/m5.jpg') }}" alt="Basketball"></div>
        <div><img src="{{ asset('images/m9.jpg') }}" alt="Tennis"></div>
    </div>

    <footer>
        <p>© 2024 جميع الحقوق محفوظة - إدارة الأنشطة الرياضية</p>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 2000,
            });
        });
    </script>
</body>

</html>