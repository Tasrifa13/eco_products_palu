@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<h2>Checkout</h2>

<form action="{{ route('checkout.process') }}" method="POST">
    @csrf
    <h4>Alamat Pengiriman</h4>
    <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>

    <h4 class="mt-3">Produk</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart->items as $item)
                @php $subtotal = $item->product->price * $item->qty; @endphp
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>Rp {{ number_format($item->product->price) }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp {{ number_format($subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total Harga: Rp {{ number_format($total) }}</h4>

    <h4 class="mt-3">Metode Pembayaran</h4>
    <select name="payment_method" class="form-control" required>
        <option value="">Pilih Metode</option>
        <option value="cod">Cash on Delivery (COD)</option>
        <option value="bank_transfer">Bank Transfer</option>
        <option value="ewallet">E-Wallet (OVO, Gopay, Dana)</option>
    </select>

    <button type="submit" class="btn btn-primary mt-3">Bayar Sekarang</button>
</form>
@endsection
