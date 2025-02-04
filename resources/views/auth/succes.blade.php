<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تم التحقق بنجاح</title>

  <!-- تحسين تحميل الخطوط -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <style>
    /* Reset CSS */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .i-phone-14-15-pro-2 {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      text-align: center;
      position: relative;
    }

    .i-phone-14-15-pro-2 .mask {
      width: 100%;
      max-width: 200px; /* تحكم في الحجم */
      height: auto;
      margin-bottom: 1.5rem;
      object-fit: contain;
    }

    .i-phone-14-15-pro-2 .verified-and-account-created-successfully {
      font-size: 1.25rem;
      font-weight: 600;
      color: #512da8;
      margin-bottom: 1.5rem;
    }

    .button-primary {
      width: 100%;
      background: #512da8;
      color: #ffffff;
      padding: 14px;
      border-radius: 12px;
      font-size: 1rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: background 0.3s ease;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .button-primary:hover {
      background: #3b1f7a;
    }

  </style>
</head>
<body>
  <div class="i-phone-14-15-pro-2">
    <img class="mask" src="{{ asset('images/Mask.png') }}" alt="تم التحقق بنجاح" />
   
    <div class="verified-and-account-created-successfully">
      تم التحقق وإنشاء الحساب بنجاح
    </div>

    <button class="button-primary" onclick="redirectToHome()">الذهاب إلى الصفحة الرئيسية</button>
  </div>

  <script>
    function redirectToHome() {
      window.location.href = "{{ route('login') }}"; // تغيير الرابط حسب الحاجة
    }
  </script>
</body>
</html>
