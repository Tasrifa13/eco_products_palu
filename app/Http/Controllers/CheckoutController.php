<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product; // <- PENTING! pastikan ini ada



class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())
                    ->with('items.product')
                    ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }

        $total = $cart->items->sum(function($item) {
            return $item->qty * $item->product->price;
        });

        return view('checkout.index', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string|in:cod,bank_transfer,ewallet',
        ]);

        $cart = Cart::where('user_id', auth()->id())
                    ->with('items.product')
                    ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }

        // Simpan order di tabel 'orders' (opsional)
        // Order::create([...]);

        // Kosongkan keranjang
        $cart->items()->delete();
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Pesanan berhasil dibuat!');
    }

public function directCheckout(Request $request)
{
    $product = Product::findOrFail($request->product_id);

    $directCheckout = [
        'type' => 'direct',
        'item' => [
            'product_id' => $product->id,
            'name'       => $product->name,
            'price'      => $product->price,
            'qty'        => 1,
            'subtotal'   => $product->price,
        ],
        'total' => $product->price,
    ];

    session(['direct_checkout' => $directCheckout]);

    return redirect()->route('checkout.direct');
}



public function showDirectCheckout()
{
    $checkout = session('direct_checkout');

    if (!$checkout) {
        return redirect('/products')->with('error', 'Tidak ada produk untuk checkout.');
    }

    return view('checkout.direct', compact('checkout'));
}
public function finalize(Request $request)
{
    $checkout = session('direct_checkout');

    if (!$checkout) {
        return redirect('/')->with('error', 'Checkout tidak ditemukan');
    }

    // 🔹 NANTI: simpan ke tabel orders
    // 🔹 NANTI: simpan order_items
    // 🔹 NANTI: integrasi payment gateway

    // Untuk sekarang, kita anggap berhasil
    session()->forget('direct_checkout');

    return redirect('/')
        ->with('success', 'Pembayaran berhasil!');
}



}
