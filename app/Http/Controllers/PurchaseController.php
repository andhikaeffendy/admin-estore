<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('product')->latest()->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $products = Product::all();
        return view('purchases.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $total_harga = $product->harga * $validated['jumlah'];

        Purchase::create([
            'product_id' => $product->id,
            'jumlah' => $validated['jumlah'],
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('purchases.index')->with('success', 'Pembelian berhasil ditambahkan!');
    }
}
