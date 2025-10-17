<!DOCTYPE html>
<html lang="vi" class="transition-colors duration-500">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Flashcard | Mindwords</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/dashboard.css">

    <!-- Font icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- JS -->
    <script defer src="/js/flashcard.js"></script>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <h2 class="logo">Mindwords</h2>
            <nav>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house"></i> Trang chủ
                </a>

                <a href="{{ route('dashboard.study') }}" class="{{ request()->routeIs('dashboard.study') ? 'active' : '' }}">
                    <i class="bi bi-book"></i> Học tập
                </a>

                <a href="{{ route('dashboard.flashcard') }}" class="{{ request()->routeIs('dashboard.flashcard') ? 'active' : '' }}">
                    <i class="bi bi-layers"></i> Flashcards
                </a>

                <a href="#"><i class="bi bi-star"></i> Thành tích</a>
                <a href="#"><i class="bi bi-gear"></i> Cài đặt</a>

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>

                </form>
            </nav>
        </aside>

        <main class="content">
            <header class="header">
                <h1><i class="bi bi-layers"></i> Create a new Flashcard</h1>
            </header>

            <section class="create-flashcard">
                <form id="flashcardForm">
                    <div class="form-group">
                        <label for="title"><i class="bi bi-pencil-square"></i> Add a title:</label>
                        <input type="text" id="title" name="title" placeholder="Enter flashcard title..." required>
                    </div>

                    <div id="cardContainer">
                        <div class="word-pair">
                            <div class="pair-header">1.</div>
                            <input type="text" name="word[]" placeholder="Word" required>
                            <input type="text" name="meaning[]" placeholder="Meaning" required>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="button" class="btn-add" id="addCardBtn">
                            <i class="bi bi-plus-circle"></i> Add a card
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn-create">
                            <i class="bi bi-check-circle"></i> Create
                        </button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
