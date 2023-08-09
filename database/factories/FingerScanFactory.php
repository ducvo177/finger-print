<?php

namespace Database\Factories;

use App\Models\FingerScan;
use Illuminate\Database\Eloquent\Factories\Factory;

class FingerScanFactory extends Factory
{
    protected $model = FingerScan::class;

    public function definition()
    {
        return [
            'isCorrect' => $this->faker->boolean,
            'date' => $this->faker->date,
            'tmpContent' => $this->faker->text,
            'user_id' => rand(1, 10), // Change 100 to the maximum fingerprint ID you have
            'scanmachine_id' => rand(1, 50), // Change 50 to the maximum scanmachine ID you have
        ];
    }
}
