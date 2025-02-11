<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kitap Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="index.html">Kitap Yönetimi</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('home') }}">Çıkış</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                @include('admin.partials.sidebar')
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Oturum açan kullanıcı:</div>
                Admin
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">
                <h1 class="mb-4">Kitap Düzenle</h1>
                <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="book_name" class="form-label">Kitap Adı</label>
                        <input type="text" class="form-control" id="book_name" name="book_name" value="{{ old('book_name', $book->book_name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="writer" class="form-label">Yazar</label>
                        <input type="text" class="form-control" id="writer" name="writer" value="{{ old('writer', $book->writer) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="publishing_house" class="form-label">Yayınevi</label>
                        <input type="text" class="form-control" id="publishing_house" name="publishing_house" value="{{ old('publishing_house', $book->publishing_house) }}">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $book->category) }}">
                    </div>
                    <div class="mb-3">
                        <label for="isbn_no" class="form-label">ISBN Numarası</label>
                        <input type="text" class="form-control" id="isbn_no" name="isbn_no" value="{{ old('isbn_no', $book->isbn_no) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="page_number" class="form-label">Sayfa Sayısı</label>
                        <input type="number" class="form-control" id="page_number" name="page_number" value="{{ old('page_number', $book->page_number) }}">
                    </div>
                    <div class="mb-3">
                        <label for="book_content" class="form-label">Kitap İçeriği</label>
                        <textarea class="form-control" id="book_content" name="book_content">{{ old('book_content', $book->book_content) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="book_picture" class="form-label">Kitap Resmi</label>
                        <input type="file" class="form-control" id="book_picture" name="book_picture">
                        @if($book->book_picture)
                            <img src="{{ asset('storage/' . $book->book_picture) }}" alt="Kitap Resmi" class="mt-2" width="150">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="book_file" class="form-label">Kitap Dosyası (PDF, DOCX)</label>
                        <input type="file" class="form-control" id="book_file" name="book_file" accept=".pdf,.docx">
                        @if($book->book_file)
                            <p class="mt-2">Mevcut dosya: <a href="{{ asset('storage/' . $book->book_file) }}" target="_blank">{{ basename($book->book_file) }}</a></p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Kitap Güncelle</button>
                </form>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
