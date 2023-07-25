<?php

namespace Database\Factories;

use App\Models\FingerPrint;
use Illuminate\Database\Eloquent\Factories\Factory;

class FingerPrintFactory extends Factory
{
    protected $model = FingerPrint::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'date' => $this->faker->date,
            'content' => $this->faker->text,
            'user_id' => rand(1, 10), // Change 10 to the maximum user ID you have
        ];
    }
}
