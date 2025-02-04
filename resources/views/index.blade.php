@extends('layouts.app')

@section('title', 'All Passwords')

@section('content')
<div class="container mt-4">
    <h1 class="text-primary fw-bold mb-4">Your Passwords</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-hover align-middle">
        <thead class="table-primary">
            <tr>
                <th>Service Name</th>
                <th>Password</th>
                <th>Show/Copy</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($passwords as $password)
                <tr>
                    <td class="fw-bold">{{ $password->service_name }}</td>
                    <td>
                        <input 
                            type="password" 
                            class="form-control password-field" 
                            value="{{ \App\Helpers\EncryptionHelper::decryptPassword($password->encrypted_password, $password->iv) }}" 
                            readonly 
                            id="password_{{ $password->id }}">
                    </td>
                    <td>
                        <button 
                            type="button" 
                            class="btn btn-sm btn-info toggle-password" 
                            data-id="{{ $password->id }}">Show</button>
                        <button 
                            type="button" 
                            class="btn btn-sm btn-success copy-password" 
                            data-id="{{ $password->id }}">Copy</button>
                    </td>
                    <td>
                        <form action="{{ route('passwords.destroy', $password->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="btn btn-danger btn-sm" 
                                onclick="return confirm('Are you sure you want to delete this password?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <script>
    // إظهار وإخفاء كلمة المرور
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const passwordField = document.getElementById('password_' + this.dataset.id);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                this.textContent = 'Hide';
            } else {
                passwordField.type = 'password';
                this.textContent = 'Show';
            }
        });
    });

    // نسخ كلمة المرور إلى الحافظة
    document.querySelectorAll('.copy-password').forEach(button => {
        button.addEventListener('click', function() {
            const passwordField = document.getElementById('password_' + this.dataset.id);
            passwordField.select();
            document.execCommand('copy');
            alert('Password copied to clipboard!');
        });
    });
</script>
@endsection
