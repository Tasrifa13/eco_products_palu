<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create()
{
    return view('products.create');
}
public function show($id)
{
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
}


public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/products'), $imageName);
        $data['image'] = $imageName;
    }

    Product::create($data);

    return redirect('/products')->with('success', 'Produk berhasil ditambahkan');
}

}
