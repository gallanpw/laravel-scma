<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SCMA HR App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">SCMA</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('karyawans.index') }}">Karyawan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('divisis.index') }}">Divisi</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('form-pernyataans.index') }}">Form Pernyataan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('teguran-tertulis.index') }}">Teguran</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('surat-peringatans.index') }}">SP</a></li>
        </ul>
    </nav>
    
    <div class="container py-4">
        @yield('content')
    </div>
</body>
</html>
