<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public string $obj = 'Barang Jadi';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->get();
        return view('masters.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'grade'=>'required|string',
            'kode'=>'required|string|unique:products,kode',
            'ket'=>'nullable|string'
        ]);

        $product = Product::create($validated);

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil ditambahkan',
            'data'=>$product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'grade'  => 'required|string',
            'kode'      => 'required|string|unique:products,kode,'.$product->id,
            'ket'       => 'nullable|string',
        ]);

        $product->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data ' . $this->obj . ' berhasil diperbaharui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil dihapus',
        ]);
    }
}
