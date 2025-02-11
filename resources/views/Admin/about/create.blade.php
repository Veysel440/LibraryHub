<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeni Hakkımızda Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="index.html">Hakkımızda Yönetimi</a>
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
                <h1 class="mb-4">Yeni Hakkımızda Ekle</h1>
                <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="text" class="form-label">Hakkımızda Metni</label>
                        <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="vision" class="form-label">Vizyon</label>
                        <textarea class="form-control" id="vision" name="vision" rows="2" required></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-posta</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Adres</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook Linki</label>
                        <input type="url" class="form-control" id="facebook" name="facebook">
                    </div>

                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter Linki</label>
                        <input type="url" class="form-control" id="twitter" name="twitter">
                    </div>

                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram Linki</label>
                        <input type="url" class="form-control" id="instagram" name="instagram">
                    </div>

                    <div class="mb-3">
                        <label for="youtube" class="form-label">YouTube Linki</label>
                        <input type="url" class="form-control" id="youtube" name="youtube">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Resimler</label>
                        <input type="file" class="form-control" id="image" name="images[]" multiple>
                        <small class="form-text text-muted">Birden fazla resim seçebilirsiniz.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Hakkımızda Ekle</button>
                </form>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
