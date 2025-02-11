<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hakkımızda Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="{{ route('admin.index') }}">Admin Paneli</a>
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
                <h1 class="mb-4">Hakkımızda Düzenle</h1>
                <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="image" class="form-label">Resim</label>
                        <input type="file" class="form-control" id="image" name="images[]" multiple>
                        @php
                            $images = json_decode($about->images);
                        @endphp
                        @if($images)
                            @foreach($images as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Hakkımızda Resmi" style="width: 100px; height: 100px; object-fit: cover;">
                            @endforeach
                        @else
                            <p>Henüz resim yüklenmemiş.</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">Metin</label>
                        <textarea class="form-control" id="text" name="text" rows="4" required>{{ $about->text }}</textarea>
                    </div>

                    <!-- Vizyon -->
                    <div class="mb-3">
                        <label for="vision" class="form-label">Vizyon</label>
                        <textarea class="form-control" id="vision" name="vision" rows="2" required>{{ $about->vision }}</textarea>
                    </div>


                    <!-- Telefon -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefon</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $about->phone }}" required>
                    </div>

                    <!-- E-posta -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-posta</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $about->email }}" required>
                    </div>

                    <!-- Adres -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Adres</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $about->address }}" required>
                    </div>

                    <!-- Sosyal Medya Linkleri -->
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook Linki</label>
                        <input type="url" class="form-control" id="facebook" name="facebook" value="{{ $about->facebook }}">
                    </div>

                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter Linki</label>
                        <input type="url" class="form-control" id="twitter" name="twitter" value="{{ $about->twitter }}">
                    </div>

                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram Linki</label>
                        <input type="url" class="form-control" id="instagram" name="instagram" value="{{ $about->instagram }}">
                    </div>

                    <div class="mb-3">
                        <label for="youtube" class="form-label">YouTube Linki</label>
                        <input type="url" class="form-control" id="youtube" name="youtube" value="{{ $about->youtube }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Güncelle</button>
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Geri</a>
                </form>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Telif Hakkı &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Gizlilik Politikası</a>
                        &middot;
                        <a href="#">Şartlar ve Koşullar</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
