<?php

namespace App\Http\Controllers;

use App\Models\IncomingStock;
use App\Models\OutgoingStock;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // card
        $supplier = Supplier::count();

        $totalIncomingWeight = IncomingStock::sum('berat');

        $totalOutgoingWeight = OutgoingStock::sum('berat');

        $remainingWeight = $totalIncomingWeight - $totalOutgoingWeight;

        $remainingPercentage = $totalIncomingWeight > 0
            ? ($remainingWeight / $totalIncomingWeight) * 100
            : 0;


        // line chart
        $tahun = request('tahun', now()->year);
        $years = IncomingStock::selectRaw('YEAR(tanggal) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        $incomingPerMonth = IncomingStock::selectRaw('MONTH(tanggal) as bulan')
            ->selectRaw('SUM(berat) as total')
            ->whereYear('tanggal', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $outgoingPerMonth = OutgoingStock::selectRaw('MONTH(tanggal) as bulan')
            ->selectRaw('SUM(berat) as total')
            ->whereYear('tanggal', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();


        // histogram berat perbulan
        $incomingBySupplier = Supplier::with('inStoks')
        ->get()
        ->map(function ($supplier) {
            return [
                'supplier' => $supplier->supplier,
                'berat' => $supplier->inStoks->sum('berat'),
            ];
        });

        $outgoingBySupplier = Supplier::with('inStoks.outStocks')
        ->get()
        ->map(function ($supplier) {

            $beratKeluar = $supplier->inStoks->sum(function ($stock) {
                return $stock->outStocks->sum('berat');
            });

            return [
                'supplier' => $supplier->supplier,
                'berat' => $beratKeluar,
            ];
        });
        
        // histogram berat pergrade
        $incomingByGrade = Product::with('inStoks')
        ->get()
        ->map(function ($product) {

            return [
                'grade' => $product->grade,
                'berat' => $product->inStoks->sum('berat'),
            ];
        });

        $outgoingByGrade = Product::with('inStoks.outStocks')
        ->get()
        ->map(function ($product) {
            $beratKeluar = $product->inStoks->sum(function ($stock) {
                return $stock->outStocks->sum('berat');
            });

            return [
                'grade' => $product->grade,
                'berat' => $beratKeluar,
            ];
        });

        return view('dashboard', compact(

            'supplier',

            'totalIncomingWeight',
            'totalOutgoingWeight',
            'remainingWeight',
            'remainingPercentage',

            'tahun',
            'years',
            'incomingPerMonth',
            'outgoingPerMonth',

            'incomingBySupplier',
            'outgoingBySupplier',

            'incomingByGrade',
            'outgoingByGrade'
        ));
    }
}