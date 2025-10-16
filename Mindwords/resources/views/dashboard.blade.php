<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mindwords</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <h2><i class="fas fa-book-open"></i> Mindwords</h2>
            </div>
            
            <nav class="sidebar-nav">
                <a href="#" class="nav-item active">
                    <span class="icon"><i class="fas fa-home"></i></span>
                    <span class="text">Trang chủ</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="icon"><i class="fas fa-book"></i></span>
                    <span class="text">Khóa học của tôi</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="icon"><i class="fas fa-star"></i></span>
                    <span class="text">Yêu thích</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="icon"><i class="fas fa-chart-line"></i></span>
                    <span class="text">Thống kê</span>
                </a>
                <a href="#" class="nav-item">
                    <span class="icon"><i class="fas fa-cog"></i></span>
                    <span class="text">Cài đặt</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                    <div class="user-details">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-email">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="dashboard-header">
                <div class="header-left">
                    <h1>Trang chủ (Dashboard sau khi đăng nhập)</h1>
                    <p class="subtitle">Chào mừng trở lại, {{ Auth::user()->name }}! <i class="fas fa-hand-wave"></i></p>
                </div>
                <div class="header-right">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </button>
                </div>
            </header>

            <!-- Features Grid -->
            <section class="features-section">
                <h2 class="section-title">Gợi ý bộ cục & giao diện chính</h2>
                <p class="section-subtitle">Dưới đây là những màn hình bạn có thể thiết kế (và sau này code):</p>

                <div class="features-grid">
                    <!-- Feature 1 -->
                    <div class="feature-card">
                        <div class="feature-header">
                            <span class="feature-icon"><i class="fas fa-graduation-cap"></i></span>
                            <h3>Thẻ tiến độ học tập</h3>
                        </div>
                        <div class="feature-body">
                            <div class="feature-label">Mô tả</div>
                            <p>Hiển thị số ngày học liên tiếp, số bài đã hoàn thành.</p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card">
                        <div class="feature-header">
                            <span class="feature-icon"><i class="fas fa-layer-group"></i></span>
                            <h3>Các chủ đề học</h3>
                        </div>
                        <div class="feature-body">
                            <div class="feature-label">Mô tả</div>
                            <p>"Từ vựng", "Ghi nhớ nhanh", "Tìm nhớ hình ảnh", "Luyện tập phản xạ" — mỗi chủ đề là một card sinh động.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card">
                        <div class="feature-header">
                            <span class="feature-icon"><i class="fas fa-gamepad"></i></span>
                            <h3>Game mini / thử thách</h3>
                        </div>
                        <div class="feature-body">
                            <div class="feature-label">Mô tả</div>
                            <p>Ví dụ: "Nhớ từ trong 10 giây", "Điền từ đúng", "Ghép cặp nghĩa".</p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="feature-card">
                        <div class="feature-header">
                            <span class="feature-icon"><i class="fas fa-quote-left"></i></span>
                            <h3>Câu trích dẫn truyền cảm hứng</h3>
                        </div>
                        <div class="feature-body">
                            <div class="feature-label">Mô tả</div>
                            <p>Một góc nhỏ: "Hôm nay bạn đã tiến xa hơn ngày hôm qua rồi <i class="fas fa-bullseye"></i>".</p>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="feature-card">
                        <div class="feature-header">
                            <span class="feature-icon"><i class="fas fa-ellipsis-v"></i></span>
                            <h3>Menu góc phải</h3>
                        </div>
                        <div class="feature-body">
                            <div class="feature-label">Mô tả</div>
                            <p>Hồ sơ cá nhân, cài đặt, đăng xuất.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Quick Stats -->
            <section class="stats-section">
                <h2 class="section-title">Thống kê nhanh</h2>
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-fire"></i></div>
                        <div class="stat-value">7</div>
                        <div class="stat-label">Ngày liên tiếp</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                        <div class="stat-value">42</div>
                        <div class="stat-label">Bài đã hoàn thành</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-star"></i></div>
                        <div class="stat-value">850</div>
                        <div class="stat-label">Điểm kinh nghiệm</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                        <div class="stat-value">12</div>
                        <div class="stat-label">Thử thách hoàn thành</div>
                    </div>
                </div>
            </section>

            <!-- Motivational Quote -->
            <section class="quote-section">
                <div class="quote-card">
                    <div class="quote-icon"><i class="fas fa-lightbulb"></i></div>
                    <blockquote class="quote-text">
                        "Hôm nay bạn đã tiến xa hơn ngày hôm qua rồi <i class="fas fa-bullseye"></i>"
                    </blockquote>
                    <div class="quote-author">- Mindwords Team</div>
                </div>
            </section>

            <!-- Recent Activities -->
            <section class="activities-section">
                <h2 class="section-title">Hoạt động gần đây</h2>
                
                <div class="activities-list">
                    <div class="activity-item">
                        <div class="activity-icon success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Hoàn thành bài học "Từ vựng cơ bản"</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i> 2 giờ trước
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon info">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Chơi game "Ghép cặp nghĩa" - Đạt 95 điểm</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i> 5 giờ trước
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon warning">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Đạt cột mốc 7 ngày học liên tiếp</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i> Hôm qua
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Hoàn thành thử thách "Nhớ từ trong 10 giây"</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i> 2 ngày trước
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>