<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
 use App\Models\Cart;
use App\Models\CartItem;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
public function addToCart($productId)
{
    $product = Product::findOrFail($productId);

    $cart = Cart::firstOrCreate([
        'user_id' => auth()->id()
    ]);

    $item = CartItem::where('cart_id', $cart->id)
                    ->where('product_id', $productId)
                    ->first();

    if ($item) {
        $item->qty++;
        $item->save();
    } else {
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $productId,
            'qty' => 1,
            'price' => $product->price
        ]);
    }

    return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
}
public function index()
{
    $cart = Cart::where('user_id', auth()->id())
                ->with('items.product')
                ->first();

    return view('cart.index', compact('cart'));
}

}

