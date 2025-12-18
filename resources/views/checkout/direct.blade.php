@extends('layouts.app')

@section('title', 'Checkout Langsung')

@section('content')
<h2>Checkout Langsung</h2>

@php
    $checkout = session('direct_checkout');
@endphp

@if($checkout)
    @php
        $item = $checkout['item'];
    @endphp

    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>Rp {{ number_format($item['subtotal']) }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th>Rp {{ number_format($checkout['total']) }}</th>
            </tr>
        </tfoot>
    </table>

    <form action="{{ route('checkout.finalize') }}" method="POST">
        @csrf
        <button class="btn btn-success">
            Bayar Sekarang
        </button>
    </form>
@else
    <p>Keranjang kosong.</p>
@endif

@endsection
