<?php

namespace App\Http\Controllers;

use App\Models\IncomingStock;
use App\Models\OutgoingStock;
use App\Models\Product;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        // FILTER TAHUN

        $years = IncomingStock::selectRaw('YEAR(tanggal) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        // Default menggunakan tahun terbaru yang tersedia
        $tahun = request('tahun', $years->first());


        // CARD STATISTIK

        $supplier = Supplier::count();

        // Total berat masuk
        $totalIncomingWeight = IncomingStock::whereYear('tanggal', $tahun)
            ->sum('berat')/1000;

        // Total berat keluar
        $totalOutgoingWeight = OutgoingStock::whereYear('tanggal', $tahun)
            ->sum('berat')/1000;

        // Sisa berat
        $remainingWeight = $totalIncomingWeight - $totalOutgoingWeight;

        // Persentase sisa
        $remainingPercentage = $totalIncomingWeight > 0
            ? ($remainingWeight / $totalIncomingWeight) * 100
            : 0;


        // LINE CHART
        // BERAT MASUK PER BULAN

        $incomingPerMonth = IncomingStock::selectRaw(
                'MONTH(tanggal) as bulan'
            )
            ->selectRaw(
                'SUM(berat) as total'
            )
            ->whereYear('tanggal', $tahun)
            ->groupByRaw('MONTH(tanggal)')
            ->orderByRaw('MONTH(tanggal)')
            ->get();


        // BERAT KELUAR PER BULAN
        $outgoingPerMonth = OutgoingStock::selectRaw(
                'MONTH(tanggal) as bulan'
            )
            ->selectRaw(
                'SUM(berat) as total'
            )
            ->whereYear('tanggal', $tahun)
            ->groupByRaw('MONTH(tanggal)')
            ->orderByRaw('MONTH(tanggal)')
            ->get();


        // Siapkan 12 bulan
        $incomingData = array_fill(1, 12, 0);
        $outgoingData = array_fill(1, 12, 0);


        foreach ($incomingPerMonth as $item) {
            $incomingData[$item->bulan] = (float) $item->total;
        }


        foreach ($outgoingPerMonth as $item) {
            $outgoingData[$item->bulan] = (float) $item->total;
        }


        // SUPPLIER
        // BERAT MASUK

        $incomingBySupplier = Supplier::with([
            'inStoks' => function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            }
        ])
        ->get()
        ->map(function ($supplier) {
            return [
                'supplier' => $supplier->supplier,
                'berat' => (float) $supplier
                    ->inStoks
                    ->sum('berat'),
            ];
        });


        // SUPPLIER
        // BERAT KELUAR

        $outgoingBySupplier = Supplier::with([
            'inStoks' => function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            },
            'inStoks.outStocks' => function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            }
        ])
        ->get()
        ->map(function ($supplier) {
            $beratKeluar = $supplier->inStoks->sum(
                function ($stock) {
                    return $stock
                        ->outStocks
                        ->sum('berat');
                }
            );
            return [
                'supplier' => $supplier->supplier,
                'berat' => (float) $beratKeluar,
            ];
        });


        // GRADE
        // BERAT MASUK

        $incomingByGrade = Product::with([
            'inStoks' => function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            }
        ])
        ->get()
        ->map(function ($product) {
            return [
                'grade' => $product->grade,
                'berat' => (float) $product
                    ->inStoks
                    ->sum('berat'),
            ];
        });


        // GRADE
        // BERAT KELUAR

        $outgoingByGrade = Product::with([
            'inStoks' => function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            },
            'inStoks.outStocks' => function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            }
        ])
        ->get()
        ->map(function ($product) {
            $beratKeluar = $product->inStoks->sum(
                function ($stock) {
                    return $stock
                        ->outStocks
                        ->sum('berat');
                }
            );
            return [
                'grade' => $product->grade,
                'berat' => (float) $beratKeluar,
            ];
        });


        // RETURN VIEW
        return view('dashboard', compact(
            'supplier',

            'totalIncomingWeight',
            'totalOutgoingWeight',
            'remainingWeight',
            'remainingPercentage',

            'tahun',
            'years',

            'incomingData',
            'outgoingData',

            'incomingBySupplier',
            'outgoingBySupplier',

            'incomingByGrade',
            'outgoingByGrade'

        ));
    }
}