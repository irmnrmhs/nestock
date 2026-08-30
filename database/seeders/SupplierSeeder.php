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
        // 1
        Supplier::create([
            'supplier' => 'Tian',
            'kode' => 'T',
        ]);

        // 2
        Supplier::create([
            'supplier' => 'Edy',
            'kode' => 'E',
        ]);

        // 3
        Supplier::create([
            'supplier' => 'Kian Li',
            'kode' => 'K',
        ]);

        // 4
        Supplier::create([
            'supplier' => 'Dodi',
            'kode' => 'D',
        ]);

        // 5
        Supplier::create([
            'supplier' => 'Ahong',
            'kode' => 'A',
        ]);

        // 6
        Supplier::create([
            'supplier' => 'Asiong',
            'kode' => 'S',
        ]);

        // 7
        Supplier::create([
            'supplier' => 'Fujian',
            'kode' => 'F',
        ]);
    }
}