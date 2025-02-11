<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $book->book_name }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/png">

    <style>
        .book-image {
            width: 300px;
            height: auto;
            margin-bottom: 10px;
            margin-top: 60px;
        }
        .book-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .book-details p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .book-details {
            margin-top: 10px;
        }

        .btn-back, .btn-download {
            margin-top: 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body class="main-layout">
<!-- header -->
<header>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="logo"> <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="#"></a> </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <div class="menu-area">
                        <nav class="main-menu">
                            <ul class="menu-area-main">
                                @foreach ($menus as $menu)
                                    <li><a href="{{ $menu->url }}">{{ $menu->menu_name }}</a></li>
                                @endforeach
                                    <li class="mean-last"><a href="{{ route('admin.index') }}"><img src="{{ asset('images/top-icon.png') }}" alt="#" /></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- Book Detail Section -->
<div class="container mt-5">
    <div class="row">
        <!-- Left Column: Book Image -->
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <img src="{{ asset('storage/' . $book->book_picture) }}" alt="Book Image" class="img-fluid book-image">
        </div>

        <!-- Right Column: Book Details -->
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 book-details">
            <!-- Book Name -->
            <h1 class="book-title">{{ $book->book_name }}</h1>

            <p><strong>ISBN:</strong> {{ $book->isbn_no }}</p>
            <p><strong>Yazar:</strong> {{ $book->writer }}</p>
            <p><strong>Yayın Evi:</strong> {{ $book->publishing_house }}</p>
            <p><strong>Kategoriler:</strong> {{ $book->category }}</p>
            <p><strong>Sayfa Sayısı:</strong> {{ $book->page_number }}</p>
            <p><strong>Kitap Bilgisi:</strong> {{ $book->book_content }}</p>

            <a href="{{ asset('storage/' . $book->book_file) }}" class="btn btn-success btn-download" download>İndir</a>
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-back">Kitaplara Geri Dön</a>
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="row pdn-top-30">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
