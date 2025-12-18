<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ecoprodukku 🌱</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Ecoprodukku</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
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
    </div>
</nav>

<!-- HERO -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Produk Ramah Lingkungan 🌱</h1>
        <p class="lead">
            Dukung gaya hidup berkelanjutan dengan produk eco-friendly pilihan terbaik.
        </p>
        <a href="/products" class="btn btn-success btn-lg">Lihat Produk</a>
    </div>
</section>

<!-- ABOUT -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Tentang Ecoprodukku</h2>
                <p>
                    Ecoprodukku adalah platform penjualan produk ramah lingkungan
                    yang bertujuan mengurangi dampak negatif terhadap alam
                    serta mendukung UMKM lokal.
                </p>
            </div>
            <div class="col-md-3 text-center">
                <img src="{{ asset('images/eco05.jpg') }}"
                    class="img-fluid rounded"
                    alt="Eco Product" 
                    style="max-width: 100%; height: 70%;">

            </div>
            <div class="col-md-3 text-center">
                <img src="{{ asset('images/eco06.jpg') }}"
                    class="img-fluid rounded"
                    alt="Eco Product" 
                    style="max-width: 100%; height: 70%;">

            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-success text-white text-center py-3">
    <p class="mb-0">© 2025 Ecoprodukku | Go Green 🌍</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
