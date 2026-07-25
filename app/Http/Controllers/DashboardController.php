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
        $supplier = Supplier::count();
        $product = Product::count();

        $incoming = IncomingStock::sum('kuantitas');
        $outgoing = OutgoingStock::sum('kuantitas');

        return view('dashboard', compact(
            'supplier',
            'product',
            'incoming',
            'outgoing'
        ));
    }
}
