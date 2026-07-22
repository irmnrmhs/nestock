<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public string $obj = 'Supplier';
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $suppliers = Supplier::latest()->get();
        return view('masters.supplier', compact('suppliers'));
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
            'supplier'=>'required|string',
            'kode'=>'required|string|unique:suppliers,kode',
            'ket'=>'nullable|string'
        ]);

        $supplier = Supplier::create($validated);

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil ditambahkan',
            'data'=>$supplier
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return response()->json($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'supplier'  => 'required|string',
            'kode'      => 'required|string|unique:suppliers,kode,'.$supplier->id,
            'ket'       => 'nullable|string',
        ]);

        $supplier->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data ' . $this->obj . ' berhasil diperbaharui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil dihapus',
        ]);
    }
}
