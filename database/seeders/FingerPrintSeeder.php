<?php

namespace Database\Seeders;

use App\Models\FingerPrint;
use Illuminate\Database\Seeder;

class FingerPrintSeeder extends Seeder
{
    public function run()
    {
        FingerPrint::factory()->count(50)->create();
    }
}
