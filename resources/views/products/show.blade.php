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
    <button class="btn btn-success mb-3">
        + Tambah ke Keranjang
    </button>
</form>

        </h4>
        <p>{{ $product->description }}</p>

        <a href="/products" class="btn btn-outline-secondary">
            ← Kembali
        </a>
    </div>
</div>
@endsection
