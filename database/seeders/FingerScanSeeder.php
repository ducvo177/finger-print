<?php

namespace Database\Seeders;

use App\Models\FingerScan;
use Illuminate\Database\Seeder;

class FingerScanSeeder extends Seeder
{
    public function run()
    {
        FingerScan::factory()->count(100)->create();
    }
}
