<?php

namespace App\Exports;

use App\Models\IncomingStock;
// use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SummaryExport implements FromCollection, WithHeadings
{
    protected $supplierId;
    protected $productId;
    protected $bulan;

    public function __construct($supplierId = null, $productId = null, $bulan = null)
    {
        $this->supplierId = $supplierId;
        $this->productId = $productId;
        $this->bulan = $bulan;
    }

    public function collection()
    {
        $query = IncomingStock::with([
            'supplier',
            'product',
            'outStocks'
        ]);

        // Filter Supplier
        if (!empty($this->supplierId)) {
            $query->where('supplier_id', $this->supplierId);
        }

        // Filter Grade (Product)
        if (!empty($this->productId)) {
            $query->where('product_id', $this->productId);
        }

        // Filter Bulan
        if (!empty($this->bulan)) {
            [$year, $month] = explode('-', $this->bulan);

            $query->whereYear('tanggal', $year)
                  ->whereMonth('tanggal', $month);
        }

        return $query->get()->map(function ($stock) {

            $keluarQty = $stock->outStocks->sum('kuantitas');
            $keluarBerat = $stock->outStocks->sum('berat');
            $tanggalKeluar = $stock->outStocks->sortByDesc('tanggal')->first();

            return [
                'Kode Barang Jadi' => $stock->kode,
                'Supplier'         => $stock->supplier->supplier,
                'Grade'            => $stock->product->grade,
                'Tanggal Masuk'    => $stock->tanggal ? \Carbon\Carbon::parse($stock->tanggal)->format('d/m/Y') : '-',
                'Tanggal Keluar' => $tanggalKeluar && $tanggalKeluar->tanggal ? \Carbon\Carbon::parse($tanggalKeluar->tanggal)->format('d/m/Y') : '-',
                'Keping Masuk'     => $stock->kuantitas,
                'Keping Keluar'    => $keluarQty,
                'Sisa Keping'      => $stock->kuantitas - $keluarQty,
                'Berat Masuk'      => $stock->berat,
                'Berat Keluar'     => $keluarBerat,
                'Sisa Berat'       => $stock->berat - $keluarBerat,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Kode Barang Jadi',
            'Supplier',
            'Grade',
            'Keping Masuk',
            'Keping Keluar',
            'Sisa Keping',
            'Berat Masuk',
            'Berat Keluar',
            'Sisa Berat',
        ];
    }
}
