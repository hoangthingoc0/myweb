<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Chào Mừng Bạn!</h2>
            <h3>ĐĂNG KÝ TÀI KHOẢN</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                @if ($errors->any())
                    <div class="error-box">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="input-group">
                    <span class="icon">👤</span>
                    <input type="text" name="name" placeholder="Nhập họ và tên" required>
                </div>

                <div class="input-group">
                    <span class="icon">📧</span>
                    <input type="email" name="email" placeholder="Nhập email" required>
                </div>

                <div class="input-group">
                    <span class="icon">🔑</span>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
                    <span class="toggle-password" onclick="togglePassword()">🙉</span>
                </div>

                <div class="input-group">
                    <span class="icon">🔁</span>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                </div>

                <button type="submit" class="btn-login">Đăng Ký</button>
            </form>

            <p class="register-link">
                Đã có tài khoản?
                <a href="{{ route('login') }}" id="login-link">Đăng Nhập</a>
            </p>
        </div>
    </div>

    @vite(['resources/js/auth.js'])
</body>
</html>
