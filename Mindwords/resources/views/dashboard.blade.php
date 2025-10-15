<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng điều khiển</title>
</head>
<body style="font-family: sans-serif; text-align: center; margin-top: 100px;">
    <h1>Chào mừng {{ Auth::user()->name }}!</h1>
    <p>Bạn đã đăng ký và đăng nhập thành công 🎉</p>
    <a href="{{ route('logout') }}">Đăng xuất</a>
</body>
</html>
