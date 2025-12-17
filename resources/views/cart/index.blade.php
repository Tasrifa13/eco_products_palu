@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
<h2>Keranjang Belanja</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- ⬇️ KODE INI DI SINI --}}
@if($cart && $cart->items->count())
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

            @foreach($cart->items as $item)
                @php
                    $subtotal = $item->product->price * $item->qty;
                    $total += $subtotal;
                @endphp

                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>Rp {{ number_format($item->product->price) }}</td>
                    <td class="text-center">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="decrease">
                            <button class="btn btn-sm btn-danger">−</button>
                        </form>

                        <span class="mx-2">{{ $item->qty }}</span>

                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="action" value="increase">
                            <button class="btn btn-sm btn-success">+</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($subtotal) }}</td>
                    <td class="text-center">
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Hapus produk dari keranjang?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                🗑️
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if($cart && $cart->items->count())
                <div class="mt-3">
                    <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg">
                        Checkout
                    </a>
                </div>
@endif

        </tbody>
    </table>

    <h4>Total item: {{ $cart->items->sum('qty') }}</h4>
    <h4>Total harga: Rp {{ number_format($total) }}</h4>
@else
    <p>Keranjang kosong</p>
@endif
{{-- ⬆️ SAMPAI SINI --}}

@endsection
