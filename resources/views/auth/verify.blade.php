<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>التحقق من الحساب</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

  .log-in-page {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    padding: 2rem;
    text-align: center;
  }
  
  .log-in-page h1 {
    color: #512da8;
    font-size: 1.5rem;
    margin-bottom: 1rem;
  }
  
  .log-in-page p {
    color: #1f2024;
    font-size: 0.875rem;
    margin-bottom: 2rem;
  }
  
  .form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  .interests {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.5rem;
    margin-top: 1rem;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
  }

  .interests.show {
    max-height: 500px; /* يمكن تعديل هذا الارتفاع حسب الحاجة */
  }

  .interests button {
    padding: 8px 12px;
    border: 1px solid #c5c6cc;
    border-radius: 12px;
    background: #ffffff;
    font-size: 0.875rem;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .interests button:hover {
    background: #f5f5f5;
  }

  .toggle-interests {
    background: #512da8;
    color: #ffffff;
    padding: 8px 16px;
    border: none;
    border-radius: 12px;
    font-size: 0.875rem;
    cursor: pointer;
    transition: background 0.3s ease;
    margin-top: 1rem;
    width: 100%;
  }

  .toggle-interests:hover {
    background: #3b1f7a;
  }

  .text-field {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }
  
  .text-field input {
    padding: 12px 16px;
    border: 1px solid #c5c6cc;
    border-radius: 12px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.3s ease;
  }
  
  .text-field input:focus {
    border-color: #512da8;
  }
  
  .forgot-password {
    color: #512da8;
    font-size: 0.875rem;
    text-align: left;
    cursor: pointer;
  }
  
  .forgot-password:hover {
    text-decoration: underline;
  }
  
  .button-primary {
    background: #512da8;
    color: #ffffff;
    padding: 12px 16px;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  
  .button-primary:hover {
    background: #3b1f7a;
  }
  
  .social-login {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 2rem;
  }
  
  .social-login button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 16px;
    border: 1px solid #c5c6cc;
    border-radius: 12px;
    background: #ffffff;
    font-size: 0.875rem;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  
  .social-login button:hover {
    background: #f5f5f5;
  }
  
  .social-login img {
    width: 16px;
    height: 16px;
  }
  
  .divider {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin: 1.5rem 0;
  }
  
  .divider .line {
    flex: 1;
    height: 1px;
    background: #c5c6cc;
  }
  
  .divider span {
    color: #8f9098;
    font-size: 0.875rem;
  }
  
  footer {
    margin-top: 2rem;
    font-size: 0.75rem;
    color: #8f9098;
    text-align: center;
  }


.header-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header h1 {
  font-size: 1.5rem;
}

nav ul {
  display: flex;
  list-style: none;
  gap: 1rem;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 1rem;
  transition: color 0.3s ease;
}

nav ul li a:hover {
  color: #f5f5f5;
}

/* Main Content */
main {
  padding: 2rem;
  flex-grow: 1;
}

.activities-list h2 {
  font-size: 1.5rem;
  color: #512da8;
  margin-bottom: 1rem;
}

.activities-list ul {
  list-style: none;
  padding: 0;
}

.activity-item {
  background-color: #ffffff;
  border-radius: 8px;
  padding: 1rem;
  margin-bottom: 1rem;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

.activity-item h3 {
  font-size: 1.25rem;
  color: #512da8;
  margin-bottom: 0.5rem;
}

.activity-item p {
  font-size: 0.875rem;
  color: #333;
  margin-bottom: 0.5rem;
}

.button-primary {
  background: #512da8;
  color: #ffffff;
  padding: 12px 16px;
  border: none;
  border-radius: 12px;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s ease;
  text-align: center;
  text-decoration: none;
}

.button-primary:hover {
  background: #3b1f7a;
}

 

/* Responsiveness */
@media (max-width: 768px) {
  .header-container {
      flex-direction: column;
      align-items: flex-start;
  }

  nav ul {
      flex-direction: column;
      gap: 0.5rem;
      padding-left: 0;
  }

  .activities-list h2 {
      font-size: 1.25rem;
  }

  .activity-item {
      padding: 0.75rem;
  }
}
    .notification {
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      text-align: center;
      display: none;
    }
    .notification.success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    .notification.error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
  <div class="log-in-page">
    <header>
      <h1>التحقق من الحساب</h1>
      <p>أدخل كود التحقق الذي تم إرساله إلى بريدك الإلكتروني</p>
    </header>
    <main>
      <div id="notification" class="notification"></div>

      <form id="verificationForm" class="form" method="POST" action="{{ route('verify.process') }}">
        @csrf
        <div class="text-field">
          <input type="hidden" name="email" value="{{ request('email') }}" />
          <input type="text" name="verification_code" placeholder="أدخل كود التحقق" required />
        </div>
        <button type="submit" class="button-primary">تحقق</button>
      </form>
    </main>
    <footer>
      <p>© 2024 جميع الحقوق محفوظة.</p>
    </footer>
  </div>

  <script>
document.getElementById('verificationForm').addEventListener('submit', function (event) {
  event.preventDefault();

  const formData = new FormData(this);
  const notification = document.getElementById('notification');

  fetch('{{ route('verify.process') }}', {
    method: 'POST',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      'Accept': 'application/json'
    }
  })
  .then(response => {
    if (!response.ok) {
      return response.json().then(err => { throw err; });
    }
    return response.json();
  })
  .then(data => {
    notification.style.display = 'block';
    notification.textContent = data.message;
    notification.classList.remove('success', 'error');
    notification.classList.add(data.success ? 'success' : 'error');

    if (data.success && data.redirect) {
      setTimeout(() => { window.location.href = data.redirect; }, 3000);
    } else {
      setTimeout(() => { notification.style.display = 'none'; }, 5000);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    notification.style.display = 'block';
    notification.textContent = error.message || 'حدث خطأ في الاتصال بالخادم.';
    notification.classList.remove('success');
    notification.classList.add('error');

    setTimeout(() => { notification.style.display = 'none'; }, 5000);
  });
});
</script>

</body>
</html>
