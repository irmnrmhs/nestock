<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'grade'  => 'Suzhan 2,5 gram', 
            'kode'  => 'S1/2',
        ]);

        Product::create([
            'grade'  => 'Suzhan 3 gram',
            'kode'  => 'S3',
        ]);

        Product::create([
            'grade'  => 'Suzhan 5 gram',
            'kode'  => 'S5',
        ]);

        Product::create([
            'grade'  => 'Suzhan 6 gram',
            'kode'  => 'S6',
        ]);

        Product::create([
            'grade'  => 'Suzhan 7 gram',
            'kode'  => 'S7',
        ]);
    }
}
