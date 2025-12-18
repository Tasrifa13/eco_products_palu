@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ asset('images/products/' . $product->image) }}"
             class="img-fluid rounded shadow">
    </div>

    <div class="col-md-6">
        <h2>{{ $product->name }}</h2>
        <h4 class="text-success">
            Rp {{ number_format($product->price) }}
            <form action="/cart/add/{{ $product->id }}" method="POST">
    @csrf
    <form action="/cart/add/{{ $product->id }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">
        Tambah ke Keranjang
    </button>
</form>
</form>

<form action="{{ route('checkout.direct') }}" method="POST" style="display:inline-block;">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-primary">
        Checkout Sekarang
    </button>
</form>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Hapus</button>
    </form>
</div>






        </h4>
        <p>{{ $product->description }}</p>

        <a href="/products" class="btn btn-outline-secondary">
            ← Kembali
        </a>
    </div>
</div>
@endsection
