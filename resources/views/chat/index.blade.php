
@extends('layouts.apps') <!-- استخدام القالب الرئيسي -->

@section('title', ' الدردشة ') <!-- عنوان الصفحة -->

@section('content')
<div class="container">
    <h2 class="text-center mb-4">الدردشة</h2>
    
    <div id="chat-box" class="chat-box">
        @foreach($messages as $message)
            <div class="message {{ $message->user->id == Auth::id() ? 'sent' : 'received' }}">
                <div class="message-user">
               
                <img src="{{ $message->user->avatar  ? asset('storage/' . $message->user->avatar) :asset('images/1m3.jpg') }}" alt="{{ $message->user->name }}" class="user-icon">

                    <span class="message-author">{{ $message->user->name }}</span>
                    <small class="message-time">{{ $message->created_at->format('H:i') }}</small>
                </div>
                <p class="message-text">{{ $message->message }}</p>
            </div>
        @endforeach
    </div>
    
    <form id="chat-form" class="chat-form">
        @csrf
        <input type="text" id="message" class="form-control message-input" placeholder="اكتب رسالتك..." required>
        <button type="submit" class="btn-send">
            <i class="fas fa-paper-plane"></i>
        </button>
    </form>
</div>

<style>
    /* الأنماط العامة */
    .container {
        width: 80%;
        max-width: 900px;
        margin: 0 auto;
    }

    .chat-box {
        border: 1px solid #ccc;
        height: 400px;
        overflow-y: scroll;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 10px;
        margin-bottom: 20px;
        position: relative;
    }

    .message {
        display: flex;
        margin-bottom: 15px;
        animation: fadeIn 0.3s ease-in-out;
    }

    .sent {
        justify-content: flex-end;
    }

    .received {
        justify-content: flex-start;
    }

    .message-user {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }

    .message-author {
        font-weight: bold;
        margin-left: 5px;
    }

    .message-time {
        font-size: 12px;
        color: #888;
        margin-left: 5px;
    }

    .message-text {
        background-color: #ddd;
        padding: 10px;
        border-radius: 8px;
        max-width: 75%;
        word-wrap: break-word;
        font-size: 14px;
        line-height: 1.4;
    }

    .sent .message-text {
        background-color: #6B46C1;
        color: white;
    }

    .received .message-text {
        background-color: #e1e1e1;
    }

    .user-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }

    /* زر إرسال */
    .chat-form {
        display: flex;
        align-items: center;
    }

    .message-input {
        width: 80%;
        padding: 10px;
        border-radius: 20px;
        border: 1px solid #ddd;
        margin-right: 10px;
        font-size: 14px;
    }

    .btn-send {
        background-color: #6B46C1;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s;
        width: 20px;
    }

    .btn-send:hover {
        background-color: #512da8;
    }

    .btn-send i {
        font-size: 20px;
    }

    /* الأنميشن للرسائل */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.getElementById('chat-form').addEventListener('submit', function (event) {
        event.preventDefault();
        
        let messageInput = document.getElementById('message');
        let message = messageInput.value.trim();
        if (message === '') return;

        fetch("{{ route('chat.send') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content,
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ message: message }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let chatBox = document.getElementById('chat-box');
                
                // إنشاء عنصر جديد للرسالة
                let newMessage = document.createElement('div');
                newMessage.classList.add('message', 'sent');
                newMessage.innerHTML = `
                    <div class="message-user">
                        <img src="${data.user.avatar ? asset('storage/' + data.user.avatar) : 'images/default-avatar.png'}" 
                             alt="${data.user.name}" class="user-icon">
                        <span class="message-author">${data.user.name}</span>
                        <small class="message-time">${data.created_at}</small>
                    </div>
                    <p class="message-text">${data.message}</p>
                `;
                
                // إضافة الرسالة الجديدة إلى المحادثة
                chatBox.appendChild(newMessage);
                
                // تمرير العرض إلى الأسفل ليظهر آخر رسالة
                chatBox.scrollTop = chatBox.scrollHeight;

                // مسح الحقل بعد الإرسال
                messageInput.value = '';
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>


@endsection