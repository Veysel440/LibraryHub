<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>TuKitaplar</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/png">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <style>
        .contact-info {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #f8f9fa;
            border-top: 2px solid #ccc;
        }
        .contact-info li {
            list-style: none;
        }
        .gallery {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        .gallery-item img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="main-layout">
<!-- loader -->
<div class="loader_bg">
    <img src="{{ asset('images/loading.gif') }}" alt="#" />
</div>
<header>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('images/logo.png') }}" alt="#">
                                </a>
                            </div>
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
</header>

<!-- About -->
<div class="about-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="abouttitle">
                    <h2>Hakkımızda</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="aboutheading">
                    <h2>Vizyonumuz</h2>
                    <span>{{ $aboutUs->vision }}</span>
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
                    <figure>
                        <img src="{{ asset('images/about.png') }}" alt="img" />
                    </figure>
                </div>
            </div>
        </div>

        <div class="about">
            <div class="container text-center">
                <h2>Galerimiz</h2>
                <div class="gallery">
                    @if(is_array($images) && count($images) > 0)
                        @foreach ($images as $image)
                            <div class="gallery-item">
                                <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image">
                            </div>
                        @endforeach
                    @else
                        <p>Galeride hiç resim bulunmamaktadır.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="contact-info">
            <ul>
                <h4>İletişim Bilgileri</h4>
                <li><strong>Phone:</strong> {{ $aboutUs->phone }}</li>
                <li><strong>Email:</strong> <a href="mailto:{{ $aboutUs->email }}">{{ $aboutUs->email }}</a></li>
                <li><strong>Address:</strong> {{ $aboutUs->address }}</li>
            </ul>
            <ul>
                <li><strong>Facebook:</strong> <a href="{{ $aboutUs->facebook }}" target="_blank">Facebook</a></li>
                <li><strong>Twitter:</strong> <a href="{{ $aboutUs->twitter }}" target="_blank">Twitter</a></li>
                <li><strong>Instagram:</strong> <a href="{{ $aboutUs->instagram }}" target="_blank">Instagram</a></li>
                <li><strong>YouTube:</strong> <a href="{{ $aboutUs->youtube }}" target="_blank">YouTube</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end about -->

<!-- footer -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="row pdn-top-30">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Follow">
                        <h3>Follow Us</h3>
                    </div>
                    <ul class="location_icon">
                        <li><a href="{{ $aboutUs->facebook }}"><img src="{{ asset('icon/facebook.png') }}"></a></li>
                        <li><a href="{{ $aboutUs->twitter }}"><img src="{{ asset('icon/Twitter.png') }}"></a></li>
                        <li><a href="{{ $aboutUs->linkedin }}"><img src="{{ asset('icon/linkedin.png') }}"></a></li>
                        <li><a href="{{ $aboutUs->instagram }}"><img src="{{ asset('icon/instagram.png') }}"></a></li>
                    </ul>
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


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
