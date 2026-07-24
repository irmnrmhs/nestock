<?php

namespace App\Http\Controllers;

use App\Models\IncomingStock;
use App\Models\OutgoingStock;
use App\Models\Pic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OutgoingStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public string $obj = 'Stok Keluar';

    public function index(): View
    {
        $outStocks = OutgoingStock::with('inStock', 'pic')->latest()->get();
        $inStocks = IncomingStock::all();
        $pics = Pic::all();

        return view('stocks.outgoing', compact('outStocks', 'inStocks', 'pics'));
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
            'incoming_stock_id' => 'required|exists:incoming_stocks,id',
            'pic_id'            => 'nullable|exists:pics,id',
            'tanggal'           => 'required|date',
            'kuantitas'         => 'required|numeric|min:0',
            'berat'             => 'required|numeric|min:0|max:999999.99',
        ]);

        $incomingStock = IncomingStock::findOrFail($validated['incoming_stock_id']);

        if ($validated['kuantitas'] > $incomingStock->sisa_kuantitas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kuantitas melebihi stok yang tersedia'
            ], 422);
        }

        if ($validated['berat'] > $incomingStock->sisa_berat) {
            return response()->json([
                'status' => 'error',
                'message' => 'Berat melebihi stok yang tersedia'
            ], 422);
        }

        $outStock = OutgoingStock::create($validated);

        return response()->json([
            'status'    => 'success',
            'message'   => 'Data ' . $this->obj . ' berhasil ditambahkan',
            'data'      => $outStock,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OutgoingStock $outgoingStock)
    {
        return response()->json($outgoingStock);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OutgoingStock $outgoingStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OutgoingStock $outgoingStock)
    {
        $validated = $request->validate([
            'incoming_stock_id' => 'required|exists:incoming_stocks,id',
            'pic_id'            => 'nullable|exists:pics,id',
            'tanggal'           => 'required|date',
            'kuantitas'         => 'required|numeric|min:0',
            'berat'             => 'required|numeric|min:0|max:999999.99',
        ]);

        $incomingStock = IncomingStock::findOrFail($validated['incoming_stock_id']);

        if ($incomingStock->id == $outgoingStock->incoming_stock_id) {

            $totalKeluarKuantitas = $incomingStock->outStocks()
                ->where('id', '!=', $outgoingStock->id)
                ->sum('kuantitas');

            $totalKeluarBerat = $incomingStock->outStocks()
                ->where('id', '!=', $outgoingStock->id)
                ->sum('berat');

        } else {
            $totalKeluarKuantitas = $incomingStock->outStocks()->sum('kuantitas');
            $totalKeluarBerat = $incomingStock->outStocks()->sum('berat');
        }

        $sisaKuantitas = $incomingStock->kuantitas - $totalKeluarKuantitas;
        $sisaBerat = $incomingStock->berat - $totalKeluarBerat;

        if ($validated['kuantitas'] > $sisaKuantitas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kuantitas melebihi stok yang tersedia.'
            ], 422);
        }

        if ($validated['berat'] > $sisaBerat) {
            return response()->json([
                'status' => 'error',
                'message' => 'Berat melebihi stok yang tersedia.'
            ], 422);
        }

        $outgoingStock->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data ' . $this->obj . ' berhasil diperbaharui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OutgoingStock $outgoingStock)
    {
        $outgoingStock->delete();

        return response()->json([
            'status'=>'success',
            'message' => 'Data ' . $this->obj . ' berhasil dihapus',
        ]);
    }
}
