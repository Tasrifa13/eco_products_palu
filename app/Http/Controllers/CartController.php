<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    // TAMPIL CART
    public function index()
    {
        $sessionId = Session::getId();

        $cart = Cart::where('session_id', $sessionId)
                    ->with('items.product')
                    ->first();

        return view('cart.index', compact('cart'));
    }

    // TAMBAH KE CART
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);
        $sessionId = Session::getId();

        $cart = Cart::firstOrCreate([
            'session_id' => $sessionId
        ]);

        $item = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $productId)
                        ->first();

        if ($item) {
            $item->qty++;
            $item->save();
        } else {
            CartItem::create([
                'cart_id'    => $cart->id,
                'product_id' => $productId,
                'price'      => $product->price, // ✅ SUDAH BENAR
                'qty'        => 1
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang');
    }
    public function update(Request $request, $id)
{
    $item = CartItem::findOrFail($id);

    if ($request->action === 'increase') {
        $item->qty++;
    } elseif ($request->action === 'decrease') {
        $item->qty--;

        if ($item->qty <= 0) {
            $item->delete();
            return back();
        }
    }

    $item->save();
    return back();
}
public function destroy($id)
{
    $item = CartItem::findOrFail($id);
    $item->delete();

    return back()->with('success', 'Produk dihapus dari keranjang');
}

}
