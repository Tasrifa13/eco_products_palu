@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<h2 class="mb-4">Produk Ramah Lingkungan</h2>

<div class="row">
    @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <h5>{{ $product->name }}</h5>
                    <p class="text-success fw-bold">
                        Rp {{ number_format($product->price) }}
                    </p>
                    <a href="/products/{{ $product->id }}" class="btn btn-success mt-auto">
                        Detail Produk
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
