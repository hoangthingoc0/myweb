<!DOCTYPE html>
<html lang="vi" class="transition-colors duration-500">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/dashboard.css">

    <!-- Font icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script defer src="/js/dashboard.js"></script>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 class="logo">Mindwords</h2>
            <nav>
                <a href="{{ route('dashboard') }}" 
                    class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house"></i> Trang chủ
                </a>

                <a href="{{ route('dashboard.study') }}" 
                    class="{{ request()->routeIs('dashboard.study') ? 'active' : '' }}">
                    <i class="bi bi-book"></i> Học tập
                </a>

                <a href="{{ route('dashboard.flashcard') }}" 
                    class="{{ request()->routeIs('dashboard.flashcard') ? 'active' : '' }}">
                    <i class="bi bi-layers"></i> flashcards
                </a>

                <a href="#"><i class="bi bi-star"></i> Thành tích</a>
                <a href="#"><i class="bi bi-gear"></i> Cài đặt</a>

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>

                </form>
            </nav>

        </aside>

        <!-- Nội dung chính -->
        <main class="content">
            <header class="header">
                <div class="user-info">
                    <img src="{{ Auth::user()->avatar ?? '/images/default-avatar.png' }}" alt="avatar" class="avatar">
                    <h3>Xin chào, <strong>{{ Auth::user()->name }}</strong> 👋</h3>
                </div>

                <!-- Thanh tìm kiếm & nút thêm -->
                <div class="search-section">
                    <div class="search-container">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" placeholder="Tìm kiếm chủ đề hoặc flashcard..." class="search-bar">
                        <button class="add-btn" id="addBtn"><i class="bi bi-plus-lg"></i></button>
                    </div>
                </div>
            </header>

            <section class="cards">
                <div class="card">
                    <h4><i class="bi bi-bullseye"></i> Mục tiêu học tập</h4>
                    <p>{{ Auth::user()->learning_goal ?? 'Chưa có mục tiêu nào.' }}</p>
                </div>

                <div class="card">
                    <h4><i class="bi bi-fire"></i> Chuỗi ngày học liên tục</h4>
                    <p>{{ Auth::user()->streak_days ?? 0 }} ngày</p>
                </div>

                <div class="card">
                    <h4><i class="bi bi-gem"></i> Điểm thưởng</h4>
                    <p>{{ Auth::user()->points ?? 0 }} điểm</p>
                </div>
    
            </section>
        </main>
    </div>
</body>
</html>
