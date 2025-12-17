@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
<h2>Keranjang Belanja</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(empty($cart))
    <p>Keranjang masih kosong.</p>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $id => $item)
            @php $subtotal = $item['price'] * $item['qty']; @endphp
            @php $total += $subtotal; @endphp
            <tr>
                <td>
                    <img src="{{ asset('images/products/' . $item['image']) }}"
                         width="60" class="me-2">
                    {{ $item['name'] }}
                </td>
                <td>Rp {{ number_format($item['price']) }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>Rp {{ number_format($subtotal) }}</td>
                <td>
                    <form action="/cart/remove/{{ $id }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4>Total: <span class="text-success">Rp {{ number_format($total) }}</span></h4>
@endif
@endsection
