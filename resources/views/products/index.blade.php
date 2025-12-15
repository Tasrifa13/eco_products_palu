<!DOCTYPE html>
<html>
<head>
    <title>Produk Eco</title>
</head>
<body>
    <h1>Daftar Produk Eco</h1>

    @foreach($products as $product)
        <div>
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>Rp {{ number_format($product->price) }}</p>
        </div>
        @if($product->image)
            <img src="{{ asset('images/products/' . $product->image) }}" width="150">
        @endif

    @endforeach
</body>
</html>
