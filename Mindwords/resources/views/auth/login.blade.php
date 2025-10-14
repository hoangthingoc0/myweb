<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindWords - Đăng Nhập</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>MindWords</h2>
            <h3>ĐĂNG NHẬP</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Ô nhập email --}}
                <div class="input-group">
                    <span class="icon">👤</span>
                    <input type="text" name="email" placeholder="Nhập tài khoản / Email" required>
                </div>

                {{-- Ô nhập mật khẩu --}}
                <div class="input-group">
                    <span class="icon">🔑</span>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
                    <span class="toggle-password" id="togglePassword" onclick="togglePassword()">🙉</span>
                </div>

                <a href="{{ route('password.request') }}" class="forgot">Quên mật khẩu?</a>

                <button type="submit" class="btn-login">Đăng Nhập</button>
            </form>

            <p class="register-link">
                Bạn chưa có tài khoản?
                <a href="{{ route('register') }}">Đăng Ký</a>
            </p>
        </div>
    </div>

    {{-- Gọi file JS --}}
    @vite(['resources/js/auth.js'])
</body>
</html>
