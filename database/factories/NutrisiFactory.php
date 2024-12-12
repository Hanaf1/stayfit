<?php
// database/factories/NutrisiFactory.php

namespace Database\Factories;

use App\Models\Nutrisi;
use Illuminate\Database\Eloquent\Factories\Factory;

class NutrisiFactory extends Factory
{
    protected $model = Nutrisi::class;

    public function definition(): array
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        return [
            'activity_type' => rand(1, 2),
            'makanan' => $this->faker->randomElement([
                'quinoa', 'kale', 'avocado', 'almonds', 'salmon', 'blueberries', 'spinach', 'chia seeds', 'sweet potato', 'broccoli',
            ]),
            'minuman' => $this->faker->randomElement([
                'green tea', 'kombucha', 'smoothie with kale and berries', 'water infused with cucumber and mint', 'matcha latte', 'golden milk', 'fresh vegetable juice', 'coconut water', 'herbal tea', 'almond milk',
            ]),
            'day' => $this->faker->randomElement($daysOfWeek),


        ];
    }
}
