<!-- <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindWords - Đăng Nhập</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- Biểu tượng trang web --}}
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
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
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <input type="text" name="email" placeholder="Nhập tài khoản / Email" required>
                </div>

                {{-- Ô nhập mật khẩu --}}
                <div class="input-group">
                    <span class="icon"><i class="fas fa-key"></i></span>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
                    <span class="toggle-password" id="togglePassword" onclick="togglePassword()"><i class="fas fa-eye"></i></span>
                </div>

                <a href="{{ route('password.request') }}" class="forgot">Quên mật khẩu?</a>

                <button type="submit" class="btn-login">Đăng Nhập</button>
            </form>

            <p class="register-link">
                Bạn chưa có tài khoản?
                 <a href="{{ route('register') }}" id="register-link">Đăng Ký</a>
            </p>
        </div>
    </div>

    {{-- Gọi file JS --}}
    @vite(['resources/js/auth.js'])
</body>
</html> -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindWords - Đăng Nhập</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Biểu tượng trang web --}}
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            {{-- Logo Section --}}
            <div class="logo-section">
                <div class="logo-wrapper">
                    <i class="fas fa-brain"></i>
                </div>
                <h2>MindWords</h2>
                <p class="subtitle">Chào mừng trở lại!</p>
            </div>

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Success Messages --}}
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Ô nhập email --}}
                <div class="input-group">
                    <div class="input-wrapper">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input type="text" 
                               id="email"
                               name="email" 
                               placeholder="Nhập email hoặc tài khoản" 
                               value="{{ old('email') }}"
                               required 
                               autocomplete="email">
                    </div>
                </div>

                {{-- Ô nhập mật khẩu --}}
                <div class="input-group">
                    <div class="input-wrapper">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                        <input type="password" 
                               id="password"
                               name="password" 
                               placeholder="Nhập mật khẩu" 
                               required
                               autocomplete="current-password">
                        <span class="toggle-password" id="togglePassword" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                {{-- Remember & Forgot --}}
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ghi nhớ đăng nhập</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="btn-login">
                    <span>Đăng Nhập</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            {{-- Divider --}}
            <div class="divider">
                <span>hoặc đăng nhập với</span>
            </div>

            {{-- Social Login --}}
            <div class="social-login">
                <button type="button" class="social-btn google">
                    <img src="/images/g-logo.png" alt="Google Logo" style="width: 22px; height: 22px;">
                    <span>Google</span>
                </button>
                <button type="button" class="social-btn facebook">
                    <img src="/images/facebook-logo.png" alt="Facebook Logo" style="width: 22px; height: 22px;">
                    <span>Facebook</span>
                </button>
            </div>

            {{-- Register Link --}}
            <p class="register-link">
                Bạn chưa có tài khoản?
                <a href="{{ route('register') }}" id="register-link">Đăng ký ngay</a>
            </p>
        </div>
    </div>

    {{-- Gọi file JS --}}
    @vite(['resources/js/auth.js'])
</body>
</html>