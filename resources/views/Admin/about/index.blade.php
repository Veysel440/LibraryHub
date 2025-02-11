<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hakkımızda Yönetimi</title>
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
                <h1 class="mb-4">Hakkımızda Yönetimi</h1>
                <a href="{{ route('admin.about.create') }}" class="btn btn-primary mb-3">Yeni Ekle</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Metin</th>
                        <th>Vizyon</th>
                        <th>Telefon</th>
                        <th>E-posta</th>
                        <th>Adres</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Instagram</th>
                        <th>YouTube</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aboutUs as $about)
                        <tr>
                            <td>
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
                            </td>
                            <td>{{ Str::limit($about->text, 50) }}</td>
                            <td>{{ Str::limit($about->vision, 50) }}</td>
                            <td>{{ $about->phone }}</td>
                            <td>{{ $about->email }}</td>
                            <td>{{ $about->address }}</td>
                            <td><a href="{{ $about->facebook }}" target="_blank">Facebook</a></td>
                            <td><a href="{{ $about->twitter }}" target="_blank">Twitter</a></td>
                            <td><a href="{{ $about->instagram }}" target="_blank">Instagram</a></td>
                            <td><a href="{{ $about->youtube }}" target="_blank">YouTube</a></td>
                            <td>
                                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                                <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
