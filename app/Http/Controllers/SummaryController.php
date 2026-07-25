<?php

namespace App\Http\Controllers;

use App\Exports\SummaryExport;
use App\Models\IncomingStock;
use App\Models\Product;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = IncomingStock::with([
                'supplier',
                'product',
                'outStocks'
            ])
            ->latest()
            ->get();

        $suppliers = Supplier::orderBy('supplier')->get();
        $products = Product::orderBy('grade')->get();

        $exportUrl = route('summary.export');

        return view('summaries.summary-stock', compact(
            'stocks',
            'suppliers',
            'products',
            'exportUrl'
        ));
    }

    public function export(Request $request)
    {
        $request->validate([
            'format' => 'required|in:excel,pdf',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'product_id' => 'nullable|exists:products,id',
            'bulan' => 'nullable|date_format:Y-m',
        ]);

        $export = new SummaryExport(
            $request->supplier_id,
            $request->product_id,
            $request->bulan
        );

        if ($request->format === 'excel') {
            return Excel::download(
                $export,
                'summary-stock.xlsx'
            );
        }

        $stocks = $export->collection();

        $supplier = $request->filled('supplier_id')
            ? Supplier::find($request->supplier_id)
            : null;

        $product = $request->filled('product_id')
            ? Product::find($request->product_id)
            : null;

        $bulan = $request->bulan;

        $pdf = Pdf::loadView('summaries.report-stock', [
            'stocks'   => $stocks,
            'supplier' => $supplier,
            'product'  => $product,
            'bulan'    => $bulan,
        ]);

        return $pdf->stream('summary-stock.pdf');
    }
}
