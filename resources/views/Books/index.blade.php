<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>TuKitaplar</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/png">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<!-- body -->
<body class="main-layout Books-bg">
<!-- loader  -->
<div class="loader_bg">
    <img src="{{ asset('images/loading.gif') }}" alt="#" />
</div>
<!-- end loader -->
<!-- header -->
<header>
    <!-- header inner -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo"> <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="#"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <div class="menu-area">
                        <div class="limit-box">
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
    </div>
    </div>
    <!-- end header inner -->
</header>
<!-- end header -->
<div class="about-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="abouttitle">
                    <h2>Kitaplarımız</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Books -->
<div class="Books">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
            </div>
        </div>
        <div class="row box">

            @foreach ($books as $book)
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="book-box">
                        <a href="{{ route('books.show', $book->id) }}">
                            <figure><img src="{{ asset('storage/' . $book->book_picture) }}" alt="img"/></figure>
                            <figcaption>{{ $book->book_name }}</figcaption>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Books -->
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
    <div class="copyright">
        <div class="container">
            <p>Telif Hakkı 2025 Tüm Hakları Saklıdır</p>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
