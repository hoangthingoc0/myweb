<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Danh sách Book</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sách</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->describe }}</td>
                    <td>
                        <a href="{{ url('/books/edit/'.$book->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
