<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Ecoprodukku')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Ecoprodukku</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/products">Produk</a>
            </li>
            <li class="nav-item">
    <a class="nav-link" href="/cart">Keranjang</a>
</li>

        </ul>
    </div>
</nav>

<!-- CONTENT -->
<div class="container py-4">
    @yield('content')
</div>

<!-- FOOTER -->
<footer class="bg-success text-white text-center py-3">
    <p class="mb-0">© 2025 Ecoprodukku</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
