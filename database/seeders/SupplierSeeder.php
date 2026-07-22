<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'supplier' => 'Tian',
            'kode' => 'T',
        ]);

        Supplier::create([
            'supplier' => 'Edy',
            'kode' => 'E',
        ]);

        Supplier::create([
            'supplier' => 'Kian Li',
            'kode' => 'K',
        ]);

        Supplier::create([
            'supplier' => 'Dodi',
            'kode' => 'D',
        ]);

        Supplier::create([
            'supplier' => 'Ahong',
            'kode' => 'A',
        ]);

        Supplier::create([
            'supplier' => 'Fujian',
            'kode' => 'F',
        ]);
    }
}