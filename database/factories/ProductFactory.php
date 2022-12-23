<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jewellery = $this->faker->randomElement(['Earrings', 'Engagement Ring', 'Necklaces', 'Locket', 'Pendant', 'Bracelet']);

        return [
            'name' => $jewellery,
            'description' => $this->faker->sentence,
            'quantity_in_stock' => $this->faker->numberBetween('0', '100'),
        ];
    }
}
