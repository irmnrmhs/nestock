<?php

namespace Database\Seeders;

use App\Models\IncomingStock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomingStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        IncomingStock::create(
            [
                'kode' => 'ES3-050925',
                'supplier_id' => 2,
                'product_id' => 2,
                'tanggal' => '2025/09/05',
                'kuantitas' => 640,
                'berat' => 19200,
            ]
        );
        
        // 2
        IncomingStock::create(
            [
                'kode' => 'ES3-111025',
                'supplier_id' => 2,
                'product_id' => 2,
                'tanggal' => '2025/10/11',
                'kuantitas' => 5000,
                'berat' => 150000,
            ]
        );
        
        // 3
        IncomingStock::create(
            [
                'kode' => 'ES3-241025',
                'supplier_id' => 2,
                'product_id' => 2,
                'tanggal' => '2025/10/24',
                'kuantitas' => 960,
                'berat' => 28800,
            ]
        );
        
        // 4
        IncomingStock::create(
            [
                'kode' => 'ES3-251025',
                'supplier_id' => 2,
                'product_id' => 2,
                'tanggal' => '2025/10/25',
                'kuantitas' => 5875,
                'berat' => 176250,
            ]
        );
        
        // 5
        IncomingStock::create(
            [
                'kode' => 'ES3-271125',
                'supplier_id' => 2,
                'product_id' => 2,
                'tanggal' => '2025/11/27',
                'kuantitas' => 5540,
                'berat' => 166200,
            ]
        );
        
        // 6
        IncomingStock::create(
            [
                'kode' => 'ES5-170925',
                'supplier_id' => 2,
                'product_id' => 3,
                'tanggal' => '2025/09/17',
                'kuantitas' => 379,
                'berat' => 18965,
            ]
        );

        // 7
        IncomingStock::create(
            [
                'kode' => 'ES5-180925',
                'supplier_id' => 2,
                'product_id' => 3,
                'tanggal' => '2025/09/18',
                'kuantitas' => 4700,
                'berat' => 235000,
            ]
        );
        
        // 8
        IncomingStock::create(
            [
                'kode' => 'ES5-050925',
                'supplier_id' => 2,
                'product_id' => 3,
                'tanggal' => '2025/09/05',
                'kuantitas' => 1600,
                'berat' => 80000,
            ]
        );
        
        // 9
        IncomingStock::create(
            [
                'kode' => 'ES5-041125',
                'supplier_id' => 2,
                'product_id' => 3,
                'tanggal' => '2025/11/04',
                'kuantitas' => 3312,
                'berat' => 165600,
            ]
        );
        
        // 10
        IncomingStock::create(
            [
                'kode' => 'ES5-101125',
                'supplier_id' => 2,
                'product_id' => 3,
                'tanggal' => '2025/11/10',
                'kuantitas' => 3360,
                'berat' => 168000,
            ]
        );
        
        // 11
        IncomingStock::create(
            [
                'kode' => 'ES7-100925',
                'supplier_id' => 2,
                'product_id' => 5,
                'tanggal' => '2025/09/10',
                'kuantitas' => 96,
                'berat' => 4800,
            ]
        );
        
        // 12
        IncomingStock::create(
            [
                'kode' => 'ES7-110925',
                'supplier_id' => 2,
                'product_id' => 5,
                'tanggal' => '2025/09/11',
                'kuantitas' => 4620,
                'berat' => 231000,
            ]
        );
        
        // 13
        IncomingStock::create(
            [
                'kode' => 'ES7-300925',
                'supplier_id' => 2,
                'product_id' => 5,
                'tanggal' => '2025/09/30',
                'kuantitas' => 4480,
                'berat' => 224000,
            ]
        );
        
        // 14
        IncomingStock::create(
            [
                'kode' => 'ES7-050925',
                'supplier_id' => 2,
                'product_id' => 5,
                'tanggal' => '2025/09/05',
                'kuantitas' => 1820,
                'berat' => 91000,
            ]
        );
        
        // 15
        IncomingStock::create(
            [
                'kode' => 'DS2,5-271025',
                'supplier_id' => 4,
                'product_id' => 1,
                'tanggal' => '2025/10/27',
                'kuantitas' => 2580,
                'berat' => 64500,
            ]
        );
        
        // 16
        IncomingStock::create(
            [
                'kode' => 'DS2,5-281025',
                'supplier_id' => 4,
                'product_id' => 1,
                'tanggal' => '2025/10/28',
                'kuantitas' => 5550,
                'berat' => 138750,
            ]
        );
        
        // 17
        IncomingStock::create(
            [
                'kode' => 'DS2,5-261125',
                'supplier_id' => 4,
                'product_id' => 1,
                'tanggal' => '2025/11/26',
                'kuantitas' => 4770,
                'berat' => 119250,
            ]
        );
        
        // 18
        IncomingStock::create(
            [
                'kode' => 'DS3-100925',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/09/10',
                'kuantitas' => 189,
                'berat' => 5679,
            ]
        );
        
        // 19
        IncomingStock::create(
            [
                'kode' => 'DS3-110925',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/09/11',
                'kuantitas' => 8400,
                'berat' => 252000,
            ]
        );
        
        // 20
        IncomingStock::create(
            [
                'kode' => 'DS3-240925',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/09/24',
                'kuantitas' => 5280,
                'berat' => 158400,
            ]
        );
        
        
        // 21
        IncomingStock::create(
            [
                'kode' => 'DS3-061025',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/10/06',
                'kuantitas' => 1008,
                'berat' => 30240,
            ]
        );
        
        // 22
        IncomingStock::create(
            [
                'kode' => 'DS3-111025',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/10/11',
                'kuantitas' => 4060,
                'berat' => 121800,
            ]
        );
        
        // 23
        IncomingStock::create(
            [
                'kode' => 'DS3-221025',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/10/22',
                'kuantitas' => 8400,
                'berat' => 252000,
            ]
        );
        
        // 24
        IncomingStock::create(
            [
                'kode' => 'DS3-241025',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/10/24',
                'kuantitas' => 8400,
                'berat' => 252000,
            ]
        );
        
        // 25
        IncomingStock::create(
            [
                'kode' => 'DS3-291025',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/10/29',
                'kuantitas' => 6720,
                'berat' => 201600,
            ]
        );
        
        // 26
        IncomingStock::create(
            [
                'kode' => 'DS3-041125',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/11/04',
                'kuantitas' => 6908,
                'berat' => 207240,
            ]
        );
        
        // 27
        IncomingStock::create(
            [
                'kode' => 'DS3-071125',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/11/07',
                'kuantitas' => 8400,
                'berat' => 252000,
            ]
        );
        
        // 28
        IncomingStock::create(
            [
                'kode' => 'DS3-111125',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/11/11',
                'kuantitas' => 7920,
                'berat' => 237600,
            ]
        );
        
        // 29
        IncomingStock::create(
            [
                'kode' => 'DS3-171125',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/11/17',
                'kuantitas' => 7240,
                'berat' => 217200,
            ]
        );
        
        // 30
        IncomingStock::create(
            [
                'kode' => 'DS3-221125',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/11/22',
                'kuantitas' => 6820,
                'berat' => 204600,
            ]
        );
        
        // 31
        IncomingStock::create(
            [
                'kode' => 'DS3-251125',
                'supplier_id' => 4,
                'product_id' => 2,
                'tanggal' => '2025/11/25',
                'kuantitas' => 7080,
                'berat' => 212400,
            ]
        );
        
        // 32
        IncomingStock::create(
            [
                'kode' => 'DS5-100925',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/09/10',
                'kuantitas' => 146,
                'berat' => 7298,
            ]
        );
        
        // 33
        IncomingStock::create(
            [
                'kode' => 'DS5-110925',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/09/11',
                'kuantitas' => 810,
                'berat' => 40500,
            ]
        );
        
        // 34
        IncomingStock::create(
            [
                'kode' => 'DS5-150925',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/09/15',
                'kuantitas' => 3240,
                'berat' => 162000,
            ]
        );
        
        // 35
        IncomingStock::create(
            [
                'kode' => 'DS5-240925',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/09/24',
                'kuantitas' => 810,
                'berat' => 40500,
            ]
        );
        
        // 36
        IncomingStock::create(
            [
                'kode' => 'DS5-270925',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/09/27',
                'kuantitas' => 3240,
                'berat' => 162000,
            ]
        );
        
        // 37
        IncomingStock::create(
            [
                'kode' => 'DS5-061025',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/10/06',
                'kuantitas' => 4536,
                'berat' => 226800,
            ]
        );
        
        // 38
        IncomingStock::create(
            [
                'kode' => 'DS5-151025',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/10/15',
                'kuantitas' => 4752,
                'berat' => 237600,
            ]
        );
        
        // 39
        IncomingStock::create(
            [
                'kode' => 'DS5-301025',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/10/30',
                'kuantitas' => 5040,
                'berat' => 252000,
            ]
        );
        
        // 40
        IncomingStock::create(
            [
                'kode' => 'DS5-051125',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/11/05',
                'kuantitas' => 5040,
                'berat' => 252000,
            ]
        );
        
        // 41
        IncomingStock::create(
            [
                'kode' => 'DS5-141125',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/11/14',
                'kuantitas' => 5094,
                'berat' => 254700,
            ]
        );

        // 42
        IncomingStock::create(
            [
                'kode' => 'DS5-201125',
                'supplier_id' => 4,
                'product_id' => 3,
                'tanggal' => '2025/11/20',
                'kuantitas' => 4050,
                'berat' => 202500,
            ]
        );

        // 43
        IncomingStock::create(
            [
                'kode' => 'DS6-270925',
                'supplier_id' => 4,
                'product_id' => 4,
                'tanggal' => '2025/09/27',
                'kuantitas' => 3060,
                'berat' => 153000,
            ]
        );
        
        // 44
        IncomingStock::create(
            [
                'kode' => 'DS6-271025',
                'supplier_id' => 4,
                'product_id' => 4,
                'tanggal' => '2025/10/27',
                'kuantitas' => 810,
                'berat' => 40500,
            ]
        );
        
        // 45
        IncomingStock::create(
            [
                'kode' => 'DS6-281025',
                'supplier_id' => 4,
                'product_id' => 4,
                'tanggal' => '2025/10/28',
                'kuantitas' => 3240,
                'berat' => 162000,
            ]
        );
        
        // 46
        IncomingStock::create(
            [
                'kode' => 'DS6-131125',
                'supplier_id' => 4,
                'product_id' => 4,
                'tanggal' => '2025/11/13',
                'kuantitas' => 4950,
                'berat' => 247500,
            ]
        );
        
        // 47
        IncomingStock::create(
            [
                'kode' => 'DS6-261125',
                'supplier_id' => 4,
                'product_id' => 4,
                'tanggal' => '2025/11/26',
                'kuantitas' => 2142,
                'berat' => 107100,
            ]
        );
        
        // 48
        IncomingStock::create(
            [
                'kode' => 'DS7-130925',
                'supplier_id' => 4,
                'product_id' => 5,
                'tanggal' => '2025/09/13',
                'kuantitas' => 90,
                'berat' => 4493,
            ]
        );
        
        // 49
        IncomingStock::create(
            [
                'kode' => 'DS7-140925',
                'supplier_id' => 4,
                'product_id' => 5,
                'tanggal' => '2025/09/14',
                'kuantitas' => 1349,
                'berat' => 67441,
            ]
        );
        
        // 50
        IncomingStock::create(
            [
                'kode' => 'DS7-150925',
                'supplier_id' => 4,
                'product_id' => 5,
                'tanggal' => '2025/09/15',
                'kuantitas' => 1710,
                'berat' => 85500,
            ]
        );
        
        // 51
        IncomingStock::create(
            [
                'kode' => 'DS7-201025',
                'supplier_id' => 4,
                'product_id' => 5,
                'tanggal' => '2025/10/20',
                'kuantitas' => 4320,
                'berat' => 216000,
            ]
        );
        
        // 52
        IncomingStock::create(
            [
                'kode' => 'DS7-251025',
                'supplier_id' => 4,
                'product_id' => 5,
                'tanggal' => '2025/10/25',
                'kuantitas' => 4050,
                'berat' => 202500,
            ]
        );
        
        // 53
        IncomingStock::create(
            [
                'kode' => 'DS7-271025',
                'supplier_id' => 4,
                'product_id' => 5,
                'tanggal' => '2025/10/27',
                'kuantitas' => 3996,
                'berat' => 199800,
            ]
        );
        
        // 54
        IncomingStock::create(
            [
                'kode' => 'DS7-101125',
                'supplier_id' => 4,
                'product_id' => 5,
                'tanggal' => '2025/11/10',
                'kuantitas' => 4050,
                'berat' => 202500,
            ]
        );
        
        // 55
        IncomingStock::create(
            [
                'kode' => 'DS7-211125',
                'supplier_id' => 4,
                'product_id' => 5,
                'tanggal' => '2025/11/21',
                'kuantitas' => 4050,
                'berat' => 202500,
            ]
        );
        
        // 56
        IncomingStock::create(
            [
                'kode' => 'AS3-150925',
                'supplier_id' => 5,
                'product_id' => 2,
                'tanggal' => '2025/09/15',
                'kuantitas' => 2400,
                'berat' => 72000,
            ]
        );
        
        // 57
        IncomingStock::create(
            [
                'kode' => 'AS3-170925',
                'supplier_id' => 5,
                'product_id' => 2,
                'tanggal' => '2025/09/17',
                'kuantitas' => 2040,
                'berat' => 61200,
            ]
        );
        
        // 58
        IncomingStock::create(
            [
                'kode' => 'AS3-021025',
                'supplier_id' => 5,
                'product_id' => 2,
                'tanggal' => '2025/10/02',
                'kuantitas' => 2016,
                'berat' => 60480,
            ]
        );
        
        // 59
        IncomingStock::create(
            [
                'kode' => 'AS3-091025',
                'supplier_id' => 5,
                'product_id' => 2,
                'tanggal' => '2025/10/09',
                'kuantitas' => 120,
                'berat' => 3600,
            ]
        );
        
        // 60
        IncomingStock::create(
            [
                'kode' => 'AS3-141025',
                'supplier_id' => 5,
                'product_id' => 2,
                'tanggal' => '2025/10/14',
                'kuantitas' => 7740,
                'berat' => 223200,
            ]
        );
        
        // 61
        IncomingStock::create(
            [
                'kode' => 'AS3-051125',
                'supplier_id' => 5,
                'product_id' => 2,
                'tanggal' => '2025/11/05',
                'kuantitas' => 6600,
                'berat' => 198000,
            ]
        );
        
        // 62
        IncomingStock::create(
            [
                'kode' => 'AS3-091125',
                'supplier_id' => 5,
                'product_id' => 2,
                'tanggal' => '2025/11/09',
                'kuantitas' => 240,
                'berat' => 7200,
            ]
        );
        
        // 63
        IncomingStock::create(
            [
                'kode' => 'AS5-150925',
                'supplier_id' => 5,
                'product_id' => 3,
                'tanggal' => '2025/09/15',
                'kuantitas' => 2888,
                'berat' => 144400,
            ]
        );
        
        // 64
        IncomingStock::create(
            [
                'kode' => 'AS5-170925',
                'supplier_id' => 5,
                'product_id' => 3,
                'tanggal' => '2025/09/17',
                'kuantitas' => 496,
                'berat' => 24800,
            ]
        );
        
        // 65
        IncomingStock::create(
            [
                'kode' => 'AS5-021025',
                'supplier_id' => 5,
                'product_id' => 3,
                'tanggal' => '2025/10/02',
                'kuantitas' => 1804,
                'berat' => 90200,
            ]
        );
        
        // 66
        IncomingStock::create(
            [
                'kode' => 'AS5-091025',
                'supplier_id' => 5,
                'product_id' => 3,
                'tanggal' => '2025/10/09',
                'kuantitas' => 4288,
                'berat' => 214400,
            ]
        );
        
        // 67
        IncomingStock::create(
            [
                'kode' => 'AS5-141025',
                'supplier_id' => 5,
                'product_id' => 3,
                'tanggal' => '2025/10/14',
                'kuantitas' => 720,
                'berat' => 36000,
            ]
        );
        
        // 68
        IncomingStock::create(
            [
                'kode' => 'AS5-091125',
                'supplier_id' => 5,
                'product_id' => 3,
                'tanggal' => '2025/11/09',
                'kuantitas' => 4216,
                'berat' => 210800,
            ]
        );
        
        // 69
        IncomingStock::create(
            [
                'kode' => 'SS5-201125',
                'supplier_id' => 6,
                'product_id' => 3,
                'tanggal' => '2025/11/20',
                'kuantitas' => 6180,
                'berat' => 309000,
            ]
        );

        // 70
        IncomingStock::create(
            [
                'kode' => 'SS6-031125',
                'supplier_id' => 6,
                'product_id' => 4,
                'tanggal' => '2025/11/03',
                'kuantitas' => 4000,
                'berat' => 200000,
            ]
        );

        // 71
        IncomingStock::create(
            [
                'kode' => 'KS3-121125',
                'supplier_id' => 3,
                'product_id' => 2,
                'tanggal' => '2025/11/12',
                'kuantitas' => 1680,
                'berat' => 50400,
            ]
        );
        
        // 72
        IncomingStock::create(
            [
                'kode' => 'KS3-141125',
                'supplier_id' => 3,
                'product_id' => 2,
                'tanggal' => '2025/11/14',
                'kuantitas' => 1680,
                'berat' => 50400,
            ]
        );
        
        // 73
        IncomingStock::create(
            [
                'kode' => 'KS3-201125',
                'supplier_id' => 3,
                'product_id' => 2,
                'tanggal' => '2025/11/20',
                'kuantitas' => 1680,
                'berat' => 50400,
            ]
        );
        
        // 74
        IncomingStock::create(
            [
                'kode' => 'KS5-121125',
                'supplier_id' => 3,
                'product_id' => 3,
                'tanggal' => '2025/11/12',
                'kuantitas' => 230,
                'berat' => 11500,
            ]
        );
        
        // 75
        IncomingStock::create(
            [
                'kode' => 'KS5-141125',
                'supplier_id' => 3,
                'product_id' => 3,
                'tanggal' => '2025/11/14',
                'kuantitas' => 1000,
                'berat' => 50000,
            ]
        );
        
        // 76
        IncomingStock::create(
            [
                'kode' => 'KS7-201125',
                'supplier_id' => 3,
                'product_id' => 5,
                'tanggal' => '2025/11/20',
                'kuantitas' => 1000,
                'berat' => 50000,
            ]
        );
        
    }
}
