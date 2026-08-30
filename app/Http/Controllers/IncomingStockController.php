<?php

namespace App\Http\Controllers;

use App\Models\IncomingStock;
use App\Models\Pic;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncomingStockController extends Controller
{
    public string $obj = 'Stok Masuk';
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $inStocks = IncomingStock::with(['supplier', 'product', 'pic'])->latest()->get();
        $suppliers = Supplier::all();
        $products = Product::all();
        $pics = Pic::all();

        return view('stocks.incoming', compact('inStocks', 'suppliers', 'products', 'pics'));
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
            'supplier_id'   => 'required|exists:suppliers,id',
            'product_id'    => 'required|exists:products,id',
            'pic_id'        => 'nullable|exists:pics,id',
            'tanggal'       => 'required|date',
            'kuantitas'     => 'required|numeric|min:0',
            'berat'         => 'required|numeric|min:0|max:999999.99',
            'keterangan'    => 'nullable',
        ]);

        $supplier = Supplier::find($validated['supplier_id']);
        $product = Product::find($validated['product_id']);

        $kdSupplier = $supplier->kode; 
        $kdProduct = $product->kode; 
        $tanggal = $validated['tanggal'];

        $format_tgl = date('dmy', strtotime($tanggal));

        $validated['kode'] = $kdSupplier . $kdProduct . '-' . $format_tgl;

        $inStock = IncomingStock::create($validated);

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil ditambahkan',
            'data'=>$inStock,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomingStock $incomingStock)
    {
        return response()->json($incomingStock);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomingStock $incomingStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IncomingStock $incomingStock)
    {
        $validated = $request->validate([
            'supplier_id'   => 'required|exists:suppliers,id',
            'product_id'    => 'required|exists:products,id',
            'pic_id'        => 'nullable|exists:pics,id',
            'tanggal'       => 'required|date',
            'kuantitas'     => 'required|numeric|min:0',
            'berat'         => 'required|numeric|min:0|max:999999.99',
            'keterangan'    => 'nullable',
        ]);

        $supplier = Supplier::find($validated['supplier_id']);
        $product = Product::find($validated['product_id']);

        $kdSupplier = $supplier->kode; 
        $kdProduct = $product->kode; 
        $tanggal = $validated['tanggal'];

        $format_tgl = date('dmy', strtotime($tanggal));

        $validated['kode'] = $kdSupplier . $kdProduct . '-' . $format_tgl;

        $incomingStock->update($validated);

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil diperbaharui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomingStock $incomingStock)
    {
        $incomingStock->delete();

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil dihapus',
        ]);
    }
}
