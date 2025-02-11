<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- Site Metas -->
    <title>TuKitaplar</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">

    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/png">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<!-- body -->
<body class="main-layout home_page">

<!-- header -->
<header>
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
                                        @if ($menu->url == '/')
                                            <li><a href="{{ route('home') }}">{{ $menu->menu_name }}</a></li>
                                        @else
                                            <li><a href="{{ $menu->url }}">{{ $menu->menu_name }}</a></li>
                                        @endif
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

    <!-- end header inner -->
</header>
<!-- end header -->
<section class="slider_section">
    <div id="myCarousel" class="carousel slide banner-main" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-caption" style="position: absolute; left: 10%; top: 50%; transform: translateY(-50%); text-align: left; color: #fff;">
                            <h1>{{ $slider->main_title }}</h1>
                            <p>{{ $slider->sub_title }}</p>
                            <div class="button_section">
                                <a class="main_bt" href="{{ route('books.index') }}">Keşfet</a>
                            </div>
                            <ul class="locat_icon">
                                <li><a href="{{ $aboutUs->facebook }}"><img src="{{ asset('icon/facebook.png') }}"></a></li>
                                <li><a href="{{ $aboutUs->twitter }}"><img src="{{ asset('icon/Twitter.png') }}"></a></li>
                                <li><a href="{{ $aboutUs->linkedin }}"><img src="{{ asset('icon/linkedin.png') }}"></a></li>
                                <li><a href="{{ $aboutUs->instagram }}"><img src="{{ asset('icon/instagram.png') }}"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </a>

        <!-- İndikatörler -->
        <div class="carousel-indicators">
            @foreach($sliders as $key => $slider)
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}"
                        aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $key + 1 }}">
                </button>
            @endforeach
        </div>
    </div>
</section>
<!-- about -->
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="aboutheading">
                    <h2>Hakkımızda</h2>
                </div>
            </div>
        </div>
        <div class="row border">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                <div class="about-box">
                    <p>{{ $aboutUs->text }}</p>
                    <a href="{{ route('books.index') }}">Keşfet</a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="about-box">
                    <figure><img src="{{ asset('images/about.png') }}" alt="img" /></figure>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="Library">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="titlepage">
                    <h2>Kütüphanemiz</h2>
                    <span>{{ $aboutUs->vision }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="Library-box">
                        <figure><img src="{{ asset('images/Library-.jpg') }}" alt="#"/></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="read-more">
                    <a href="{{ route('books.index') }}">Keşfet</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Books">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="titlepage">
                    <h2>Kitaplarımız</h2> <!-- Türkçeye çevrildi -->
                    <span>En sevilen kitaplarımızı keşfedin!</span>
                </div>
            </div>
        </div>

        <div class="row box">
            @foreach($books->take(4) as $book) <!-- İlk 4 kitabı getir -->
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="book-box text-center">
                    <a href="{{  route('books.index')}}">
                        <figure>
                            <img src="{{ asset('storage/' . $book->book_picture) }}" alt="img" style="width: 300%; height: 400px; object-fit: cover;">
                        </figure>
                        <h4>{{ $book->book_name }}</h4>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="read-more">
                        <a href="{{ route('books.index') }}">Keşfet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage3">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <input class="form-control" placeholder="Name" name="name" type="text" required>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <input class="form-control" placeholder="Email" name="email" type="email" required>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <input class="form-control" placeholder="Phone Number" name="phone_number" type="text">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <input class="form-control" placeholder="Subject" name="subject" type="text" required>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <textarea class="textarea" name="message" placeholder="Message" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="send-btn">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Contact -->
<!-- footer -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="row pdn-top-30">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Follow">
                    </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myCarousel = new bootstrap.Carousel(document.getElementById('myCarousel'), {
            interval: 2000,
            wrap: true,
            ride: 'carousel'
        });
    });
</script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
