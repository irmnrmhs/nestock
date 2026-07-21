<?php

namespace Database\Seeders;

use App\Models\pic;
use Illuminate\Database\Seeder;

class PicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pic::create([
            'nama' => 'PIC 1',
        ]);

        pic::create([
            'nama' => 'PIC 2',
        ]);
    }
}
