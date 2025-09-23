<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Chỉnh sửa Book</h1>

    <form action="{{ url('/books/save') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $book->id }}">

        <div class="mb-3">
            <label class="form-label">Tên sách</label>
            <input type="text" name="name" class="form-control" value="{{ $book->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="describe" class="form-control" rows="4">{{ $book->describe }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ url('/books') }}" class="btn btn-secondary">Quay lại</a>
    </form>

</body>
</html>
