<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học tập</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 class="logo">Mindwords</h2>
            <nav>
                <a href="{{ route('dashboard') }}"><i class="bi bi-house"></i> Trang chủ</a>
                <a href="{{ route('dashboard.study') }}" class="active"><i class="bi bi-book"></i> Học tập</a>
                <a href="#"><i class="bi bi-layers"></i> Flashcard</a>
                <a href="#"><i class="bi bi-star"></i> Thành tích</a>
                <a href="#"><i class="bi bi-gear"></i> Cài đặt</a>
                <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
            </nav>
        </aside>

        <!-- Nội dung chính -->
        <main class="content">
            <header class="header">
                <div class="user-info">
                    <img src="{{ Auth::user()->avatar ?? '/images/default-avatar.png' }}" alt="avatar" class="avatar">
                    <h3>Xin chào, <strong>{{ Auth::user()->name }}</strong> 👋</h3>
                </div>
            </header>

            <section class="study-section">
                <h1><i class="bi bi-book"></i> Nơi học tập</h1>
                <p>Chào mừng bạn đến</p>
            </section>
        </main>
    </div>
</body>
</html>
