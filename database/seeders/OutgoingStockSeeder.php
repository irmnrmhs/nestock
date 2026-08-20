<?php

namespace Database\Seeders;

use App\Models\OutgoingStock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutgoingStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        OutgoingStock::create(
            [
                'incoming_stock_id' => 1,
                'tanggal' => '2025/09/05',
                'kuantitas' => 640,
                'berat' => 19200,
            ]
        );
        
        // 2
        OutgoingStock::create(
            [
                'incoming_stock_id' => 2,
                'tanggal' => '2025/10/11',
                'kuantitas' => 5000,
                'berat' => 150000,
            ]
        );
        
        // 3
        OutgoingStock::create(
            [
                'incoming_stock_id' => 3,
                'tanggal' => '2025/10/24',
                'kuantitas' => 960,
                'berat' => 28800,
            ]
        );
        
        // 4
        OutgoingStock::create(
            [
                'incoming_stock_id' => 4,
                'tanggal' => '2025/10/25',
                'kuantitas' => 5875,
                'berat' => 176250,
            ]
        );
        
        // 5
        OutgoingStock::create(
            [
                'incoming_stock_id' => 5,
                'tanggal' => '2025/11/27',
                'kuantitas' => 5540,
                'berat' => 166200,
            ]
        );
        
        // 6
        OutgoingStock::create(
            [
                'incoming_stock_id' => 6,
                'tanggal' => '2025/09/17',
                'kuantitas' => 379,
                'berat' => 18965,
            ]
        );
        
        // 7
        OutgoingStock::create(
            [
                'incoming_stock_id' => 7,
                'tanggal' => '2025/09/18',
                'kuantitas' => 4700,
                'berat' => 235000,
            ]
        );
        
        // 8
        OutgoingStock::create(
            [
                'incoming_stock_id' => 8,
                'tanggal' => '2025/09/05',
                'kuantitas' => 1600,
                'berat' => 80000,
            ]
        );
        
        // 9
        OutgoingStock::create(
            [
                'incoming_stock_id' => 9,
                'tanggal' => '2025/11/04',
                'kuantitas' => 3312,
                'berat' => 165600,
            ]
        );
        
        // 10
        OutgoingStock::create(
            [
                'incoming_stock_id' => 10,
                'tanggal' => '2025/11/10',
                'kuantitas' => 3360,
                'berat' => 168000,
            ]
        );
        
        // 11
        OutgoingStock::create(
            [
                'incoming_stock_id' => 11,
                'tanggal' => '2025/09/10',
                'kuantitas' => 96,
                'berat' => 4800,
            ]
        );
        
        // 12
        OutgoingStock::create(
            [
                'incoming_stock_id' => 12,
                'tanggal' => '2025/09/11',
                'kuantitas' => 4620,
                'berat' => 231000,
            ]
        );
        
        // 13
        OutgoingStock::create(
            [
                'incoming_stock_id' => 13,
                'tanggal' => '2025/09/30',
                'kuantitas' => 4480,
                'berat' => 224000,
            ]
        );
        
        // 14
        OutgoingStock::create(
            [
                'incoming_stock_id' => 14,
                'tanggal' => '2025/09/05',
                'kuantitas' => 1820,
                'berat' => 91000,
            ]
        );
        
        // 15
        OutgoingStock::create(
            [
                'incoming_stock_id' => 15,
                'tanggal' => '2025/10/27',
                'kuantitas' => 2580,
                'berat' => 64500,
            ]
        );
        
        // 16 
        OutgoingStock::create(
            [
                'incoming_stock_id' => 16,
                'tanggal' => '2025/10/28',
                'kuantitas' => 5550,
                'berat' => 138750,
            ]
        );
        
        // 17
        OutgoingStock::create(
            [
                'incoming_stock_id' => 17,
                'tanggal' => '2025/11/26',
                'kuantitas' => 4770,
                'berat' => 119250,
            ]
        );
        
        // 18
        OutgoingStock::create(
            [
                'incoming_stock_id' => 18,
                'tanggal' => '2025/09/10',
                'kuantitas' => 189,
                'berat' => 5679,
            ]
        );
        
        // 19 
        OutgoingStock::create(
            [
                'incoming_stock_id' => 19,
                'tanggal' => '2025/09/11',
                'kuantitas' => 8400,
                'berat' => 252000,
            ]
        );
        
        // 20
        OutgoingStock::create(
            [
                'incoming_stock_id' => 20,
                'tanggal' => '2025/09/24',
                'kuantitas' => 5280,
                'berat' => 158400,
            ]
        );
        
        // 21
        OutgoingStock::create(
            [
                'incoming_stock_id' => 21,
                'tanggal' => '2025/10/06',
                'kuantitas' => 1008,
                'berat' => 30240,
            ]
        );
        
        // 22
        OutgoingStock::create(
            [
                'incoming_stock_id' => 22,
                'tanggal' => '2025/10/11',
                'kuantitas' => 4060,
                'berat' => 121800,
            ]
        );
        
        // 23
        OutgoingStock::create(
            [
                'incoming_stock_id' => 23,
                'tanggal' => '2025/10/12',
                'kuantitas' => 8400,
                'berat' => 252000,
            ]
        );
        
        // 24
        OutgoingStock::create(
            [
                'incoming_stock_id' => 24,
                'tanggal' => '2025/10/24',
                'kuantitas' => 8400,
                'berat' => 252000,
            ]
        );
        
        // 25
        OutgoingStock::create(
            [
                'incoming_stock_id' => 25,
                'tanggal' => '2025/10/29',
                'kuantitas' => 6720,
                'berat' => 201600,
            ]
        );
        
        // 26
        OutgoingStock::create(
            [
                'incoming_stock_id' => 26,
                'tanggal' => '2025/11/04',
                'kuantitas' => 6908,
                'berat' => 207240,
            ]
        );
        
        // 27
        OutgoingStock::create(
            [
                'incoming_stock_id' => 27,
                'tanggal' => '2025/11/07',
                'kuantitas' => 8400,
                'berat' => 252000,
            ]
        );
        
        // 28
        OutgoingStock::create(
            [
                'incoming_stock_id' => 28,
                'tanggal' => '2025/11/11',
                'kuantitas' => 7920,
                'berat' => 237600,
            ]
        );
        
        // 29
        OutgoingStock::create(
            [
                'incoming_stock_id' => 29,
                'tanggal' => '2025/11/17',
                'kuantitas' => 7240,
                'berat' => 217200,
            ]
        );
        
        // 30
        OutgoingStock::create(
            [
                'incoming_stock_id' => 30,
                'tanggal' => '2025/11/22',
                'kuantitas' => 6820,
                'berat' => 204600,
            ]
        );
        
        // 31
        OutgoingStock::create(
            [
                'incoming_stock_id' => 31,
                'tanggal' => '2025/11/25',
                'kuantitas' => 7080,
                'berat' => 212400,
            ]
        );
        
        // 32
        OutgoingStock::create(
            [
                'incoming_stock_id' => 32,
                'tanggal' => '2025/09/10',
                'kuantitas' => 146,
                'berat' => 7298,
            ]
        );
        
        // 33
        OutgoingStock::create(
            [
                'incoming_stock_id' => 33,
                'tanggal' => '2025/09/11',
                'kuantitas' => 810,
                'berat' => 40500,
            ]
        );
        
        // 34
        OutgoingStock::create(
            [
                'incoming_stock_id' => 34,
                'tanggal' => '2025/09/15',
                'kuantitas' => 3240,
                'berat' => 162000,
            ]
        );
        
        // 35
        OutgoingStock::create(
            [
                'incoming_stock_id' => 35,
                'tanggal' => '2025/09/24',
                'kuantitas' => 810,
                'berat' => 40500,
            ]
        );
        
        // 36
        OutgoingStock::create(
            [
                'incoming_stock_id' => 36,
                'tanggal' => '2025/09/27',
                'kuantitas' => 3240,
                'berat' => 162000,
            ]
        );
        
        // 37
        OutgoingStock::create(
            [
                'incoming_stock_id' => 37,
                'tanggal' => '2025/10/06',
                'kuantitas' => 4536,
                'berat' => 226800,
            ]
        );
        
        // 38
        OutgoingStock::create(
            [
                'incoming_stock_id' => 38,
                'tanggal' => '2025/10/15',
                'kuantitas' => 4752,
                'berat' => 237600,
            ]
        );
        
        // 39
        OutgoingStock::create(
            [
                'incoming_stock_id' => 39,
                'tanggal' => '2025/10/30',
                'kuantitas' => 5040,
                'berat' => 252000,
            ]
        );
        
        // 40
        OutgoingStock::create(
            [
                'incoming_stock_id' => 40,
                'tanggal' => '2025/11/05',
                'kuantitas' => 5040,
                'berat' => 252000,
            ]
        );
        
        // 41
        OutgoingStock::create(
            [
                'incoming_stock_id' => 41,
                'tanggal' => '2025/11/14',
                'kuantitas' => 5094,
                'berat' => 254700,
            ]
        );
        
        // 42
        OutgoingStock::create(
            [
                'incoming_stock_id' => 42,
                'tanggal' => '2025/11/20',
                'kuantitas' => 4050,
                'berat' => 202500,
            ]
        );
        
        // 43
        OutgoingStock::create(
            [
                'incoming_stock_id' => 43,
                'tanggal' => '2025/09/27',
                'kuantitas' => 3060,
                'berat' => 153000,
            ]
        );
        
        // 44
        OutgoingStock::create(
            [
                'incoming_stock_id' => 44,
                'tanggal' => '2025/10/27',
                'kuantitas' => 810,
                'berat' => 40500,
            ]
        );
        
        // 45
        OutgoingStock::create(
            [
                'incoming_stock_id' => 45,
                'tanggal' => '2025/10/28',
                'kuantitas' => 3240,
                'berat' => 162000,
            ]
        );
        
        // 46
        OutgoingStock::create(
            [
                'incoming_stock_id' => 46,
                'tanggal' => '2025/11/13',
                'kuantitas' => 4950,
                'berat' => 247500,
            ]
        );
        
        // 47
        OutgoingStock::create(
            [
                'incoming_stock_id' => 47,
                'tanggal' => '2025/11/26',
                'kuantitas' => 2142,
                'berat' => 107100,
            ]
        );
        
        // 48
        OutgoingStock::create(
            [
                'incoming_stock_id' => 48,
                'tanggal' => '2025/09/13',
                'kuantitas' => 90,
                'berat' => 4493,
            ]
        );
        
        // 49
        OutgoingStock::create(
            [
                'incoming_stock_id' => 49,
                'tanggal' => '2025/09/14',
                'kuantitas' => 1349,
                'berat' => 67441,
            ]
        );
        
        // 50
        OutgoingStock::create(
            [
                'incoming_stock_id' => 50,
                'tanggal' => '2025/09/15',
                'kuantitas' => 1710,
                'berat' => 85500,
            ]
        );
        
        // 51
        OutgoingStock::create(
            [
                'incoming_stock_id' => 51,
                'tanggal' => '2025/10/20',
                'kuantitas' => 4320,
                'berat' => 216000,
            ]
        );
        
        // 52
        OutgoingStock::create(
            [
                'incoming_stock_id' => 52,
                'tanggal' => '2025/10/25',
                'kuantitas' => 4050,
                'berat' => 202500,
            ]
        );
        
        // 53
        OutgoingStock::create(
            [
                'incoming_stock_id' => 53,
                'tanggal' => '2025/10/27',
                'kuantitas' => 3996,
                'berat' => 199800,
            ]
        );
        
        // 54
        OutgoingStock::create(
            [
                'incoming_stock_id' => 54,
                'tanggal' => '2025/11/10',
                'kuantitas' => 4050,
                'berat' => 202500,
            ]
        );
        
        // 55
        OutgoingStock::create(
            [
                'incoming_stock_id' => 55,
                'tanggal' => '2025/11/21',
                'kuantitas' => 4050,
                'berat' => 202500,
            ]
        );
        
        // 56
        OutgoingStock::create(
            [
                'incoming_stock_id' => 56,
                'tanggal' => '2025/09/15',
                'kuantitas' => 2400,
                'berat' => 72000,
            ]
        );
        
        // 57
        OutgoingStock::create(
            [
                'incoming_stock_id' => 57,
                'tanggal' => '2025/09/17',
                'kuantitas' => 2040,
                'berat' => 61200,
            ]
        );
        
        // 58
        OutgoingStock::create(
            [
                'incoming_stock_id' => 58,
                'tanggal' => '2025/10/02',
                'kuantitas' => 2016,
                'berat' => 60480,
            ]
        );
        
        // 59
        OutgoingStock::create(
            [
                'incoming_stock_id' => 59,
                'tanggal' => '2025/10/09',
                'kuantitas' => 120,
                'berat' => 3600,
            ]
        );
        
        // 60
        OutgoingStock::create(
            [
                'incoming_stock_id' => 60,
                'tanggal' => '2025/10/14',
                'kuantitas' => 7740,
                'berat' => 223200,
            ]
        );
        
        // 61
        OutgoingStock::create(
            [
                'incoming_stock_id' => 61,
                'tanggal' => '2025/11/05',
                'kuantitas' => 6600,
                'berat' => 198000,
            ]
        );
        
        // 62
        OutgoingStock::create(
            [
                'incoming_stock_id' => 62,
                'tanggal' => '2025/11/09',
                'kuantitas' => 240,
                'berat' => 7200,
            ]
        );
        
        // 63
        OutgoingStock::create(
            [
                'incoming_stock_id' => 63,
                'tanggal' => '2025/09/15',
                'kuantitas' => 2888,
                'berat' => 144400,
            ]
        );
        
        // 64
        OutgoingStock::create(
            [
                'incoming_stock_id' => 64,
                'tanggal' => '2025/09/17',
                'kuantitas' => 496,
                'berat' => 24800,
            ]
        );
        
        // 65
        OutgoingStock::create(
            [
                'incoming_stock_id' => 65,
                'tanggal' => '2025/10/02',
                'kuantitas' => 1804,
                'berat' => 90200,
            ]
        );
        
        // 66
        OutgoingStock::create(
            [
                'incoming_stock_id' => 66,
                'tanggal' => '2025/10/09',
                'kuantitas' => 4288,
                'berat' => 214400,
            ]
        );
        
        // 67
        OutgoingStock::create(
            [
                'incoming_stock_id' => 67,
                'tanggal' => '2025/10/14',
                'kuantitas' => 720,
                'berat' => 36000,
            ]
        );
        
        // 68
        OutgoingStock::create(
            [
                'incoming_stock_id' => 68,
                'tanggal' => '2025/11/09',
                'kuantitas' => 4216,
                'berat' => 210800,
            ]
        );
        
        // 69 
        OutgoingStock::create(
            [
                'incoming_stock_id' => 69,
                'tanggal' => '2025/11/20',
                'kuantitas' => 6180,
                'berat' => 309000,
            ]
        );
        
        // 70
        OutgoingStock::create(
            [
                'incoming_stock_id' => 70,
                'tanggal' => '2025/11/03',
                'kuantitas' => 4000,
                'berat' => 200000,
            ]
        );
        
        // 71
        OutgoingStock::create(
            [
                'incoming_stock_id' => 71,
                'tanggal' => '2025/11/12',
                'kuantitas' => 1680,
                'berat' => 50400,
            ]
        );
        
        // 72
        OutgoingStock::create(
            [
                'incoming_stock_id' => 72,
                'tanggal' => '2025/11/14',
                'kuantitas' => 1680,
                'berat' => 50400,
            ]
        );
        
        // 73
        OutgoingStock::create(
            [
                'incoming_stock_id' => 73,
                'tanggal' => '2025/11/20',
                'kuantitas' => 1680,
                'berat' => 50400,
            ]
        );
        
        // 74
        OutgoingStock::create(
            [
                'incoming_stock_id' => 74,
                'tanggal' => '2025/11/12',
                'kuantitas' => 230,
                'berat' => 11500,
            ]
        );
        
        // 75
        OutgoingStock::create(
            [
                'incoming_stock_id' => 75,
                'tanggal' => '2025/11/14',
                'kuantitas' => 1000,
                'berat' => 50000,
            ]
        );
        
        // 76
        OutgoingStock::create(
            [
                'incoming_stock_id' => 76,
                'tanggal' => '2025/11/20',
                'kuantitas' => 0,
                'berat' => 0,
                // 'kuantitas' => 1000,
                // 'berat' => 50000,
            ]
        );
        
    }
}
