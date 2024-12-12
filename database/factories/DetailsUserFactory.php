<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetailsUser;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailsUser>
 */
class DetailsUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DetailsUser::class;
    public function definition(): array
    {
        return [
            'user' => mt_rand(1, 13),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'birth' => $this->faker->date,
            'is_membership' => mt_rand(0, 1),
            'photo' => 'https://placehold.co/600x400.png', 
        ];
    }
}
