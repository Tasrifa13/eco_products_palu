<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk Eco</title>
</head>
<body>
    <h1>Tambah Produk Eco</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/products" enctype="multipart/form-data">
        @csrf

        <label>Gambar Produk</label><br>
        <input type="file" name="image"><br><br>

        <label>Nama Produk</label><br>
        <input type="text" name="name"><br><br>

        <label>Deskripsi</label><br>
        <textarea name="description"></textarea><br><br>

        <label>Harga</label><br>
        <input type="number" name="price"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
