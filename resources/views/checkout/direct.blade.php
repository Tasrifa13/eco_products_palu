@extends('layouts.app')

@section('title', 'Checkout Langsung')

@section('content')
<h2>Checkout Langsung</h2>

@if(session('direct_checkout'))
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        @foreach(session('direct_checkout.items') as $item)
            <tr>
                <td>{{ $item['product']->name }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>Rp {{ number_format($item['subtotal']) }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th>Rp {{ number_format(session('direct_checkout.total')) }}</th>
            </tr>
        </tfoot>
    </table>

    <form action="{{ route('checkout.finalize') }}" method="POST">
        @csrf
        <button class="btn btn-success">Bayar Sekarang</button>
    </form>
@else
    <p>Keranjang kosong.</p>
@endif

@endsection
