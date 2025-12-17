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

        $cart = Cart::firstOrCreate(
            ['user_id' => auth()->id()],
            ['user_id' => auth()->id()]
        );

        // Buat item baru di cart
        CartItem::create([
    'cart_id' => $cart->id,
    'product_id' => $product->id,
    'qty' => 1,
    'price' => $product->price, // <-- ini wajib
]);

        return redirect()->route('checkout.index')->with('success', 'Produk siap di-checkout!');
    }

public function showDirectCheckout()
{
    $cart = session('direct_checkout');

    if (!$cart) {
        return redirect('/products')->with('error', 'Tidak ada produk untuk checkout.');
    }

    return view('checkout.direct', compact('cart'));
}

}
